<?php
function getUsers()
{
    require 'includes/bdd.php';
    $req = $pdo->prepare("SELECT * FROM user");
    $req->execute();
    $users = $req->fetchAll();
    return $users;
}
function admin_userHTML($user)
{
    return <<<HTML
    <div class="supp">
        <div> 
            <form method="POST">
            <button type="submit" name="user_del" value="$user->id">Supprimer</button></form></div>
        <div><p>$user->user_identifiant</p></div>    
    </div>
HTML;
}
function del_user($id)
{
    require 'includes/bdd.php';
    $req = $pdo->prepare("DELETE FROM user WHERE id = ?");
    $req->execute([$id]);
}


// Articles
function getArticle()
{
    require 'includes/bdd.php';
    $req = $pdo->prepare("SELECT * FROM article");
    $req->execute();
    $articles = $req->fetchAll();
    return $articles;
}
function admin_artHTML($article)
{
    return <<<HTML
    <div class="supp">
        <div> 
            <form method="POST">
            <button type="submit" name="art_del" value="$article->id">Supprimer</button></form></div>
        <div><p>$article->art_nom</p></div>    
    </div>
HTML;
}
function del_art($id)
{
    require 'includes/bdd.php';

    $req = $pdo->prepare("SELECT art_img FROM article WHERE id = ?");
    $req->execute([$id]);
    $img = $req->fetch();
    $fichier = "assets/img/articles/" . $img->art_img;
    unlink($fichier);
    $req = $pdo->prepare("DELETE FROM article WHERE id = ?");
    $req->execute([$id]);
}

//NEWSLETTERS
function getNews()
{
    require 'includes/bdd.php';
    $req = $pdo->prepare("SELECT * FROM news");
    $req->execute();
    $news = $req->fetchAll();
    return $news;
}
function admin_newHTML($new)
{
    return <<<HTML
    <div class="supp">
        <div><form method="POST"><button type="submit" name="new_del" value="$new->id">Supprimer</button></form></div>
        <div><p>$new->new_titre </p></div>
    </div>
HTML;
}
function del_new($id)
{
    require 'includes/bdd.php';

    $req = $pdo->prepare("SELECT new_img FROM news WHERE id = ?");
    $req->execute([$id]);
    $img = $req->fetch();
    $fichier = "assets/img/news/" . $img->new_img;
    unlink($fichier);
    $req = $pdo->prepare("DELETE FROM news WHERE id = ?");
    $req->execute([$id]);
}
?>