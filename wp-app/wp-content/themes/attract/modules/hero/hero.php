<?php

/*
Title: Главный модуль
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$subheadline = get_field('subheadline');
$image = get_field('image');
$btn_text = get_field('btn_text');
$btn_name = get_field('btn_name');
$headline_profit = get_field('headline_profit');
$profit_cards = get_field('profit_cards');
$tags = get_field('tags');
?>

<?php if (!is_admin()) : ?>
    <section class="hero distance">
        <div class="container">
            <div class="hero__wrapper">
                <div class="hero__main">
                    <h1><?= $headline ?? '' ?></h1>
                    <div class="subheadline-button-wrapper">
                        <div class="hero__main-image">
                            <?= getPictureImage($image, 122, 122) ?>
                        </div>
                        <div class="hero__main-subheadline">
                            <p class="text-2"><?= $subheadline ?? '' ?></p>
                        </div>
                        <div class="hero__main-button-wrapper">
                            <p class="text-4"><?= $btn_text ?? '' ?></p>
                            <a href="#contact-form"><?= $btn_name ?? '' ?></a>
                        </div>
                    </div>
                </div>
                <?php if (!empty($tags)) : ?>
                    <div class="marquee-container">
                        <div class="marquee-content marquee3k"
                             data-speed="1"
                             data-pausable="true">
                            <p>
                                <?php foreach ($tags as $tag) : ?>
                                    <span class="marquee-tag"><?= mb_strtoupper($tag['name'] ?? '') ?></span>
                                <?php endforeach; ?>
                            </p>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="hero__profit">
                    <p class="h3"><?= $headline_profit ?? '' ?></p>
                    <?php if (!empty($profit_cards)) : ?>
                        <div class="hero__profit-cards">
                            <?php foreach ($profit_cards as $card) : ?>
                                <?php if (!empty($card)) : ?>
                                    <div class="profit-card"
                                         style="background-image: url(<?= $card['background_image']['url'] ?? '' ?>)">
                                        <p class="h5"> <?= $card['headline'] ?? '' ?> </p>
                                        <p class="text-2"> <?= $card['subheadline'] ?? '' ?> </p>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Главный модуль</h2>
<?php endif; ?>