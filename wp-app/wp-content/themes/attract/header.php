<!doctype html>
<html lang="ru">

<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title><?php wp_title('«', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <?php wp_head(); ?>
</head>

<body>
<?php
$logo = get_field('logo', 'option');
$buttons = get_field('anchor_buttons', 'option');

?>
<header id="header">
    <div class="container">
        <div class="header__wrapper">
            <div class="header__desktop">
                <a href="/" class="header__logo">
                    <?= getPictureImage($logo, 150, 21) ?>
                </a>
                <div class="header__burger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="24" viewBox="0 0 35 24" fill="none">
                        <rect x="34.8606" y="0.677979" width="1.81153" height="34.721" transform="rotate(90 34.8606 0.677979)" fill="#1744D0"/>
                        <rect x="34.8606" y="11.2451" width="1.81153" height="34.721" transform="rotate(90 34.8606 11.2451)" fill="#1744D0"/>
                        <rect x="34.8606" y="21.8125" width="1.81153" height="34.721" transform="rotate(90 34.8606 21.8125)" fill="#1744D0"/>
                    </svg>
                </div>
                <?php if (!empty($buttons)) : ?>
                    <div class="header__buttons">
                        <?php foreach ($buttons as $button) : ?>
                            <?php if (!empty($button)) : ?>
                                <a href="<?= $button['button']['url'] ?? '#' ?>" class="header__button btn">
                                    <?= $button['button']['title'] ?? '' ?>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <a href="#contact-form" class="btn blue">
                            Бесплатная оценка
                        </a>
                        <div class="selector-mark"></div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="header__mobile">
                <?php if (!empty($socials)) : ?>
                    <div class="header__socials mobile">
                        <?php foreach ($socials as $social) : ?>
                            <?php if (!empty($social)) : ?>
                                <?php if ($social !== end($socials)) : ?>
                                    <a href="<?= $social['link'] ?>" class="header__social">
                                        <?= getPictureImage($social['icon'], 64, 64) ?>
                                    </a>
                                <?php else: ?>
                                    <div class="header__social header__social-mobile-modal">
                                        <?= getPictureImage($social['icon'], 64, 64) ?>
                                    </div>
                                <?php endif; ?>

                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <?php if (!empty($buttons)) : ?>
                    <div class="header__buttons-mobile">
                        <?php foreach ($buttons as $button) : ?>
                            <?php if (!empty($button)) : ?>
                                <a href="<?= $button['button']['url'] ?? '#' ?>" class="header__button-mobile">
                                    <?= $button['button']['title'] ?? '' ?>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <a href="#contact-form" class="header__button-mobile btn blue">
                            Бесплатная оценка
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>
<main id="main" class="main" data-page-id="<?= get_queried_object_id() ?>">
