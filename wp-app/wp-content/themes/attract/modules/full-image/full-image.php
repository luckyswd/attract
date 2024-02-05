<?php

/*
Title: Полное изображение модуль
Mode: preview
*/

?>

<?php
$image = get_field('image');
$headline = get_field('headline');
?>

<?php if (!is_admin()) : ?>
    <section class="full-image distance">
        <?php if ($headline) : ?>
            <div class="container">
                <p class="h4"><?= $headline; ?></p>
            </div>
        <?php endif; ?>
        <img src="<?= $image['url'] ?>" alt="<?= $image['alt']; ?>">
    </section>
<?php else : ?>
    <h2 style="font-family: 'Mark', sans-serif;">Полное изображение модуль</h2>
<?php endif; ?>