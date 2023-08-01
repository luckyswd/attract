<?php

/*
Title: Результат модуль
Mode: preview
*/

?>

<?php
$image = get_field('image');
$caption = get_field('caption');
$headline = get_field('headline');
$text = get_field('text');
$result_blocks = get_field('result_blocks');
?>

<?php if (!is_admin()) : ?>
    <section class="result distance">
        <div class="container">
            <div class="result-wrapper">
                <div class="result-left">
                    <?php getPictureImage($image, 575, 575); ?>
                </div>
                <div class="result-right">
                    <p class="text-1"><?= $caption ?? '' ?></p>
                    <p class="h5"><?= $headline ?? '' ?></p>
                    <p class="text-2"><?= $text ?? '' ?></p>
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
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Результат модуль</h2>
<?php endif; ?>