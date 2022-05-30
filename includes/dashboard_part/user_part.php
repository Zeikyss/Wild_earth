<div>
    <h1>Ajout d'utilisateurs</h1>
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
        <div class="champ">
            <label for="user_kind">Administrateur</label>
            <input type="radio" name="user_kind" value="1">
            <label for="user_kind">Membre</label>
            <input type="radio" name="user_kind" value="2" checked>
        </div>
        <div class="flex">
            <button type="submit" name="inscription">AJOUTER</button>
        </div>
    </form>
    <hr>
    <?php if (!empty($users)) : ?>
        <h1>Gestion des Utilisateurs</h1>
        <div>
            <?php foreach ($users as $user) : ?>
                <?= admin_userHTML($user) ?>
            <?php endforeach ?>
        </div>
    <?php endif ?>
</div>