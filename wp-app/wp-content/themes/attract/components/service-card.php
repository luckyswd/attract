<?php
global $post;
$categories = $args['categories'] ?? array();
$service =  $args['service'] ?? $post;

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

<div itemtype="https://schema.org/Product" itemprop="itemListElement" itemscope="" class="service-card <?php if (!empty($categories) && !in_array($categories[0]->term_id, $serviceCategories)) : ?> hidden <?php endif; ?>" data-id="<?= $service->ID ?>">
    <?= getPictureImage(is_array($image) ? $image : null, 420, 146) ?>
    <div class="service-card-content">
        <?php if (!empty($price)) : ?>
            <p itemprop="offers" itemscope="" itemtype="https://schema.org/AggregateOffer" class="text-4 service-card-content-price">
                <meta itemprop="lowPrice" content="<?= preg_replace("/[^0-9.]/", "", $price) ?>" />
                <meta itemprop="priceCurrency" content="USD">
                <?= $price ?>
            </p>
        <?php else: ?>
            <p itemprop="offers" itemscope="" itemtype="https://schema.org/AggregateOffer" class="text-4 service-card-content-price">
                <meta itemprop="lowPrice" content="50" />
                <meta itemprop="priceCurrency" content="USD">
            </p>
        <?php endif; ?>
        <p itemprop="name" class="h6"><?= $service->post_title ?? '' ?></p>
        <p itemprop="description" class="text-4 service-card-content-description"><?= $description ?? '' ?></p>
        <div class="service-card-content-bottom">
            <a href="#contact-form" class="btn blue">
                <span class="hover-animation">
                    <span>Оставить заявку</span>
                </span>
            </a>
            <?php if ($is_published) : ?>
                <a href="<?= $page_permalink ?>" class="card-btn__more text-4">Подробнее</a>
            <?php else : ?>
                <a href="javascript:;" data-fancybox="" data-src="#develop-message" class="card-btn__more text-4">Подробнее</a>
            <?php endif; ?>
        </div>
    </div>

</div>