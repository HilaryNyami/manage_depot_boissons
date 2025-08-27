<?php
    session_start(); //demarrer la session
    $currentPage = basename($_SERVER['PHP_SELF']); 

    //************* appel du fichier de connexion a la base de donnée***** */
    require_once("../models/H_databaseConnection.php");
    $H_dbConnect = F_databaseConnection("localhost", "m&ystore", "root", "");

    //**********appel du fichier des fonctions creer ************ */
    require("../models/H_functionsModels.php");
  
    
    // 4. Afficher tous les produits
    $Y_produit = F_executeRequeteSql("SELECT * FROM produit");
    $Y_categories = F_executeRequeteSql("SELECT * FROM categorie_produit");
    $Y_fournisseurs = F_executeRequeteSql("SELECT * FROM fournisseur");

    // 6. Ajout de produit
    if(isset($_POST['enregistrer'])){
        extract($_POST);
        // var_dump($_POST);
        // die();
        // array(7) { ["nomProduit"]=> string(4) "3333" ["prix_vente"]=> string(2) "33" ["id_categorie"]=> string(8) "CAT00001" ["quantiteProduit"]=> string(5) "33333" ["seuile_minimum"]=> string(2) "33" ["id_fournisseur"]=> string(8) "FRN00000" ["enregistrer"]=> string(0) "" }
        //******************************Dans la table Acheteur********************************
        //on recupere le dernier produit enregistré dans la bd
        $Y_dernierProduit = 'SELECT produit.id_produit  FROM produit ORDER BY id_produit  DESC LIMIT 1';
        $Y_executeDernierProduit = F_executeRequeteSql($Y_dernierProduit);
                                                
                                                        
        foreach($Y_executeDernierProduit as $Y_produit)
        {
            $Y_produit = $Y_produit->id_produit;                                                      
        }
                                                        
        $Y_nouveauIdProduit = F_genereMatricule($Y_produit, 'PRD00001'); //sinon on incremente le nième Acheteur
        // IDUSER TEMP
        $idUser = "USR00001";
        $Y_insertProduit = 'INSERT INTO produit(id_produit, id_categorie, idUser, id_fournisseur, nomProduit, prix_vente, quantiteProduit, seuile_minimum, date_create) VALUES(?, ?, ?, ?, ?, ?, ?, ?, NOW())';
        $Y_tableauValeurs = [$Y_nouveauIdProduit, $id_categorie, $idUser, $id_fournisseur, strtoupper($nomProduit), $prix_vente, $quantiteProduit, $seuile_minimum];
        $Y_executeInsertProduit = F_executeRequeteSql($Y_insertProduit, $Y_tableauValeurs); //ajoute le nouveau Acheteur pour la descente
        $H_tableauErreurs[] = 'Nouvel Acheteur enregistré avec success!!!';

        header('Location:stockController.php');

    }
    require('../views/stock/stockView.php');
?>
