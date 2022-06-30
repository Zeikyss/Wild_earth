<?php
$title = 'Articles - Wild Earth';
require 'includes/fonctions/fonction_categorie.php';
$articles = getArt($_GET['categorie']);
require 'includes/header.php';
?> 
<?= articleHEAD($_GET['categorie']) ?>
<section class="article">
    <h1>Nos Articles</h1>
    <div class="art">
        <?php foreach ($articles as $article) : ?>
            <?= articleHTML($article) ?>
        <?php endforeach ?> 
    </div>
</section>   


<!---------- FOOTER -->
<?php
require 'includes/footer.php'
?>