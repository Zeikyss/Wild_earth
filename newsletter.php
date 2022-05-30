<?php
$title = 'Newsletters';
require 'includes/fonctions/fonction_newsletters.php';
$newsletters = getNewsletters();
require 'includes/header.php';
?>

<div class="space"></div>
    <?php if (!empty($newsletters)) : ?>
        <div id="newsletters">
            <div>
                <?php foreach ($newsletters as $newsletter) : ?>
                    <?= newsletterHTML($newsletter) ?>
                <?php endforeach ?>
            </div>
        </div>
    <?php endif ?>
<div class="space"></div>
<?php
require 'includes/footer.php'
?>  