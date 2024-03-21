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
                    <h2 class="h3"><?= $headline ?? '' ?></h2>
                    <p class="subheadline"> <?= $subheadline ?? '' ?></p>
                    <a href="<?= $button['url'] ?>" target="_blank" class="btn white"><span><?= $button['title'] ?></span></a>
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