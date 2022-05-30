<?php
$title = 'Connexion';
$errors = null;
$error = null;
require 'includes/fonctions/fonction_connexion.php';
if (!empty($_POST) and isset($_POST['connexion'])) {
    $errors = getConnexionErrors($_POST);
    if (empty($errors)) {
        if (!(testConnexion($_POST))) {
            $error = "Identifiant ou mot de passe incorrecte.";
        }
    }
}

if (isset($_SESSION['user_identifiant'])) {
    header('location: index.php');
    exit();
}
$success = false;
if (!empty($_POST) and isset($_POST['inscription'])) {
    $errors = getInscriptionErrors($_POST);
    if (empty($errors)) {
        exe_inscription($_POST);
        $success = true;
        $_POST = [];
    }
}
require 'includes/header.php';
?> 

<!---------- CONNEXION ---------->
<div class="space"></div>
<div class="form">
    <section class="connexion">
        <div class="space"></div>
            <h1>CONNEXION : </h1>

            <?php if ($error) : ?>
                <div class="error">
                    <p><?= $error ?></p>
                </div>
            <?php endif ?>

            <div class="conn">
                <form action="" method="POST">
                    <div class="champ">
                        <label for="user_identifiant">Identifiant :</label>
                        <input type="text" name="user_identifiant" placeholder="Votre identifiant" required>
                        <?php if (isset($errors['id'])) : ?>
                            <p class="errors"><?= $errors['id'] ?></p>
                        <?php endif ?>
                    </div>
                    <div class="champ">
                        <label for="user_password">Mot de passe :</label>
                        <input type="password" name="user_password" placeholder="Mot de passe" required>
                        <?php if (isset($errors['password'])) : ?>
                            <p class="errors"><?= $errors['password'] ?></p>
                        <?php endif ?>
                    </div>
                    <div class="flex">
                        <button type="submit" name="connexion">Se connecter</button>
                    </div>
                </form>
            </div>
    </section>
    <hr>
    <!-- INSCRIPTION -->
    <section class="inscription">
    <div class="space"></div>
        <h1>INSCRIPTION</h1>
        <?php if ($success) : ?>
            <div class="success">
                <p>Félicitation, inscription Réussite. Bienvenue parmis nous !</p>
            </div>
        <?php endif ?>
            <div class="insc">
                <form action="" method="POST">
                    <div class="champ">
                        <label for="user_identifiant">Identifiant :</label>
                        <input type="text" name="user_identifiant" placeholder="Votre identifiant" required>
                        <?php if (isset($errors['id'])) : ?>
                            <p class="errors"><?= $errors['id'] ?></p>
                        <?php endif ?>
                    </div>
                    <div class="flex2">
                        <div class="champ">
                            <label for="user_firstname">Prénom :</label>
                            <input type="text" name="user_firstname" placeholder="Votre prénom">
                            <?php if (isset($errors['name'])) : ?>
                                <p class="errors"><?= $errors['name'] ?></p>
                            <?php endif ?>
                        </div>
                        <div class="champ">
                            <label for="user_lastname">Nom :</label>
                            <input type="text" name="user_lastname" placeholder="Votre nom">
                            <?php if (isset($errors['lastname'])) : ?>
                                <p class="errors"><?= $errors['lastname'] ?></p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="champ">
                        <label for="user_email">Adresse email :</label>
                        <input type="text" name="user_email" placeholder="Votre email" required>
                        <?php if (isset($errors['email'])) : ?>
                            <p class="errors"><?= $errors['email'] ?></p>
                        <?php endif ?>
                    </div>
                    <div class="champ">
                        <label for="user_password">Mot de passe :</label>
                        <input type="password" name="user_password" placeholder="Mot de passe" required>
                        <?php if (isset($errors['password'])) : ?>
                            <p class="errors"><?= $errors['password'] ?></p>
                        <?php endif ?>
                    </div>
                    <div class="champ">
                        <label for="conf_password">Confirmer mot de passe :</label>
                        <input type="password" name="conf_password" placeholder="Confirmation" required>
                        <?php if (isset($errors['confirmation'])) : ?>
                            <p class="errors"><?= $errors['confirmation'] ?></p>
                        <?php endif ?>
                    </div>
                    <div class="flex">
                        <button type="submit" name="inscription">S'inscrire</button>
                    </div>
                </form>
            </div>
    </section>
</div>
<div class="space"></div>


<!---------- FOOTER -->
<?php
require 'includes/footer.php'
?>  