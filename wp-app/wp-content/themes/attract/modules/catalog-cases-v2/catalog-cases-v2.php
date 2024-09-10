<?php

/*
Title: Каталог кейсов модуль (версия №2)
Mode: preview
*/

?>

<?php

$pageSlug = get_post_field('post_name', get_post());

$categories = get_terms([
    'taxonomy' => 'case-category',
    'hide_empty' => true,
]);

$casesArgs = array(
    'post_type' => 'case',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC'
);

if ($pageSlug != 'kejsy') {
    $casesArgs['tax_query'] = array(
        array(
            'taxonomy' => 'case-category',
            'field'    => 'slug',
            'terms'    => $pageSlug
        )  
    );
}

$cases = get_posts($casesArgs);

?>

<?php if (!is_admin()) : ?>
    <section class="catalog-cases-v2 distance">
        <div class="container">
            <?php if (!empty($categories)) : ?>
                <div class="cases-sticky">
                    <div class="cases-categories" data-active="<?= $pageSlug ?>">
                        <a href="/kejsy/" class="text-4 single-case" data-slug="kejsy">Все</a>
                        <?php foreach ($categories as $key => $category) : ?>
                            <a href="/<?= $category->slug ?>/" class="text-4 single-case" data-slug="<?= $category->slug ?>"><?= $category->name ?></a>
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
                        $img = get_field('catalog_image', $case->ID);
                        $preview_image['url'] = is_array($img) ? $img['sizes']['catalog-case-thumbnail'] : '';
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
    <h2 style="font-family: 'Mark', sans-serif;">Каталог кейсов модуль (версия №2)</h2>
<?php endif; ?>