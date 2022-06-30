<?php
$title = 'Accueil - Wild Earth';
require 'includes/fonctions/fonction_categorie.php';
$cates = getCate();
require 'includes/header.php';
?> 
<!----- HEADER ----->
<header>
    <div class="titre">
        <h1>WILD EARTH</h1>
        <p>La mode sauvage</p>
    </div>
</header>
<div class="space"></div>

<!----- CATEGORIES ----->
<sectio id="cate">
    <h1>Nos Catégories</h1>
    <div class="container">
        <?php foreach ($cates as $cate) : ?>
            <?= cateHTML($cate) ?>
        <?php endforeach ?>        
    </div>
</sectio>
<!----- SERVICES ----->
<section id="service">
    <h1>Nos Services</h1>
    <div class="contain">
        <div class="serv">
            <i class="fas fa-truck-moving"></i>
            <p>Livraison à domicile</p>
        </div>
        <div class="serv">
            <i class="fas fa-credit-card"></i>
            <p>Paiement sécurisé</p>
        </div>
        <div class="serv">
            <i class="fas fa-box-open"></i>
            <p>Satisfait ou Remboursé</p>
        </div>
    </div>
</section>

<!---------- FOOTER -->
<?php
require 'includes/footer.php'
?>  