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
    'post_status' => 'publish',
]);

?>

<?php if (!is_admin()) : ?>
    <section class="services distance">
        <div class="container">
            <div class="services-wrapper">
                <div class="services-sticky">
                    <p class="h3"><?= $headline ?? '' ?></p>
                    <?php if (!empty($categories)) : ?>
                        <div class="services-categories">
                            <?php foreach ($categories as $key => $category) : ?>
                                <?php
                                $servicesForCategory = get_posts([
                                    'post_type' => 'service',
                                    'posts_per_page' => -1,
                                    'post_status' => 'publish',
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

                                <p class="text-4 single-service <?php if ($key === 0) : ?> js-active <?php endif; ?>"
                                   data-ids="<?= json_encode($servicesForCategoryIds) ?>"><?= $category->name ?></p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if (!empty($services)) : ?>
                    <div class="services-cards">
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

                            ?>
                            <div class="service-card <?php if (!in_array($categories[0]->term_id, $serviceCategories)) : ?> hidden <?php endif; ?>"
                                 data-id="<?= $service->ID ?>">
                                <?= getPictureImage(is_array($image) ? $image : null, 420, 146) ?>
                                <div class="service-card-content">
                                    <?php if (!empty($price)) : ?>
                                        <p class="text-4 service-card-content-price"><?= $price ?></p>
                                    <?php endif; ?>
                                    <p class="h6"><?= $service->post_title ?? '' ?></p>
                                    <p class="text-4 service-card-content-description"><?= $description ?? '' ?></p>
                                    <div class="service-card-content-bottom">
                                        <a href="#contact-form" class="btn blue">
                                            <span class="hover-animation">
                                                <span>Оставить заявку</span>
                                            </span>
                                        </a>
                                        <a href="javascript:;" data-fancybox="" data-src="#develop-message" class="text-4">Подробнее</a>
                                    </div>
                                </div>

                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Услуги модуль</h2>
<?php endif; ?>