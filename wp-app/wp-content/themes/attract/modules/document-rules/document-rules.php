<?php

/*
Title: Правовые документы верхний текст модуль
Mode: preview
*/

?>

<?php
$first_title = get_field('documents_rules_first_title');
$first_text = get_field('documents_rules_first_text');
$first_block_second_text = get_field('documents_rules_first_block_second_text');
$first_img = get_field('documents_rules_first_img');
$second_title = get_field('documents_rules_second_title');
$second_text = get_field('documents_rules_second_text');
$second_block_second_text = get_field('documents_rules_second_block_second_text');
$second_img = get_field('documents_rules_second_img');

$args = array(
    'posts_per_page' => -1,
    'post_type' => 'rules',
    'post_status' => array('publish'),
);

$result = new WP_Query($args);

$categories = get_terms([
    'taxonomy' => 'rules-documents',
    'hide_empty' => false,
]);



?>
<section class="documents-rules-breadrumbs distance">
    <div class="container">
        <div class="site-breadcrumb">
            <?= do_shortcode('[wpseo_breadcrumb]'); ?>
        </div>
    </div>
</section>
<section class="documents-rules-header distance">
    <div class="container">
        <div class="documents-rules__desc-wrap">
            <div class="documents-rules__about-company">
                <div class="about-company__wrap">
                    <?php if ($first_title) : ?>
                        <h2 class="h4"><?= $first_title; ?></h2>
                    <?php endif; ?>
                    <?php if ($first_text) : ?>
                        <p class="text-4"><?= $first_text; ?></p>
                    <?php endif; ?>
                    <?php if ($first_block_second_text) : ?>
                        <p class="text-4"><?= $first_block_second_text; ?></p>
                    <?php endif; ?>
                </div>
                <img src="<?= $first_img; ?>" alt="about company" />
            </div>
            <div class="documents-rules__about-license">
                <img src="<?= $second_img; ?>" alt="about licence" />
                <div class="about-licence__wrap">
                    <?php if ($second_title) : ?>
                        <h2 class="h4"><?= $second_title; ?></h2>
                    <?php endif; ?>
                    <?php if ($second_text) : ?>
                        <p class="text-4"><?= $second_text; ?></p>
                    <?php endif; ?>
                    <?php if ($second_block_second_text) : ?>
                        <p class="text-4"><?= $second_block_second_text; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="documents-rules-tabs distance">
    <div class="container">
        <div class="tabs-title">
            <h2 class="h4">LEGAL DOCUMENTS</h2>
        </div>
        <div class="documents-rules-wrapper">
            <div class="documents-rules-sticky">
                <?php if (!empty($categories)) : ?>
                    <div class="documents-rules-categories">
                        <?php foreach ($categories as $key => $category) : ?>

                            <?php
                            if ($category->count != 0) :
                                $articlesForCategory = get_posts([
                                    'post_type' => 'rules',
                                    'posts_per_page' => -1,
                                    'post_status' => array('publish'),
                                    'tax_query' => [
                                        [
                                            'relation' => 'AND',
                                            'taxonomy' => $category->taxonomy,
                                            'field' => 'term_id',
                                            'terms' => $category->term_id,
                                        ],

                                    ],
                                ]);

                                $articlesForCategoryIds = array_map(function ($cat) {
                                    return $cat->ID;
                                }, $articlesForCategory);
                            ?>

                                <p class="text-4 single-documents-rules <?php if ($key === 0) : ?> js-active <?php endif; ?>" data-ids="<?= json_encode($articlesForCategoryIds) ?>" data-category="<?= $category->term_taxonomy_id; ?>">
                                    <?= $category->name ?>
                                </p>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if ($result->have_posts()) : ?>
                <?php while ($result->have_posts()) : $result->the_post(); ?>
                    <?php
                    $post_id = get_the_ID();
                    $articleCategories = get_the_terms($post_id, 'rules-documents');

                    if (!empty($articleCategories)) {
                        $articleCategories = array_map(function ($cat) {
                            return $cat->term_id;
                        }, $articleCategories);
                    } else {
                        $articleCategories = [];
                    }

                    $article_excerpt = get_the_content($post_id);

                    ?>
                    <div class="documents-rules__data<?php if (!in_array($categories[0]->term_id, $articleCategories)) : ?> hidden <?php endif; ?>" data-id="<?= $post_id ?>">
                        <?php echo $article_excerpt; ?>
                    </div>
                <?php endwhile; ?>

            <?php endif; ?>
        </div>
</section>