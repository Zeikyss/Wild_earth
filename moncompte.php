<?php
session_start();


require 'includes/bdd.php';
$req = $pdo->prepare("SELECT * FROM user WHERE user_identifiant = :user_identifiant");
$req->execute(array(
    'user_identifiant' => $_SESSION['user_identifiant'])
);
$result = $req->fetch(PDO::FETCH_ASSOC);
$profil = $result['id'];

$title = 'Mon Compte';
require 'includes/header.php';

?> 
<section id="compte">
    <div class="head_profil">
        <h1>Mon Compte</h1> 
    </div>
    <div class="space"></div>
        <div class="lien">
            <a href="commandes.php">Mes Commandes</a>
            <a href="historique.php">Mon Historique</a>
        </div>
    <div class="space"></div>
    <div class="profil">
        <h1>Mes Informations</h1>
        <p>Mon identifiant : <?= $result['user_identifiant']?></p>
        <p>Mon Nom : <?= $result['user_lastname']?></p>
        <p>Mon Prénom : <?= $result['user_firstname']?></p>
        <p>Mon Adresse Mail : <?= $result['user_email']?></p>
    </div>
    <div class="space">
    <div class="lien">
        <a href="edition.php">Editer mon profil</a>
    </div>
</section>
<div class="space"></div>

<!---------- FOOTER -->
<?php
require 'includes/footer.php'
?>  