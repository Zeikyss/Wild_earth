<?php
//CATEGORIE
function getCate(){
    require 'includes/bdd.php';
    $req = $pdo->prepare("SELECT * FROM categorie");
    $req->execute();
    $cates = $req->fetchAll();
    return $cates;
}
function cateHTML($cate){
    $url = "assets/img/categories/" . $cate->cate_img;
    return <<<HTML
    <div class="categorie">
        <a href="articles.php?categorie=$cate->id">
            <img src="$url" alt="">
            <h1>$cate->cate_nom</h1>
        </a>
    </div>
HTML;
}


//ARTICLES
function getArt($id_cate){
    require 'includes/bdd.php';
    $req = $pdo->prepare("SELECT * FROM article WHERE ID_cate = ?");
    $req->execute([$id_cate]);
    $articles = $req->fetchAll();
    return $articles;
}
function articleHTML($article){
    $url = "assets/img/articles/" . $article->art_img;
    return <<<HTML
    <div class="list">
        <a href="article_details.php?article=$article->id">
            <img src="$url" alt="">
            <p>$article->art_nom</p>
        </a>
    </div>    
HTML;    
}
function articleHEAD($id){
    require 'includes/bdd.php';
    $req = $pdo->prepare("SELECT * FROM categorie WHERE id = ?");
    $req->execute([$id]);
    $head = $req->fetch();
    $url = "assets/img/categories/" . $head->cate_head;
    $style = "background-image: url($url);
    background-size: cover;
    background-position: 20% 50%;
    background-repeat: no-repeat;
    max-height: 600px";
    return <<<HTML
        <header class="head" style="$style">
            <h1>$head->cate_nom</h1>
        </header>
HTML;    
}
function optionArt(){
    require 'includes/bdd.php';
    $req  = $pdo->prepare("SELECT id, cate_nom FROM categorie");
    $req->execute();
    $articles = $req->fetchAll();
    return $articles;
}
function exe_art($post, $files){
    require 'includes/bdd.php';
    $uploadimg = 'assets/img/articles/';
    $uploadfileimg = $uploadimg . basename($files['art_img']['name']);
    if ( move_uploaded_file($files['art_img']['tmp_name'], $uploadfileimg)){
            $req = $pdo->prepare("INSERT INTO article (ID_cate, art_nom, art_img, art_desc, art_prix) VALUES (:ID_cate, :art_nom, :art_img, :art_desc, :art_prix)");
            $req->execute([
                'ID_cate' => $post['ID_cate'],
                'art_nom' => $post['art_nom'],
                'art_img' => $files['art_img']['name'],
                'art_desc' => $post['art_desc'],
                'art_prix' => $post['art_prix'],
            ]);
    }
}
function artdescHTML($id){
    require 'includes/bdd.php';
    $req = $pdo->prepare("SELECT * FROM article WHERE id = ?");
    $req->execute([$id]);
    $article = $req->fetch();
    $url = "assets/img/articles/" . $article->art_img;

return <<<HTML
    <h1>$article->art_nom</h1>
    <div class="space"></div>
    <div class="art_det">
        <div class="img_art">
            <img src="$url" alt="">
        </div>    
        <div class="detail">
            <div class="detail_text">
                <p>$article->art_desc</p>
            </div>
            <div class="prix">
                <p>$article->art_prix €</p>
            </div>
            <div class="panier">
                <a href="panier.php?action=ajout&amp;l=$article->art_nom&amp;q=QUANTITEPRODUIT&amp;p=$article->art_prix" >Ajouter au panier</a>
            </div>
        </div>
    </div>
    
HTML; 
}

?>

