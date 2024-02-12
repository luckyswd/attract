<?php

/*
Title: Результат модуль
Mode: preview
*/

?>

<?php
$images = get_field('image');
$imagesCount = $images ? count($images) : 0;
$columnsCount = get_field('columns_count');
$objectFit = get_field('object_fit');
$caption = get_field('caption');
$headline = get_field('headline');
$text = get_field('text');
$result_blocks = get_field('result_blocks');
$full_width_img = get_field("horizontal_image");
?>

<?php if (!is_admin()) : ?>
    <section class="result">
        <div class="container">
            <div class="result-wrapper" <?php if ($imagesCount <= 0) : ?> style="gap: 0" <?php endif; ?>>
                <div class="result-top">
                    <?php if (!empty($caption)) : ?>
                        <p class="text-1"><?= $caption ?></p>
                    <?php endif; ?>

                    <?php if (!empty($headline)) : ?>
                        <p class="h5"><?= $headline ?></p>
                    <?php endif; ?>

                    <?php if (!empty($text)) : ?>
                        <div class="text-2"><?= $text ?></div>
                    <?php endif; ?>

                    <?php if (!empty($result_blocks)) : ?>
                        <div class="result-blocks">
                            <?php foreach ($result_blocks as $block) : ?>
                                <div class="result-block">
                                    <p class="h5"><?= $block['percent'] ?? '' ?></p>
                                    <p class="text-2"><?= $block['text'] ?? '' ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="result-bottom__wrap">
                    <?php foreach ($full_width_img as $image) : ?>
                        <div class="full-width__img">
                            <img src="<?= $image['url'] ?>" alt="<?= $image['alt']; ?>">
                        </div>
                    <?php endforeach; ?>
                    <div class="swiper result-bottom" data-columns="<?= $columnsCount ?>">
                        <div class="swiper-wrapper">
                            <?php foreach ($images as $image) : ?>
                                <div class="swiper-slide result-picture <?= $objectFit ?>">
                                    <img src="<?= $image['url'] ?>" alt="<?= $image['alt']; ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="pagination"></div>
                    </div>
                </div>

            </div>
        </div>
    </section>
<?php else : ?>
    <h2 style="font-family: 'Mark', sans-serif;">Результат модуль</h2>
<?php endif; ?>