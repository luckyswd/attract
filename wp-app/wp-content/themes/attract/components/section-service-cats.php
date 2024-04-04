<?php 
$tax = get_queried_object();
$cats = get_terms( 'service-category', [
	'hide_empty' => true,
    'fields'     => 'id=>name'
] );
$title = get_field('title')
?>
<section class="service-tax-categories distance">
    <div class="container">
        <?php if(!empty($title)): ?>
            <div class="section__header">
                <h2 class="h3 section__title"><?= $title ?></h2>
            </div>
        <?php endif; ?>
        <div class="service-tax-categories__cards">
                <?php foreach($cats as $id => $name): ?>
                <a href="<?= get_term_link($id, 'service-category') ?>"  class="service-tax-categories__card <?= $tax->term_id === $id ? 'active' : ''; ?> text-3">
                    <span><?= $name ?></span>
                </a>
                <?php endforeach; ?>
        </div>
    </div>
</section>