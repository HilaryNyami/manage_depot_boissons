<?php
session_start();
$currentPage = basename($_SERVER['PHP_SELF']);

// Connexion à la base
require_once("../models/H_databaseConnection.php");
$H_dbConnect = F_databaseConnection("localhost", "m&ystore", "root", "");

// Fonctions
require("../models/H_functionsModels.php");

// --- PARAMÈTRES DE PAGINATION ---
$page = isset($_GET['page']) && intval($_GET['page']) > 0 ? intval($_GET['page']) : 1;
$limit = 5;
$offset = ($page - 1) * $limit;

// --- PARAMÈTRE FILTRE CATÉGORIE ---
$categorie = isset($_GET['categorie']) && $_GET['categorie'] !== '' ? $_GET['categorie'] : null;

// --- REQUÊTE PRINCIPALE ---
$sql = "SELECT * FROM produit";
$params = [];

if ($categorie) {
    $sql .= " WHERE id_categorie = ?";
    $params[] = $categorie;
}

// LIMIT et OFFSET
$sql .= " LIMIT " . intval($limit) . " OFFSET " . intval($offset);

// Exécution de la requête
$Y_produit_raw = F_executeRequeteSql($sql, $params);
$Y_produit = is_array($Y_produit_raw) ? $Y_produit_raw : [$Y_produit_raw]; // Toujours tableau

// --- CALCUL DU TOTAL POUR PAGINATION ---
$sqlCount = "SELECT COUNT(*) as total FROM produit";
$paramsCount = [];

if ($categorie) {
    $sqlCount .= " WHERE id_categorie = ?";
    $paramsCount[] = $categorie;
}

$countResultRaw = F_executeRequeteSql($sqlCount, $paramsCount);
$countResult = is_array($countResultRaw) ? $countResultRaw : [$countResultRaw]; // Toujours tableau
$totalProduits = !empty($countResult) ? $countResult[0]->total : 0;
$totalPages = $totalProduits > 0 ? ceil($totalProduits / $limit) : 1;

// --- Récupérer toutes les catégories et fournisseurs ---
$Y_categories = F_executeRequeteSql("SELECT * FROM categorie_produit");
$Y_fournisseurs = F_executeRequeteSql("SELECT * FROM fournisseur");

// --- AJOUT DE PRODUIT ---
if (isset($_POST['enregistrer'])) {
        extract($_POST);

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

// --- MISE A JOUR DES PRODUIT ---
if(isset($_POST['maj'])){
    extract($_POST);

    $sqlUpdate = "UPDATE produit SET nomProduit=?, prix_vente=?, id_categorie=?, quantiteProduit=?, seuile_minimum=?, id_fournisseur=? WHERE id_produit=?";
    $paramsUpdate = [$nomProduit, $prix_vente, $id_categorie, $quantiteProduit, $seuile_minimum, $id_fournisseur, $id_produit];

    F_executeRequeteSql($sqlUpdate, $paramsUpdate);

    header("Location: stockController.php");
    exit();
}


// --- Charger la vue ---
require('../views/stock/stockView.php');
?>
