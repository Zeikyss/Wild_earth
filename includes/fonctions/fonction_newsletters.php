<?php
function getNewsletters(){
    require 'includes/bdd.php';
    $req = $pdo->prepare("SELECT * FROM news ORDER BY new_date DESC LIMIT 8");
    $req->execute();
    $news = $req->fetchAll();
    return $news;
}
function newsletterHTML($new){
    $url = "./assets/img/news/" . $new->new_img;
    return <<<HTML
    <div class="news">
        <h2>$new->new_titre</h2>
        <img src="$url" alt="">
        <p>$new->new_desc</p>
    </div>    
HTML;    
}
function exe_news($post, $files){
    require 'includes/bdd.php';
    $uploadfolder = 'assets/img/news/';
    $uploadfile = $uploadfolder . basename($files['new_img']['name']);
    $date = time();
    if (move_uploaded_file($files['new_img']['tmp_name'], $uploadfile)){
        $req = $pdo->prepare("INSERT INTO news (new_titre, new_desc, new_img, new_date) VALUES (:new_titre, :new_desc, :new_img, :new_date)");
        $req->execute([
            'new_titre' => $post['new_titre'],
            'new_desc' => $post['new_desc'],
            'new_img' => $files['new_img']['name'],
            'new_date' => $date
        ]);
    }
}
?>