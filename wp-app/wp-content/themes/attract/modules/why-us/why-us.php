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
$background_image = get_field('background_image');
$background_image_tablet = get_field('background_image_tablet');
?>

<?php if (!is_admin()) : ?>
    <section class="why-us distance">
        <div class="block-anchor" id="why-us"></div>
        <div class="container">
            <h2 class="h3"> <?= $headline ?? '' ?> </h2>
            <p class="text-1"> <?= $subheadline ?? '' ?> </p>
            <?php if (!empty($cards)) : ?>
                <div class="why-us__cards">
                    <?php foreach ($cards as $key => $card) : ?>
                        <?php if (!empty($card)) : ?>
                            <div class="why-us__card" style="background-image: url(<?= $card['image']['url'] ?>)">
                                <p class="why-us__number text-2">(0<?= $key + 1 ?>)</p>
                                <p class="text-3"><?= $card['text'] ?></p>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <div class="solution-wrapper">
                        <p class="h5"> <?= $headline_solution ?? '' ?> </p>
                        <p class="text-3"> <?= $subheadline_solution ?? '' ?> </p>
                        <a href="<?= $button['url'] ?? '' ?>" class="btn blue"><span><?= $button['title'] ?? '' ?></span></a>
                        <div class="background-image-1">
                            <picture>
                                <source media="(min-width: 1400px)" srcset="<?= $background_image['url'] ?>">
                                <img src="<?= $background_image_tablet['url'] ?>" alt="картинка" width="564" height="564">
                            </picture>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Почему мы модуль</h2>
<?php endif; ?>