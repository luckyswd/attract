<?php

/*
Title: Наши кейсы
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$cards = get_field('cards');
?>

<?php if (!is_admin()) : ?>
    <section class="our-cases distance">
        <div class="container">
            <?php if (!empty($headline)) : ?>
                <h2 class="our-cases__headline">
                    <?= $headline ?>
                </h2>
            <?php endif; ?>
            <?php if (!empty($cards)) : ?>
                <div class="swiper our-cases__cards-swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($cards as $card) : ?>
                            <?php if (!empty($card)) : ?>
                                <div class="swiper-slide">
                                    <div class="our-cases__card-header">
                                        <?php if (!empty($card['services'])) : ?>
                                            <div class="our-cases__card-services">
                                                <?= '<span>Услуги агентства: </span>' . $card['services'] ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (!empty($card['geo'])) : ?>
                                            <div class="our-cases__card-geo">
                                                <?= '<span>ГЕО: </span>' . $card['geo'] ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (!empty($card['name'])) : ?>
                                            <div class="our-cases__card-name">
                                                <?= $card['name'] ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="our-cases__card-footer">
                                        <?php if (!empty($card['budget'])) : ?>
                                            <div class="our-cases__card-budget">
                                                <?= '<span>Бюджет: </span>' . $card['budget'] ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (!empty($card['work_time'])) : ?>
                                            <div class="our-cases__card-work-time">
                                                <?= '<span>Срок работы: </span>' . $card['work_time'] ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (!empty($card['arbitrary_field'])) : ?>
                                            <div class="our-cases__card-arbitrary-field">
                                                <?= $card['arbitrary_field'] ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (!empty($card['price_field'])) : ?>
                                            <div class="our-cases__card-price-field">
                                                <?= $card['price_field'] ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>

            <?php endif; ?>

        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Наши кейсы</h2>
<?php endif; ?>