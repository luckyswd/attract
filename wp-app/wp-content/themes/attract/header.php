<!doctype html>
<html lang="ru">

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php wp_title('«', true, 'right'); ?> | <?php bloginfo('name'); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_head(); ?>
</head>

<body>
    <?php
    $logo = get_field('logo', 'option');
    $buttons = get_field('anchor_buttons', 'option');
    $socials = get_field('socials', 'option');

    ?>
    <header id="header">
        <div class="container">
            <div class="header__wrapper">
                <div class="header__desktop">
                    <a href="/" class="header__logo">
                        <?= getPictureImage($logo, 150, 21) ?>
                    </a>
                    <div class="header__burger">
                        <svg class="burger" xmlns="http://www.w3.org/2000/svg" width="25" height="18" viewBox="0 0 25 18" fill="none">
                            <rect x="24.0002" y="1.38477" width="1.2" height="23" transform="rotate(90 24.0002 1.38477)" fill="#1744D0" />
                            <rect x="24.0002" y="8.38477" width="1.2" height="23" transform="rotate(90 24.0002 8.38477)" fill="#1744D0" />
                            <rect x="24.0002" y="15.3848" width="1.2" height="23" transform="rotate(90 24.0002 15.3848)" fill="#1744D0" />
                        </svg>
                        <svg class="close" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <rect x="16.2637" y="0.884766" width="1.2" height="23" transform="rotate(45 16.2637 0.884766)" fill="#1744D0" />
                            <rect width="1.2" height="23" transform="matrix(-0.707107 0.707107 0.707107 0.707107 1.1123 0.884766)" fill="#1744D0" />
                        </svg>
                    </div>
                    <?php if (!empty($buttons)) : ?>
                        <div class="header__buttons">
                            <?php foreach ($buttons as $button) : ?>
                                <?php if (!empty($button)) : ?>
                                    <a href="<?= $button['button']['url'] ?? '#' ?>" class="header__button">
                                        <?= $button['button']['title'] ?? '' ?>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <a href="javascript:;" data-fancybox="" data-src="#modal-feedback-form" class="btn white">
                            <span>Оставить заявку</span>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="header__mobile">
                    <?php if (!empty($buttons)) : ?>
                        <div class="header__buttons-mobile">
                            <?php foreach ($buttons as $button) : ?>
                                <?php if (!empty($button)) : ?>
                                    <a href="<?= $button['button']['url'] ?? '#' ?>" class="header__button-mobile">
                                        <?= $button['button']['title'] ?? '' ?>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <?php if (!empty($socials)) : ?>
                            <div class="socials-wrapper">
                                <?php foreach ($socials as $social) : ?>
                                    <a href="<?= $social['link'] ?>" target="_blank" class="social-card">
                                        <p class="h6"> <?= $social['name'] ?> </p>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
    <main id="main" class="main slug-<?= get_queried_object()->post_name ?>" data-page-id="<?= get_queried_object_id() ?>">