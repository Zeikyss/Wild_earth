<?php

if (session_status() !==2){
    session_start();
}
if(!empty($_POST) and isset($_POST['deco'])){
    unset($_SESSION['user_identifiant']);
    unset($_SESSION['user_kind']);
    unset($_SESSION['panier']);
    header("location: ./index.php");
    exit();
}

require 'fonctions/fonction_recherche.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="./CSS/style.css" type="text/css">
    <!-- FAVICON -->
    <link rel="icon" href="assets/img/favicon.ico" />
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- FONTFAMILY -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <title><?= $title ?? 'Ma boutique'; ?></title>
</head>
<body>
    <nav>
        <div class="burger">
            <span></span>
        </div> 
            <div class="first">
                <div class="logo">
                    <a href="index.php"><img src="./assets/img/logo.png" alt="">Wild Earth</a>
                </div>
                <div class="search">
                    <?= searchHTML() ?>
                </div>
                <div class="compte">
                    <?php if (!isset($_SESSION['user_identifiant'])) : ?>
                    <div class="connect">
                        <a href="connexion.php"><i class="fas fa-user"></i>Connexion</a>
                    </div>
                    <?php else : ?>
                    <div class="user">
                        <ul class="princ">
                            <li class="hide"><a href="moncompte.php"><i class="fas fa-user"></i>Mon Compte</a>
                                <ul class="sub">
                                    <li><a href="commandes.php">Mes commandes</a></li>
                                    <li><a href="historique.php">Mon historique</a></li>
                                    
                                </ul>
                            </li>
                        </ul>
                    </div>
                    
                    <?php endif ?>
                    <?php if (!isset($_SESSION['user_identifiant'])) : ?>
                        <a href="connexion.php"><i class="fas fa-shopping-basket"></i>Mon Panier</a>
                    </div>
                    <?php else : ?>
                        <a href="panier.php"><i class="fas fa-shopping-basket"></i>Mon Panier</a>
                    <?php endif ?>
                    <?php if (isset($_SESSION['user_identifiant'])) : ?>
                    <div class="deco">
                        <form action="" method="POST">
                            <button name="deco"><i class="fas fa-times"></i>Deconnexion</button>
                        </form>
                    </div>
                    <?php endif ?>
                </div>
            </div>
        <div class="menu">    
            <div class="second">
                <ul>
                    <li><a href="articles.php?categorie=1">Les T-Shirt</a></li>
                    <li><a href="articles.php?categorie=2">Les Casquettes</a></li>
                    <li><a href="articles.php?categorie=3">Les Mugs</a></li>
                    <li><a href="articles.php?categorie=4">Les Accessoires</a></li>
                </ul>
            </div>
        </div>
    </nav>