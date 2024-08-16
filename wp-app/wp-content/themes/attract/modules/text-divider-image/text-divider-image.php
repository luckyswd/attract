<?php

/*
Title: Текст-разделитель-картинка
Mode: preview
*/

?>

<?php
$title = get_field('title');
$text = get_field('description');
$link = get_field('link');
$image_id = get_field('image_id');
$image_src = !empty($image_id) ? wp_get_attachment_image_url( $image_id, 'full' ) : '';
?>

<?php if (!is_admin()) : ?>
    <section class="text-divider-image-secton distance">
        <div class="container">
            <div class="section__row">
                <div class="section__col section__col_text">
                    <h3 class="section__title h5"><?= $title; ?></h3>
                    <div class="section__description text-3"><?= $text; ?></div>
                    <?php if(!empty($link)): ?>
                        <a href="<?= $link['url'] ?>" target="<?= $link['target'] ?>" class="section__link btn blue"><span class="hover-animation"><span><?= $link['title'] ?></span></span></a>
                    <?php endif; ?>
                </div>
                <div class="section__divider"></div>
                <div class="section__col section__col_image">
                    <?php if(!empty($image_src)): ?>
                        <figure class="section__figure">
                            <img src="<?= $image_src; ?>" alt="">
                        </figure>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php else : ?>
    <h2 style="font-family: 'Mark', sans-serif;">Текст-разделитель-картинка</h2>
<?php endif; ?>