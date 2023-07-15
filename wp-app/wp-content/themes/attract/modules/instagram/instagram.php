<?php

/*
Title: Инстаграм модуль
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$subheadline = get_field('subheadline');
$button = get_field('button');
$image = get_field('image');
?>

<?php if (!is_admin()) : ?>
    <section class="instagram distance">
        <div class="block-anchor" id="instagram"></div>
        <div class="container">
            <div class="instagram-wrapper">
                <div class="sticky-wrap">
                    <p class="h3"><?= $headline ?? '' ?></p>
                    <p class="subheadline"> <?= $subheadline ?? '' ?></p>
                    <a href="<?= $button['url'] ?>" class="btn white"><?= $button['title'] ?></a>
                </div>
            </div>
            <div class="instagram-image">
                <?= getPictureImage($image, 475, 900) ?>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Инстаграм модуль</h2>
<?php endif; ?>