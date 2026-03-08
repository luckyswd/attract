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
    <?php
    $desktop_url = $background_image_desktop['url'] ?? '';
    $tablet_url = $background_image_tablet['url'] ?? '';
    $mobile_url = $background_image_mobile['url'] ?? '';
    $fallback_url = $desktop_url ?: $tablet_url ?: $mobile_url;

    $srcset_parts = [];
    if ($mobile_url) {
        $srcset_parts[] = esc_url($mobile_url) . ' 480w';
    }
    if ($tablet_url) {
        $srcset_parts[] = esc_url($tablet_url) . ' 1024w';
    }
    if ($desktop_url) {
        $srcset_parts[] = esc_url($desktop_url) . ' 1920w';
    }
    $srcset = implode(', ', $srcset_parts);
    $sizes = '(max-width: 480px) 100vw, (max-width: 1024px) 100vw, 100vw';
    ?>
    <section class="services-hero distance">
        <div class="container">
            <div class="wrap">
                <?php if ($fallback_url) : ?>
                <img
                    src="<?= esc_url($fallback_url) ?>"
                    <?php if (count($srcset_parts) > 1) : ?>
                        srcset="<?= $srcset ?>"
                        sizes="<?= esc_attr($sizes) ?>"
                    <?php endif; ?>
                    alt="<?= esc_attr($headline ?: 'Фон секции услуг') ?>"
                    fetchpriority="high"
                    loading="eager"
                    decoding="async"
                >
                <?php endif; ?>
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