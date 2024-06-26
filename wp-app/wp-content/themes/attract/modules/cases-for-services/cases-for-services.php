<?php

/*
Title: Кейсы для услуг модуль
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$button = get_field('button');
$cases = get_field('cases');

$from_tax = get_field('from_tax');
$cat_ids = $from_tax['cat_ids'] ?? array();
$tag_ids = $from_tax['tag_ids'] ?? array();
$numberposts = $from_tax['numberposts'] ?? -1;
$random = $from_tax['random'] ?? false;

if(!empty($cat_ids) || !empty($tag_ids)) {
    $cases = get_posts(array(
        'numberposts' => $numberposts,
        'orderby'     => $random ? 'rand' : 'date',
        'order'       => 'DESC',
        'tax_query'   => array(
            'relation' => 'OR',
            array(
                'taxonomy' => 'case-category',
                'field'    => 'id',
                'terms'    => $cat_ids,
            ),
            array(
                'taxonomy' => 'case-tag',
                'field'    => 'id',
                'terms'    => $tag_ids,
            )
        ),
        'meta_key'    => '',
        'meta_value'  =>'',
        'post_type'   => 'case',
        'suppress_filters' => true,
    ));
}

?>

<?php if (!is_admin()) : ?>
    <section class="cases for-services distance">
        <div class="block-anchor" id="cases"></div>
        <div class="container">
            <div class="cases-top">
                <?php if(!empty($headline)): ?>  
                    <h2 class="h3"><?= $headline ?? '' ?></h2>
                <?php endif; ?>
                <a class="btn blue" href="<?= $button['url'] ?>">
                    <span class="hover-animation">
                        <span><?= $button['title'] ?? '' ?></span>
                    </span>
                </a>
            </div>
            <?php if (!empty($cases)) : ?>
                <div class="cases-wrapper">
                    <?php foreach ($cases as $key => $case) : ?>
                        <?php
                        $category = get_the_terms($case->ID, 'case-category');
                        $categoryName = '';
                        if (!empty($category)) {
                            $categoryName = $category[0]->name;
                        }

                        $shor_description = get_field('shor_description', $case->ID);
                        $img = get_field('preview_image', $case->ID);
                        $preview_image['url'] = is_array($img) ? $img['sizes']['catalog-case-thumbnail'] : '';
                        $link = get_permalink($case);
                        $tags = get_field('tags', $case->ID);
                        $class = 'medium-mode';
                        $h = 'h5';
                        ?>
                        <?php include get_template_directory() . '/components/case-card.php' ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Кейсы для услуг модуль</h2>
<?php endif; ?>