<?php

/*
Title: Изображение в контентной области модуль
Mode: preview
*/

?>

<?php
$image = get_field('image');
?>

<?php if (!is_admin()) : ?>
    <section class="content-image distance">
        <div class="container">
            <div class="content-image__wrap">
                <img src="<?= $image['url'] ?>" alt="<?= $image['alt']; ?>">
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Изображение в контентной области модуль</h2>
<?php endif; ?>