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

// LIMIT et OFFSET (PDO ne supporte pas de placeholder)
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

    // Récupérer le dernier produit pour générer l'ID
    $dernierResultRaw = F_executeRequeteSql('SELECT id_produit FROM produit ORDER BY id_produit DESC LIMIT 1');
    $dernierResult = is_array($dernierResultRaw) ? $dernierResultRaw : [$dernierResultRaw];
    $dernierIdProduit = !empty($dernierResult) ? $dernierResult[0]->id_produit : null;

    $nouveauIdProduit = F_genereMatricule($dernierIdProduit, 'PRD00001');
    $idUser = "USR00001"; // temporaire

    $insertSql = 'INSERT INTO produit (id_produit, id_categorie, idUser, id_fournisseur, nomProduit, prix_vente, quantiteProduit, seuile_minimum, date_create) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())';
    $paramsInsert = [
        $nouveauIdProduit,
        $id_categorie,
        $idUser,
        $id_fournisseur,
        strtoupper($nomProduit),
        $prix_vente,
        $quantiteProduit,
        $seuile_minimum
    ];

    F_executeRequeteSql($insertSql, $paramsInsert);

    // Redirection pour éviter la double soumission
    header('Location: stockController.php');
    exit();
}

// --- Charger la vue ---
require('../views/stock/stockView.php');
?>
