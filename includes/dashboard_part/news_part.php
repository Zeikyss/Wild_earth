<div>
    <h1>Ajout de Newsletters</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="champ">
            <label for="new_titre">Titre News :</label>
            <input type="text" name="new_titre" placeholder="Titre" required>
        </div>
        <div class="champ">
            <label for="new_desc">Description News :</label><br>
            <textarea type="text" name="new_desc" cols="30" rows="8" id="textarea" required></textarea>
        </div>
        <div class="champ">
            <label for="new_img">Ajouter une image :</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
            <input type="file" name="new_img" required>
        </div>
        <div class="flex">
            <button type="submit" name="news">Ajouter</button>
        </div>
    </form>
    <hr>
    <?php if (!empty($news)) : ?>
        <h1>Gestion des News</h1>
        <div>
            <?php foreach ($news as $new) : ?>
                <?= admin_newHTML($new) ?>
            <?php endforeach ?>
        </div>
    <?php endif ?>
</div>