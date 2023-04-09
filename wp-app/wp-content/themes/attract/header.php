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
$socials = get_field('socials', 'option');

?>
<header id="header">
    <div class="container">
        <div class="header__wrapper">
            <div class="header__desktop">
                <div class="header__logo">
                    <?= getPictureImage($logo) ?>
                </div>
                <?php if (!empty($socials)) : ?>
                    <div class="header__socials">
                        <?php foreach ($socials as $social) : ?>
                            <?php if (!empty($social)) : ?>
                                <?php if ($social !== end($socials)) : ?>
                                    <a href="<?= $social['link'] ?>" class="header__social">
                                        <?= getPictureImage($social['icon'], 64, 64) ?>
                                    </a>
                                <?php else: ?>
                                    <div class="header__social header__social-modal">
                                        <?= getPictureImage($social['icon'], 64, 64) ?>
                                    </div>
                                <?php endif; ?>

                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <div class="header__burger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="52" height="25" viewBox="0 0 52 25" fill="none">
                        <path d="M9.36157 2.80713H48.6003" stroke="#1744D0" stroke-width="5" stroke-linecap="round"/>
                        <path d="M3.35889 12.2397L48.6003 12.2397" stroke="#1744D0" stroke-width="5"
                              stroke-linecap="round"/>
                        <path d="M3.35889 21.6724L48.6003 21.6724" stroke="#1744D0" stroke-width="5"
                              stroke-linecap="round"/>
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
                    </div>
                <?php endif; ?>
            </div>

            <div class="header__mobile">
                <?php if (!empty($socials)) : ?>
                    <div class="header__socials mobile">
                        <?php
                        $last_key = end($socials);
                        ?>
                        <?php foreach ($socials as $key => $social) : ?>
                            <?php if (!empty($social)) : ?>
                                <a href="<?= $social['link'] ?>" class="header__social">
                                    <?= getPictureImage($social['icon'], 64, 64) ?>
                                </a>
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
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</header>
<main id="main" class="main" data-page-id="<?= get_queried_object_id() ?>">
    <h1 class="visually-hidden">Attract</h1>