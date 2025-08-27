<?php
    session_start(); //demarrer la session
    $currentPage = basename($_SERVER['PHP_SELF']); 
    
    //************* appel du fichier de connexion a la base de donnée***** */
    require_once("../models/H_databaseConnection.php");
    $H_dbConnect = F_databaseConnection("localhost", "fodjomanage2", "root", "");
  
    
    require('../views/fournisseurs/fournisseursView.php');
?>