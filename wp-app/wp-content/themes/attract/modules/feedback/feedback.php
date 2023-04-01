<?php

/*
Title: Отзывы
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$cards = get_field('cards');
?>

<?php if (!is_admin()) : ?>
    <section class="feedback distance">
        <div class="container">
            <?php if (!empty($headline)) : ?>
                <h2 class="feedback__headline">
                    <?= $headline ?>
                </h2>
            <?php endif; ?>

            <?php if (!empty($cards)) : ?>
                <div class="feedback__cards">
                    <?php foreach ($cards as $card) : ?>
                        <div class="feedback__card">

                            <?php if (!empty($card['client'])) : ?>
                                <div class="feedback__client">
                                    <?= $card['client'] ?>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($card['activity'])) : ?>
                                <div class="feedback__activity">
                                    <?= $card['activity'] ?>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($card['image'])) : ?>
                                <div class="feedback__image">
                                    <?= getPictureImage($card['image']) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Отзывы</h2>
<?php endif; ?>