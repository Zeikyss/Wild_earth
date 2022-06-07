<?php
$title = 'Article - Wild Earth';
require 'includes/fonctions/fonction_categorie.php';
require 'includes/header.php';
?> 
<div class="space"></div>
<section id="details">
    <?= artdescHTML($_GET['article']) ?>
</section>
<div class="space"></div>

<!---------- FOOTER -->
<?php
require 'includes/footer.php'
?>  