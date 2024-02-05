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
            <p class="h2"><?= $headline; ?></p>
        <?php endif; ?>
        <img src="<?= $image['url'] ?>" alt="<?= $image['alt']; ?>">
    </section>
<?php else : ?>
    <h2 style="font-family: 'Mark', sans-serif;">Полное изображение модуль</h2>
<?php endif; ?>