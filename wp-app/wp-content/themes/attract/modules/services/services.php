<?php

/*
Title: Услуги модуль
Mode: preview
*/

?>

<?php
$headline = get_field('headline');

$categories = get_terms([
    'taxonomy' => 'service-category',
    'hide_empty' => true,
]);

$services = get_posts([
    'post_type' => 'service',
    'posts_per_page' => -1,
    'post_status' => array('publish', 'private'),
]);

?>

<?php if (!is_admin()) : ?>
    <section id="services" class="services distance">
        <div class="container">
            <div class="services-wrapper">
                <div class="services-sticky">
                    <?php if(!empty($headline)): ?>  
                        <h2 class="h3"><?= $headline ?? '' ?></h2>
                    <?php endif; ?>
                    <p class="h3 mobile-headline">Услуги</p>
                    <?php if (!empty($categories)) : ?>
                        <div class="services-categories">
                            <?php foreach ($categories as $key => $category) : ?>
                                <?php
                                $servicesForCategory = get_posts([
                                    'post_type' => 'service',
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

                                $servicesForCategoryIds = array_map(function ($cat) {
                                    return $cat->ID;
                                }, $servicesForCategory);
                                ?>

                                <p class="text-4 single-service <?php if ($key === 0) : ?> js-active <?php endif; ?>" data-ids="<?= json_encode($servicesForCategoryIds) ?>"><?= $category->name ?></p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if (!empty($services)) : ?>
                    <div class="services-cards" itemtype="https://schema.org/ItemList" itemscope="">
                        <?php foreach ($services as $service) : ?>
                            <?php
                            $serviceCategories = get_the_terms($service, 'service-category');

                            if (!empty($serviceCategories)) {
                                $serviceCategories = array_map(function ($cat) {
                                    return $cat->term_id;
                                }, $serviceCategories);
                            } else {
                                $serviceCategories = [];
                            }

                            $image = get_field('image', $service->ID);
                            $price = get_field('price', $service->ID);
                            $description = get_field('description', $service->ID);
                            $page_permalink = get_permalink($service->ID);
                            $is_published = get_post_status($service->ID) === 'publish';

                            ?>
                            <?php get_template_part('components/service-card', null, array('service' => $service, 'categories' => $categories)) ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php else : ?>
    <h2 style="font-family: 'Mark', sans-serif;">Услуги модуль</h2>
<?php endif; ?>