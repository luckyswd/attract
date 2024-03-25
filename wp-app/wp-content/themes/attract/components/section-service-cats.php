<?php 
$tax = get_queried_object();
$cats = get_terms( 'service-category', [
	'hide_empty' => true,
    'fields'     => 'id=>name'
] );
?>
<section class="service-tax-categories distance">
    <div class="container">
       <div class="service-tax-categories__cards">
            <?php foreach($cats as $id => $name): ?>
            <a href="<?= get_term_link($id, 'service-category') ?>"  class="service-tax-categories__card <?= $tax->term_id === $id ? 'active' : ''; ?> text-3">
                <span><?= $name ?></span>
            </a>
            <?php endforeach; ?>
       </div>
    </div>
</section>