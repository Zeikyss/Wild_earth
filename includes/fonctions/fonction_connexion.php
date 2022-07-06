<?php
//CONNEXION
function getConnexionErrors(array $post): ?array
{
    $errors = [];
    if (empty($post['user_identifiant'])) {
        $errors['id'] = "Entrez votre identifiant";
    }
    if (empty($post['user_password'])) {
        $errors['password'] = "Entrez votre password";
    }
    return $errors;
}

function testConnexion(array $post): bool
{
    require 'includes/bdd.php';
    $req = $pdo->prepare("SELECT * FROM user WHERE user_identifiant = ?");
    $req->execute([
        $post['user_identifiant']
    ]);
    $user = $req->fetch();
    if (!($user) or !(password_verify($post['user_password'], $user->user_password))) {
        return false;
    } else {
        session_start();
        $_SESSION['user_identifiant'] = $user->user_identifiant;
        $_SESSION['user_kind'] = $user->user_kind;
        return true;
    }
}
//INSCRIPTION
function getInscriptionErrors(array $post): ?array
{
    $errors = [];
    if (empty($post['user_identifiant'])) {
        $errors['id'] = 'Identifiant requis';
    } elseif (strlen($post['user_identifiant']) < 3) {
        $errors['id'] = 'Identifiant trop court';
    } elseif (strlen($post['user_identifiant']) > 20) {
        $errors['id'] = 'Identifiant trop long';
    }
    if (!empty($post['user_firstname']) && strlen($post['user_firstname']) > 20) {
        $errors['name'] = "Prenom trop long";
    }
    if (!empty($post['user_lastname']) && strlen($post['user_lastname']) > 20) {
        $errors['lastname'] = "Nom trop long";
    }
    if (empty($post['user_email'])) {
        $errors['email'] = 'Email requis';
    } elseif (!filter_var($post['user_email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email invalide';
    }
    if (empty($post['user_password'])) {
        $errors['password'] = 'Mot de passe requis';
    } elseif (strlen($post['user_password']) < 6) {
        $errors['password'] = 'Mot de passe trop court (6 charactere mini)';
    }
    if (($post['user_password']) != ($post['conf_password'])) {
        $errors['confirmation'] = 'Confirmation mot de passe incorrecte';
    }
    if (empty($errors)) {
        require 'includes/bdd.php';
        $req = $pdo->prepare("SELECT * FROM user WHERE user_identifiant = ? OR user_email = ? ");
        $req->execute([
            $post['user_identifiant'],
            $post['user_email']
        ]);
        $utilisateur = $req->fetch();
        if ($utilisateur) {
            if ($utilisateur->user_identifiant === $post['user_identifiant'])
                $errors['id'] = 'Identifiant déjà enregistré';
        } else {
            $error['email'] = 'Email déjà enregistré';
        }
    }
    return $errors;
}

function exe_inscription(array $post): void
{
    require 'includes/bdd.php';
    $user_password = password_hash($post['user_password'], PASSWORD_BCRYPT);
    $user_firstname = $post['user_firstname'] ?? null;
    $user_lastname = $post['user_lastname'] ?? null;
    if (!isset($post['user_kind'])) {
        $post['user_kind'] = 2;
    }
    $req = $pdo->prepare("INSERT INTO user (user_identifiant, user_firstname, user_lastname, user_email, user_password, user_kind) 
    VALUES (:user_identifiant, :user_firstname, :user_lastname, :user_email, :user_password, :user_kind)");
    $req->execute([
        'user_identifiant' => $post['user_identifiant'],
        'user_firstname' => $user_firstname,
        'user_lastname' => $user_lastname,
        'user_email' => $post['user_email'],
        'user_password' => $user_password,
        'user_kind' => $post['user_kind'],
    ]);
    
}

?>