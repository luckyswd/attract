<?php

/*
Title: Каталог кейсов модуль
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$background_image = get_field('background_image');
$cases = get_posts([
    'post_type' => 'case',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'ID',
    'order' => 'ASC',
]);

$chunkedArrays = array_chunk($cases, ceil(count($cases) / 2));

?>

<?php if (!is_admin()) : ?>
    <section class="catalog-cases">
        <div class="container">
            <div class="catalog-cases-wrapper">
                <div class="catalog-top" style="background-image: url(<?= $background_image['url'] ?? '' ?>)">
                    <p class="text-1"><?= get_the_title() ?></p>
                    <p class="h2"><?= $headline ?? '' ?></p>
                </div>
                <?php if (!empty($cases)) : ?>
                    <div class="cases">
                        <div class="cases-left">
                            <?php foreach ($chunkedArrays[0] as $key => $case) : ?>
                                <?php
                                $shor_description = get_field('shor_description', $case->ID);
                                $preview_image = get_field('catalog_image', $case->ID);
                                $tags = get_field('tags', $case->ID);
                                $h = 'h5';
                                ?>
                                <?php include get_template_directory() . '/components/case-card.php' ?>
                            <?php endforeach; ?>
                        </div>

                        <div class="cases-right">
                            <?php foreach ($chunkedArrays[1] as $key => $case) : ?>
                                <?php
                                $shor_description = get_field('shor_description', $case->ID);
                                $preview_image = get_field('preview_image', $case->ID);
                                $tags = get_field('tags', $case->ID);
                                $h = 'h5';
                                ?>
                                <?php include get_template_directory() . '/components/case-card.php' ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Каталог кейсов модуль</h2>
<?php endif; ?>