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
        <?php anchorHelper('feedback'); ?>

        <div class="container">
            <?php if (!empty($headline)) : ?>
                <h2 class="feedback__headline">
                    <?= $headline ?>
                </h2>
            <?php endif; ?>

            <?php if (!empty($cards)) : ?>
                <div class="swiper feedback__swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($cards as $card) : ?>
                            <div class="swiper-slide">
                                <div class="feedback__card" id="<?= extractIdFromLink($card['video']) ?>">
                                    <?php if (!empty($card['client'] || !empty($card['activity']))) : ?>
                                        <div class="feedback__contact">
                                            <p><strong> <?= $card['client'] ?? '' ?> </strong></p>
                                            <p><?= $card['activity'] ?? '' ?></p>
                                        </div>
                                    <?php endif; ?>
                                    <div class="feedback__image">
                                        <?php
                                        $src = !empty($card['image']) ? $card['image']['url'] : getYoutubePreview(extractIdFromLink($card['video']));
                                        ?>
                                        <picture>
                                            <img loading="lazy" src="<?= $src ?>" alt="предварительный просмотр видео">
                                        </picture>
                                        <div class="feedback__btn-play">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="32" height="32"
                                                 viewBox="0 0 32 32">
                                                <title>play</title>
                                                <path
                                                    d="M30.662 5.003c-4.488-0.645-9.448-1.003-14.662-1.003s-10.174 0.358-14.662 1.003c-0.86 3.366-1.338 7.086-1.338 10.997s0.477 7.63 1.338 10.997c4.489 0.645 9.448 1.003 14.662 1.003s10.174-0.358 14.662-1.003c0.86-3.366 1.338-7.086 1.338-10.997s-0.477-7.63-1.338-10.997zM12 22v-12l10 6-10 6z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Отзывы</h2>
<?php endif; ?>