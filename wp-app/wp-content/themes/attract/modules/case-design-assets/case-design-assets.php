<?php

/*
Title: Кейс - особенности дизайна
Mode: preview
*/

?>

<?php
?>

<?php if (!is_admin()) : ?>
    <section class="case-design-assets distance">
        <div class="container">
            <?php $color = get_field('color-palette') ?>
            <div class="case-design-assets__block">
                <div class="case-design-assets__title h5"><?= $color['title'] ?></div>
                <div class="case-design-assets__colors">
                    <?php foreach ($color['colors'] as $color) : ?>
                        <div class="case-design-assets__color <?= $color['invert_color'] ? 'case-design-assets__color_inverted' : '' ?>" style="background-color: <?= $color['color'] ?>"><span><?= $color['color'] ?></span></div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php $font = get_field('font') ?>
            <div class="case-design-assets__block">
                <div class="case-design-assets__title h5"><?= $font['title'] ?></div>
                <div class="case-design-assets__font-img"><img src="<?= $font['font-img'] ?>" alt=""></div>
            </div>
        </div>
    </section>
<?php else : ?>
    <h2 style="font-family: 'Mark', sans-serif;">Кейс - особенности дизайна</h2>
<?php endif; ?>