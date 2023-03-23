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
                <?php if (!empty($logo)) : ?>
                    <div class="header__logo">
                        <img loading="lazy" src="<?= $logo['url'] ?>" alt="image">
                    </div>
                <?php endif; ?>

                <div class="header__burger">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="40" height="40" viewBox="0 0 32 32">
                        <path d="M2 6h28v6h-28zM2 14h28v6h-28zM2 22h28v6h-28z"/>
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
                <?php endif; ?>
            </div>
        </div>

    </div>


</header>
<main id="main" class="main" data-page-id="<?= get_queried_object_id() ?>">