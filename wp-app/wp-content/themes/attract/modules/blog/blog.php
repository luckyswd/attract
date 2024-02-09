<?php

/*
Title: Блог модуль
Mode: preview
*/

?>

<?php
if (!is_admin() || wp_doing_ajax()) :

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

if(!empty($_POST['paged'])) {
    $paged = (int) $_POST['paged'];
    set_query_var( 'paged', $paged );
}

$cat_id = $_POST['cat'] ?? $_GET['cat'] ?? 'null';

$args = array(
    'posts_per_page' => wp_is_mobile() ? 8 : 9,
    'post_type' => 'post',
    'cat' => $cat_id,
    'post_status' => array('publish'),
    'paged' => $paged,
    'orderby' => 'date',
    'order' => 'DESC'
);

$articles = new WP_Query($args);

$categories = get_terms([
    'taxonomy' => 'category',
    'hide_empty' => false,
]);

?>

<section class="articles distance">
    <div class="container">
        <div class="articles-wrapper">
            <div class="articles-sticky">
                <?php if (!empty($categories)) : ?>
                    <div class="articles-categories">
                        <?php foreach ($categories as $key => $category) : ?>
                                <p class="text-4 single-article category-filter <?php if ($category->term_taxonomy_id === (int) $cat_id) : ?> js-active <?php endif; ?>" data-category="<?= $category->term_taxonomy_id; ?>">
                                    <?= $category->name ?>
                                </p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if ($articles->have_posts()) : ?>
                
                <div class="articles-cards">
                    <?php while ($articles->have_posts()) : $articles->the_post(); ?>
                        <?php
                        $post_id = get_the_ID();

                        $image = get_the_post_thumbnail_url($post_id);
                        $description = get_field('description', $post_id);
                        $page_permalink = get_permalink($post_id);
                        $article_title = get_the_title($post_id);
                        $article_excerpt = get_the_excerpt($post_id);

                        ?>
                        <div class="article-card" data-id="<?= $post_id ?>">
                            <img src="<?= $image; ?> " alt="<?= $post_id ?>" />
                            <div class="article-card-content">
                                <div>
                                    <p class="h6"><?= $article_title ?? '' ?></p>
                                    <p class="text-4 article-card-content-description"><?= $article_excerpt ?? '' ?></p>
                                </div>
                                <div class="article-card-content-bottom">
                                    <a href="<?= $page_permalink; ?>" class="btn blue">
                                        <span class="hover-animation">
                                            <span>Читать</span>
                                        </span>
                                    </a>
                                </div>
                            </div>

                        </div>
                    <?php endwhile; ?>
                </div>

            <?php endif; ?>
        </div>
        <?php if($articles->max_num_pages > 1): ?>
            <div class='page-nav-container'>
                <?php
                    echo paginate_links(array(
                        'total' => $articles->max_num_pages,
                        'prev_next' => true, // выводить ли боковые ссылки "предыдущая/следующая страница".
                        'prev_text' => __('
                            <svg xmlns="http://www.w3.org/2000/svg" width="9" height="12" viewBox="0 0 9 12" fill="none">
                                <path id="Vector 4" d="M1.89844 1.10059L6.79783 5.99998L1.89844 10.8994" stroke="#AB755C" stroke-width="2" stroke-linecap="round"></path>
                            </svg>'),
                        'next_text' => __('
                            <svg xmlns="http://www.w3.org/2000/svg" width="9" height="12" viewBox="0 0 9 12" fill="none">
                                <path id="Vector 4" d="M1.89844 1.10059L6.79783 5.99998L1.89844 10.8994" stroke="#AB755C" stroke-width="2" stroke-linecap="round"></path>
                            </svg>'),
                        'add_args' => array(
                            'cat' => $cat_id
                        )
                    ));
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Модуль блог</h2>
<?php endif; ?>
