<?php

/*
Title: Полное изображение модуль
Mode: preview
*/

?>

<?php
$image = get_field('image');
?>

<?php if (!is_admin()) : ?>
    <section class="full-image distance">
        <?= getPictureImage($image, 1920, 600) ?>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Полное изображение модуль</h2>
<?php endif; ?>