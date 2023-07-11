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
$icon = get_field('icon');
$form_headline = get_field('form_headline');
$form = get_field('form');
$signature_social = get_field('signature_social');
$socials = get_field('socials');
?>

<?php if (!is_admin()) : ?>
    <section class="contact-form">
        <div class="container">
            <div class="form-wrapper">
                <div class="form-left">
                    <p class="h4"><?= $headline ?? '' ?></p>
                    <div class="form-icon-wrap">
                        <?= getPictureImage($icon, 68, 68) ?>
                        <p class="text-1"> <?= $subheadline ?? '' ?> </p>
                    </div>
                    <div class="left-overlay">
                        <?= getPictureImage($background_image, 650, 650) ?>
                    </div>

                    <div class="left-bottom">
                        <h6> <?= $signature_social ?? '' ?></h6>
                        <?php if (!empty($socials)) : ?>
                            <div class="social-wrap">
                                <?php foreach ($socials as $social) : ?>
                                    <a class="social-icon">
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