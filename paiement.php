<?php
$title = 'Paiement - Wild Earth';
require 'includes/header.php';
?>
<div class="head_panier">
   <h1>Confirmation de Paiement</h1>
</div>
<div class="space"></div>

<div class="paiement">
    <form action="" method="POST">
        <div class="champ">
            <label for="name">Votre Nom</label>
            <input type="text" name="name" placeholder="Notre Nom" required>
        </div>
        <div class="champ">
            <label for="email">Votre Email</label>
            <input type="text" name="email" placeholder="Votre Email" required>
        </div>
        <div class="champ">
            <label for="card">Votre Numéro de Carte Bleue</label>
            <input type="text" name="card" placeholder="Votre Numéro de Carte Bleue" required>
        </div>
        <div class="flex3">
            <div class="champ">
                <label for="mois">Mois</label>
                <input type="text" name="mois" placeholder="MM" required>
            </div>
            <div class="champ">
                <label for="annee">Année</label>
                <input type="text" name="annee" placeholder="YY" required>
            </div>
            <div class="champ">
                <label for="crypt">Code de Sécurité</label>
                <input type="text" name="crypt" placeholder="CVC" required>
            </div>
        </div>
        <div class="champ">
            <label for="adresse">Adresse de livraison</label>
            <input type="text" name="adresse" placeholder="Adresse de livraison" required>
        </div>
        <div class="flex3">
            <div class="champ">
                <label for="cp">Code Postal</label>
                <input type="text" name="cp" placeholder="Code Postal" required>
            </div>
            <div class="champ">
                <label for="ville">Ville</label>
                <input type="text" name="ville" placeholder="Ville" required>
            </div>
        </div>
        <div class="flex">
            <button type="submit" name="achat">Acheter</button>
        </div>
    </form>
</div>
<div class="space"></div>
<?php
require 'includes/footer.php'
?>  