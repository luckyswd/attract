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
$video = get_field('video');
?>

<?php if (!is_admin()) : ?>
    <section class="hero distance">
        <div class="container">
            <div class="hero__wrapper">
                <div class="hero__main">
                    <h1><?= $headline ?? '' ?></h1>
                    <div class="subheadline-button-wrapper">
                        <a href="javascript:;" data-fancybox="" data-src="#hero-video" class="hero__main-image">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="40" viewBox="0 0 35 40" fill="none">
                                <path d="M35 20L0.500002 39.9186L0.500004 0.0814137L35 20Z" fill="white"/>
                            </svg>
                            <?= getPictureImage($image, 122, 122) ?>
                        </a>
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
        <div class="modal-form" id="hero-video">
            <div class="form-wrapper">
                <video controls>
                    <source src="<?= $video['url'] ?>" type="<?= $video['mime_type'] ?>">
                    Ваш браузер не поддерживает видео.
                </video>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Главный модуль</h2>
<?php endif; ?>