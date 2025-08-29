<?php
    session_start(); //demarrer la session
    $currentPage = basename($_SERVER['PHP_SELF']); 

    //************* appel du fichier de connexion a la base de donnée***** */
    require_once("../models/H_databaseConnection.php");
    $H_dbConnect = F_databaseConnection("localhost", "m&ystore", "root", "");

    // Fonctions
    require("../models/H_functionsModels.php");
    
    // --------- Récupérer tous les clients -----------
    $Y_clients = F_executeRequeteSql("SELECT * FROM client");
    $Y_Produits = F_executeRequeteSql("SELECT * FROM produit");

    // --- PAGINATION ---
    $page = isset($_GET['page']) && intval($_GET['page']) > 0 ? intval($_GET['page']) : 1;
    $limit = 5;
    $offset = ($page - 1) * $limit;

    // --- FILTRE ---
    $ristourne = isset($_GET['ristourne']) && $_GET['ristourne'] !== '' ? intval($_GET['ristourne']) : null;

    // --- REQUÊTE PRINCIPALE ---
    $sql = "SELECT * FROM client";
    $params = [];

    if ($ristourne) {
        $sql .= " WHERE Type_client = ?";
        $params[] = $ristourne;
    }

    $sql .= " LIMIT " . intval($limit) . " OFFSET " . intval($offset);

    // --- Récupération des clients ---
    $Y_clients = F_executeRequeteSql($sql, $params);

    // Normalisation en tableau
    if (is_object($Y_clients)) {
        $Y_clients = [$Y_clients];
    }

    // --- CALCUL TOTAL ---
    $sqlCount = "SELECT COUNT(*) as total FROM client";
    $paramsCount = [];

    if ($ristourne) {
        $sqlCount .= " WHERE Type_client = ?";
        $paramsCount[] = $ristourne;
    }

    $countResult = F_executeRequeteSql($sqlCount, $paramsCount);

    // Normalisation pour COUNT
    if (is_object($countResult)) {
        $countResult = [$countResult];
    }

    $totalClients = !empty($countResult) ? $countResult[0]->total : 0;
    $totalPages = $totalClients > 0 ? ceil($totalClients / $limit) : 1;

    // --- AJOUT DE CLIENT ---
    if (isset($_POST['enregistrer'])) {
        extract($_POST);

        //on recupere le dernier client enregistré dans la bd
        $Y_dernierClient = 'SELECT client.idClient FROM client ORDER BY idClient  DESC LIMIT 1';
        $Y_executeDernierClient = F_executeRequeteSql($Y_dernierClient);
                                                
                                                        
        foreach($Y_executeDernierClient as $Y_executeClient)
        {
            $Y_idClient = $Y_executeClient->idClient;                                                      
        }
                                                        
        $Y_nouveauIdClient = F_genereMatricule($Y_idClient, 'CLI00001'); //sinon on incremente le nième client

        $Y_insertClient = 'INSERT INTO client(idClient, nomComplet, adresse, telephone_client, Type_client, date_create) VALUES(?, ?, ?, ?, ?, NOW())';
        $Y_tableauValeurs = [$Y_nouveauIdClient, $nomClient, $adresse, $telephoneClient, $pourcentage_ristourne];
        $Y_executeInsertClient = F_executeRequeteSql($Y_insertClient, $Y_tableauValeurs); //ajoute le nouveau client pour la descente
        $H_tableauErreurs[] = 'Nouvel Acheteur enregistré avec success!!!';

        header('Location:clientsController.php');
    }


    // --- MISE A JOUR DES PRODUIT ---
    if(isset($_POST['maj'])){
        extract($_POST);

        $sqlUpdate = "UPDATE client SET nomComplet=?, adresse=?, telephone_client=?, Type_client=? WHERE idClient=?";
        $paramsUpdate = [$nomClient, $adresse, $telephoneClient, $pourcentage_ristourne, $id_client];

        F_executeRequeteSql($sqlUpdate, $paramsUpdate);

        header("Location: clientsController.php");
        exit();
    }

    // --- AJOUT DU PANIER DANS LA BD---
    if (isset($_POST['panier']) && isset($_POST['id_client'])) {
        $idClient = $_POST['id_client'];
        $panier = json_decode($_POST['panier'], true); 
        $type_transaction = "TPT00001";

        if (!empty($panier)) {
            // Récupérer la dernière transaction
            $Y_derniereTransaction = F_executeRequeteSql("SELECT transaction.id_transaction FROM `transaction` ORDER BY id_transaction DESC LIMIT 1");
            foreach($Y_derniereTransaction as $Y_lastTransaction){
                $Y_idTransaction = $Y_lastTransaction->id_transaction;                                                      
            }

            $Y_nouvelleTransaction = F_genereMatricule($Y_idTransaction, 'TRS00001');

            // Insérer la nouvelle transaction
            $Y_tableauValeurs1 = [$Y_nouvelleTransaction, $idClient, $type_transaction];
            F_executeRequeteSql("INSERT INTO `transaction`(id_transaction, idClient, id_type_transaction, date_reception) VALUES(?, ?, ?, NOW())", $Y_tableauValeurs1);

            // Insérer chaque produit du panier
            foreach ($panier as $produit) {
                $idProduit = $produit['id'];
                $quantite = $produit['qte'];
                $prix = $produit['prix']; // prix unitaire actuel du produit

                // Déterminer la ristourne fixe selon le type du client
                switch($produit['type_client']) {  // assure-toi de passer le type_client depuis JS si nécessaire
                    case 1: $ristourneFixe = 330; break;   // Standard
                    case 2: $ristourneFixe = 350; break;   // Privilège
                    case 3: $ristourneFixe = 390; break;   // VIP
                    default: $ristourneFixe = 0;
                }

                // Remise totale pour ce produit
                $remiseProduit = $ristourneFixe * $quantite;
                $montantTotalRemise += $remiseProduit;

                // Calcul du prix net unitaire après ristourne
                $prixNetUnitaire = $prix - $ristourneFixe;

                // Prix total pour ce produit
                $prixTotalProduit = $prixNetUnitaire * $quantite;

                // Récupérer la dernière transaction_produit
                $Y_derniereTransactionProduit = F_executeRequeteSql("SELECT transaction_produit.id_transaction_produit FROM transaction_produit ORDER BY id_transaction_produit DESC LIMIT 1");
                foreach($Y_derniereTransactionProduit as $Y_lastTransactionProduit){
                    $Y_idTransactionProduit = $Y_lastTransactionProduit->id_transaction_produit;                                                    
                }

                $Y_nouvelleTransactionProduit = F_genereMatricule($Y_idTransactionProduit, 'TRP00001');

                // Insérer la nouvelle transaction_produit avec le prix net
                $Y_tableauValeurs2 = [$Y_nouvelleTransactionProduit, $Y_nouvelleTransaction, $idProduit, $quantite, $quantite, $prixTotalProduit];
                F_executeRequeteSql("INSERT INTO transaction_produit(id_transaction_produit, id_transaction , id_produit, quantite_attendue, quantite_recue, prix_unitaire) VALUES(?, ?, ?, ?, ?, ?)", $Y_tableauValeurs2);

                // Mettre à jour le stock
                $Y_tableauValeurs3 = [$quantite, $idProduit];
                $Y_updateQuantity = F_executeRequeteSql("UPDATE produit SET quantiteProduit = quantiteProduit - ? WHERE id_produit = ?", $Y_tableauValeurs3);
            }
            $Y_tableauValeurs4 = [$montantTotalRemise, $idClient];
            $Y_updateTransaction = F_executeRequeteSql("UPDATE `client` SET ristourne_gagner = ristourne_gagner + ? WHERE idClient = ? ", $Y_tableauValeurs4);
        }
        header("Location: clientsController.php");
        exit();
    }

    require('../views/clients/clientsView.php');
?>