<?php
function getSearch(){
    require 'includes/bdd.php';
    $req = $pdo->query("SELECT * FROM article");
    if(isset($_GET['s']) AND !empty($_GET['s'])){
        $search = htmlspecialchars($_GET['s']);
        $art = $pdo->query('SELECT art_nom FROM article WHERE art_nom LIKE "%'.$search.'%" ');
    }
}

function searchHTML(){
    return <<<HTML
    <form action="./liste_article.php" method="GET">
        <input type="search" name="s" placeholder="Rechercher">
        <input type="submit" name="envoyer">
    </form>  
    
HTML;    
}

?>