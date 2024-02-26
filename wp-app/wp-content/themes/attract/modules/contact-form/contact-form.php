<?php

/*
Title: Контакная форма
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$subheadline = get_field('subheadline');
$background_image = get_field('background_image');
$icons = get_field('icons');
$form_headline = get_field('form_headline');
$form = get_field('form');
$signature_social = get_field('signature_social');
$contact_us_block = get_field('contact_us_block', 'options');
$socials = $contact_us_block['social_links'];
$size_50_on_50 = get_field('size_50_50');
?>

<?php if (!is_admin()) : ?>
    <section class="contact-form distance">
        <div class="block-anchor" id="contact-form"></div>
        <div class="container">
            <div class="form-wrapper <?= $size_50_on_50 ? 'half' : ''; ?>">
                <div class="form-left">
                    <p class="h4"><?= $headline ?? '' ?></p>
                    <div class="form-icon-wrap">
                        <?php if (!empty($icons)) : ?>
                            <div class="form-icons">
                                <?php foreach ($icons as $icon): ?>
                                    <div class="form-icon">
                                        <img src="<?= $icon['url']; ?>" alt="<?= $icon['alt']; ?>">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <p class="text-1"> <?= $subheadline ?? '' ?> </p>
                    </div>
                    <div class="left-overlay">
                        <?= getPictureImage($background_image, 650, 650) ?>
                    </div>

                    <div class="left-bottom">
                        <p class="h6"> <?= $signature_social ?? '' ?></p>
                        <?php if (!empty($socials)) : ?>
                            <div class="social-wrap">
                                <?php foreach ($socials as $social) : ?>
                                    <?php $link = $social['link'] ?>
                                    <a href="<?= $link['url'] ?? '' ?>" title="<?= $link['title'] ?? '' ?>" target="<?= $link['target'] ?? '' ?>" class="social-icon">
                                        <?= getPictureImage($social['icon'], 31, 31) ?>
                                    </a>
                                <?php endforeach;?>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
                <div class="form-right">
                    <p class="h5"><?= $form_headline ?? '' ?></p>
                    <?= $form ?? '' ?>
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Контакная форма</h2>
<?php endif; ?>