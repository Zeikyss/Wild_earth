<?php

if (session_status() !== 2) {
    session_start();
}
if (empty($_SESSION['user_kind']) or ($_SESSION['user_kind'] != 1)) {
    echo 'ACCES REFUSE';
    header('location: index.php');
}
if (!isset($_GET['index'])) {
    $_GET['index'] = '2';
}

require 'includes/fonctions/fonction_categorie.php';
require 'includes/fonctions/fonction_connexion.php';
require 'includes/fonctions/fonction_dashboard.php';
require 'includes/fonctions/fonction_newsletters.php';

if ($_GET['index'] == 2){
    $optionsArt = optionArt();
}

if (isset($_POST['user_del'])) {
    del_user($_POST['user_del']);
}
if (isset($_POST['art_del'])) {
    del_art($_POST['art_del']);
}
if (isset($_POST['new_del'])) {
    del_new($_POST['new_del']);
}

if (isset($_POST['inscription'])){
    exe_inscription($_POST);
    $_POST = [];
}
if (isset($_POST['article'])){
    exe_art($_POST, $_FILES);
    $_POST = [];
}
if (isset($_POST['news'])){
    exe_news($_POST, $_FILES);
    $_POST = [];
}
if ($_GET['index'] == '1') {
    $users = getUsers();
}
if ($_GET['index'] == '2') {
    $articles = getArticle();
}
if ($_GET['index'] == '3') {
    $news = getNews();
}
$title = 'Dashboard';
require 'includes/header.php';

?> 

<section id="dash">
<h1>DASHBOARD</h1>
<hr>
    <div class="contenant">
        <div class="index">
            <div><a href="dashboard.php?index=1">Utilisateurs</a></div>
            <div><a href="dashboard.php?index=2">Articles</a></div>
            <div><a href="dashboard.php?index=3">Newsletter</a></div>
        </div>
        <div class="affichage">
            <?php if ($_GET['index'] === '1') : ?>
                <?php require 'includes/dashboard_part/user_part.php'; ?>
            <?php elseif ($_GET['index'] === '2') : ?> 
                <?php require 'includes/dashboard_part/article_part.php'; ?>
            <?php elseif ($_GET['index'] === '3') : ?> 
                <?php require 'includes/dashboard_part/news_part.php'; ?>
            <?php endif ?>        
        </div>
    </div>
</section>
<div class="space"></div>


<!---------- FOOTER -->
<?php
require 'includes/footer.php'
?>  