<?php 
// definition du chemin de la base du site
define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT'] . "/php-bdd/");

// Inclusion des fichiers defonction et de connexion
// à la BDD
include_once(ROOT_DIR . "includes/functions/functions.php");
include_once(ROOT_DIR . "includes/functions/constants.php");
include_once(ROOT_DIR . "config/db/dbdata.inc.php");

// demarrage de la session
session_start();

// creation d'un interrupteur de debug
$env = 'dev';

// Tableau des formats d'images authorisés
$allaowedImgFormats = ['jpeg', 'jpg', 'png', 'gif', 'svg'];

// tableaux destinés àncontenir les messages d'erreur ou de succes
$errors = [];
$fieldErrors = [];
$success = [];

// Récuperation d'un objet PDO
$pdo = getPDO($dbdata);

// nettoyage des donnée si elles existent
sanitizeGetPostData();






