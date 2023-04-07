<?php

/*
Title: Информационный модуль
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$subheadline = get_field('subheadline');
$cards = get_field('cards');
$background_image = get_field('background_image');
?>

<?php if (!is_admin()) : ?>
<section class="information distance" style="background-image: url('<?=  $background_image['url'] ?>')">
    <?php anchorHelper('information');?>

    <div class="container">
            <?php if (!empty($headline)) : ?>
                <h2 class="information__headline">
                    <?= $headline ?>
                </h2>
            <?php endif; ?>

            <?php if (!empty($subheadline)) : ?>
                <p class="information__subheadline subtitle-main">
                    <?= $subheadline ?>
                </p>
            <?php endif; ?>
            <?php if (!empty($cards)) : ?>
                <div class="information__cards">
                    <?php foreach ($cards as $card) : ?>
                        <div class="information__card">
                            <?php if (!empty($card['title'])) : ?>
                                <div class="information__card-title">
                                    <?= $card['title'] ?>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($card['subtitle'])) : ?>
                                <div class="information__card-subtitle subtitle-main">
                                    <?= $card['subtitle'] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>


    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Информационный модуль</h2>
<?php endif; ?>