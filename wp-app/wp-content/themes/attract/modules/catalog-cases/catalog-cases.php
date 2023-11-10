<?php

/*
Title: Каталог кейсов модуль
Mode: preview
*/

?>

<?php

$categories = get_terms([
    'taxonomy' => 'case-category',
    'hide_empty' => false,
]);

$cases = get_posts([
    'post_type' => 'case',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'ID',
    'order' => 'ASC',
]);

?>

<?php if (!is_admin()) : ?>
    <section class="catalog-cases distance">
        <div class="container">
            <?php if (!empty($categories)) : ?>
                <div class="cases-sticky">
                    <div class="cases-categories">
                        <?php foreach ($categories as $key => $category) : ?>
                            <?php
                            $casesForCategory = get_posts([
                                'post_type' => 'case',
                                'posts_per_page' => -1,
                                'post_status' => array('publish', 'private'),
                                'tax_query' => [
                                    [
                                        'relation' => 'AND',
                                        'taxonomy' => $category->taxonomy,
                                        'field' => 'term_id',
                                        'terms' => $category->term_id,
                                    ],

                                ],
                            ]);

                            $casesForCategoryIds = array_map(function ($cat) {
                                return $cat->ID;
                            }, $casesForCategory);
                            ?>

                            <p class="text-4 single-case <?= $key === 0 ? 'js-active' : '' ?>" data-ids="<?= json_encode($casesForCategoryIds) ?>"><?= $category->name ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (!empty($cases)) : ?>
                <div class="cases">
                    <?php foreach ($cases as $key => $case) : ?>
                        <?php
                        $category = get_the_terms($case->ID, 'case-category');
                        $categoryName = '';
                        if (!empty($category)) {
                            $categoryName = $category[0]->name;

                            $caseCategories = array_map(function ($cat) {
                                return $cat->term_id;
                            }, $category);
                        } else {
                            $caseCategories = [];
                        }

                        $shor_description = get_field('shor_description', $case->ID);
                        $preview_image = get_field('catalog_image', $case->ID);
                        $link = get_permalink($case);
                        $tags = get_field('tags', $case->ID);
                        $h = 'h5';
                        ?>
                        <?php include get_template_directory() . '/components/case-card.php' ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Каталог кейсов модуль</h2>
<?php endif; ?>