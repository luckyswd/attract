<?php

/*
Title: Почему мы модуль
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$subheadline = get_field('subheadline');
$cards = get_field('cards');

$headline_solution = get_field('headline_solution');
$subheadline_solution = get_field('subheadline_solution');
$button = get_field('button');
$background_image_1 = get_field('background_image_1');
$background_image_2 = get_field('background_image_2');
$background_image_1_tablet = get_field('background_image_1_tablet');
$background_image_2_tablet = get_field('background_image_2_tablet');
?>

<?php if (!is_admin()) : ?>
    <section class="why-us distance">
        <div class="block-anchor" id="why-us"></div>
        <div class="container">
            <p class="h3"> <?= $headline ?? '' ?> </p>
            <p class="text-1"> <?= $subheadline ?? '' ?> </p>
            <?php if (!empty($cards)) : ?>
                <div class="why-us__cards">
                    <?php foreach ($cards as $card) : ?>
                        <?php if (!empty($card)) : ?>
                            <div class="why-us__card">
                                <div class="card-image">
                                    <?= getPictureImage($card['image'], 272, 272) ?>
                                </div>
                                <p class="text-3"><?= $card['text'] ?></p>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="solution-wrapper">
                <p class="h5"> <?= $headline_solution ?? '' ?> </p>
                <p class="text-2"> <?= $subheadline_solution ?? '' ?> </p>
                <a href="<?= $button['link'] ?? '' ?>" class="btn white"><?= $button['title'] ?? '' ?></a>
                <div class="background-image-1">
                    <picture>
                        <source media="(min-width: 1400px)" srcset="<?= $background_image_1['url'] ?>">
                        <img src="<?= $background_image_1_tablet['url'] ?>" alt="картинка" width="564" height="564">
                    </picture>
                </div>
                <div class="background-image-2">
                    <picture>
                        <source media="(min-width: 1400px)" srcset="<?= $background_image_2['url'] ?>">
                        <img src="<?= $background_image_2_tablet['url'] ?>" alt="картинка" width="564" height="564">
                    </picture>
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Почему мы модуль</h2>
<?php endif; ?>