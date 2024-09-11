<?php
get_header();

$tax = get_queried_object();
$page_title = get_field('page_title', $tax);

?>
<section class="catalog-cases-top distance">
    <div class="container">
        <div class="catalog-top" style="background-image: url('/wp-content/uploads/2023/10/item-1.svg')">
            <p class="text-1"><?= $tax->name ?></p>
            <h1 class="h2"><?= $page_title ?: $tax->name ?></h1>
        </div>
    </div>
</section>
<section class="breadcrumbs distance">
    <div class="container">
        <div class="breadcrumbs-wrap site-breadcrumb">
            <?php do_action('pretty_breadcrumb'); ?>
        </div>
    </div>
</section>

<?php

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

$casesArgs['tax_query'] = array(
    array(
        'taxonomy' => 'case-category',
        'field'    => 'slug',
        'terms'    => $tax->slug
    )  
);

$cases = get_posts($casesArgs);

?>

<section class="catalog-cases-v2 distance">
    <div class="container">
        <?php if (!empty($categories)) : ?>
            <div class="cases-sticky">
                <div class="cases-categories" data-active="<?= $tax->slug ?>">
                    <a href="/kejsy/" class="text-4 single-case" data-slug="kejsy">Все</a>
                    <?php foreach ($categories as $key => $category) : ?>
                        <a href="/kejsy/category/<?= $category->slug ?>/" class="text-4 single-case" data-slug="<?= $category->slug ?>"><?= $category->name ?></a>
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

<div class="case-tax-content tax-content">
    <div class="container">
        <?php get_template_part( 'components/acf-post-content', null, array('tax' => $tax) ); ?>
    </div>
</div>

<?php
the_pattern('clients-on-map');
get_footer();