<?php
session_start();


if(!empty($_POST)){

    $pseudo = $_POST['user_identifiant'];
    $mail = $_POST['user_email'];
    $password = password_hash($_POST['user_password'], PASSWORD_BCRYPT);
    require 'includes/bdd.php';
    $req = $pdo->prepare("SELECT * FROM user WHERE user_identifiant = :user_identifiant");
    $req->execute(array('user_identifiant' => $_SESSION['user_identifiant']));
    $user = $req->fetch();
    $id = $user->id;

    $req = $pdo->prepare("UPDATE user SET user_identifiant = ?, user_email = ?, user_password = ? WHERE id = ?");

    $req->execute(array($pseudo, $mail, $password, $id));
    $_SESSION['user_identifiant'] = $pseudo;
    header('location: moncompte.php');
}

$title = 'Edition du profil - Wild Earth';
require 'includes/header.php';

?>

<section id="gestion">
    <div class="space"></div>
        <h1>Editer mes informations</h1>
        <div class="space"></div>
        <div class="edit">
            <form action="" method="POST">
                <div class="champ">
                    <label for="user_identifiant">Nouvel Identifiant</label>
                    <input type="text" name="user_identifiant">
                </div>
                <div class="champ">
                    <label for="user_password">Nouveau Mot de Passe</label>
                    <input type="password" name="user_password">
                </div>
                <div class="champ">
                    <label for="user_password">Confirmation du Mot de Passe</label>
                    <input type="password" name="conf_password">
                </div>
                <div class="champ">
                    <label for="user_email">Nouvelle Adresse Mail</label>
                    <input type="text" name="user_email">
                </div>
                <div class="flex">
                    <input type="submit" value="Modifier">
                </div>
            </form>
        </div>
</section>
<div class="space"></div>

<!---------- FOOTER -->
<?php
require 'includes/footer.php'
?>  