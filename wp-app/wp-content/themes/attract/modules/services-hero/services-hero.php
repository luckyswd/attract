<?php

/*
Title: Услуги главный модуль
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$subheadline = get_field('subheadline');
$link = get_field('link');
$background_image_desktop = get_field('background_image_desktop');
$background_image_tablet = get_field('background_image_tablet');
$background_image_mobile = get_field('background_image_mobile');
$contentOnLeft = get_field('content_on_left');
$cards = get_field('cards');
?>

<?php if (!is_admin()) : ?>
    <section class="services-hero distance">
        <div class="container">
            <div class="wrap">
                <picture>
                    <source media="(min-width: 1024px)" srcset="<?= $background_image_desktop['url'] ?>">
                    <source media="(min-width: 480px)" srcset="<?= $background_image_tablet['url'] ?>">
                    <img src="<?= $background_image_mobile['url'] ?>" alt="фон">
                </picture>
                <div class="content <?= $contentOnLeft ? 'left' : '' ?>">
                    <h1 class="h2"><?= $headline ?? '' ?></h1>
                    <div class="text-2"><?= $subheadline ?? '' ?></div>
                    <?php get_template_part('components/cards-row', '', array('cards' => $cards)) ?>
                    <?php if (!empty($link)) : ?>
                        <?php if($link['url'] !== '#contact-form'): ?>
                            <a href="<?= $link['url'] ?>"class="btn blue">
                                <span class="hover-animation">
                                    <span><?= $link['title'] ?? '' ?></span>
                                </span>
                            </a>
                        <?php else: ?> 
                            <a href="javascript:;" data-fancybox="" data-src="#modal-feedback-form" class="btn blue">
                                <span class="hover-animation">
                                    <span><?= $link['title'] ?? '' ?></span>
                                </span>
                            </a>
                        <?php endif; ?>   
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Услуги главный модуль</h2>
<?php endif; ?>