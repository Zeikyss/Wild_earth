<div>
    <h1>Ajout d'articles</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <select name="ID_cate" id="">
        <?php foreach($optionsArt as $optionArt): ?>
            <?php echo "<option value='{$optionArt->id}'>{$optionArt->cate_nom}</option>" ?>
        <?php endforeach; ?>   
        </select>
        <div class="champ">
            <label for="art_img">Ajouter une image :</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
            <input type="file" name="art_img" required>
        </div>
        <div class="champ">
            <label for="art_nom">Ajouter un nom :</label>
            <input type="text" name="art_nom" id="" placeholder="Nom" required>
        </div>
        <div class="champ">
            <label for="dino_descp">Description :</label><br>
            <textarea type="text" name="art_desc" placeholder="Description Article" id="textarea"> </textarea>
        </div>
        <div class="champ">
            <label for="art_prix">Ajouter un prix :</label>
            <input type="text" name="art_prix" id="" placeholder="Prix" required>
        </div>
        <button type="submit" name="article">AJOUTER</button>
    </form>
    <hr>
    <?php if (!empty($articles)) : ?>
        <h1>Gestion des Articles</h1>
        <div>
            <?php foreach ($articles as $article) : ?>
                <?= admin_artHTML($article) ?>
            <?php endforeach ?>
        </div>
    <?php endif ?>
</div>