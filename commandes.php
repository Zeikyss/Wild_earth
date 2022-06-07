<?php
session_start();

require 'includes/bdd.php';



$title = 'Mon Compte - Wild Earth';
require 'includes/header.php';

?> 
<section id="commande">
    <div class="head_profil">
        <h1>Mes Commandes</h1> 
    </div>
    <div class="space"></div>
    <div class="contain">
            <p>Aucune commande en cours</p>
        </div>
</section>
<div class="space"></div>

<!---------- FOOTER -->
<?php
require 'includes/footer.php'
?>  