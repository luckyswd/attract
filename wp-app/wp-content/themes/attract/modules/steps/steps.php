<?php

/*
Title: Модуль шагов
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$description = get_field('description');
$cards = get_field('cards');
?>

<?php if (!is_admin()) : ?>
    <section class="steps distance" id="steps">
        <?php anchorHelper('steps');?>

        <div class="container">
            <?php if (!empty($headline)) : ?>
                <h2 class="steps__headline">
                    <?= $headline ?>
                </h2>
            <?php endif; ?>

            <?php if (!empty($description)) : ?>
                <p class="steps__description">
                    <?= $description ?>
                </p>
            <?php endif; ?>

            <?php if (!empty($cards)) : ?>
                <div class="steps__cards">
                    <?php foreach ($cards as $card) :?>
                        <div class="steps__card">
                            <?php if ($card['icon']) : ?>
                                <div class="steps__card-icon">
                                    <?= getPictureImage($card['icon'], 80, 80) ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($card['subtitle']) : ?>
                                <div class="steps__card-subtitle">
                                    <?= $card['subtitle'] ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($card['description']) : ?>
                                <div class="steps__card-description">
                                    <?= $card['description'] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Модуль шагов</h2>
<?php endif; ?>