<?php

/*
Title: Блог модуль
Mode: preview
*/

?>

<?php

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;


$args = array(
    'posts_per_page' => 9,
    'post_type' => 'post',
    'post_status' => array('publish'),
    'paged' => $paged,
);

$result = new WP_Query($args);

$category_args = array(
    'post_type' => 'post',
    'order' => 'ASC',
    'tax_query' => array(
        array(
            'taxonomy' => 'category',
        )
    ),
);

$articles = get_posts([
    'post_type' => 'post',
    'posts_per_page' => 9,
    'post_status' => array('publish'),
]);

$categories = get_terms([
    'taxonomy' => 'category',
    'hide_empty' => false,
]);

$pagination_args = array(
    'show_all' => false, // показаны все страницы участвующие в пагинации
    'end_size' => 1, // количество страниц на концах
    'mid_size' => 1, // количество страниц вокруг текущей
    'prev_next' => true, // выводить ли боковые ссылки "предыдущая/следующая страница".
    'prev_text' => __('
<svg xmlns="http://www.w3.org/2000/svg" width="9" height="12" viewBox="0 0 9 12" fill="none">
    <path id="Vector 4" d="M1.89844 1.10059L6.79783 5.99998L1.89844 10.8994" stroke="#AB755C" stroke-width="2" stroke-linecap="round"></path>
</svg>
'),
    'next_text' => __('
<svg xmlns="http://www.w3.org/2000/svg" width="9" height="12" viewBox="0 0 9 12" fill="none">
    <path id="Vector 4" d="M1.89844 1.10059L6.79783 5.99998L1.89844 10.8994" stroke="#AB755C" stroke-width="2" stroke-linecap="round"></path>
</svg>
'),
    'add_args' => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
    'add_fragment' => '', // Текст который добавиться ко всем ссылкам.
    'class' => 'posts-pagination__wrap', // CSS класс, добавлено в 5.5.0.
);

?>

<section class="articles distance">
    <div class="container">
        <div class="articles-wrapper">
            <div class="articles-sticky">
                <?php if (!empty($categories)) : ?>
                    <div class="articles-categories">
                        <?php foreach ($categories as $key => $category) : ?>
                            <?php
                            if ($category->count != 0) :
                                $articlesForCategory = get_posts([
                                    'post_type' => 'post',
                                    'posts_per_page' => -1,
                                    'post_status' => array('publish'),
                                    'tax_query' => [
                                        [
                                            'relation' => 'AND',
                                            'taxonomy' => $category->taxonomy,
                                            'field' => 'term_id',
                                            'terms' => $category->term_id,
                                        ],

                                    ],
                                ]);

                                $articlesForCategoryIds = array_map(function ($cat) {
                                    return $cat->ID;
                                }, $articlesForCategory);
                            ?>

                                <p class="text-4 single-article <?php if ($key === 0) : ?> js-active <?php endif; ?>" data-ids="<?= json_encode($articlesForCategoryIds) ?>" data-category="<?= $category->term_taxonomy_id; ?>">
                                    <?= $category->name ?>
                                </p>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if ($result->have_posts()) : ?>
                <div class="articles-cards">
                    <?php while ($result->have_posts()) : $result->the_post(); ?>
                        <?php
                        $post_id = get_the_ID();
                        $articleCategories = get_the_terms($post_id, 'category');

                        if (!empty($articleCategories)) {
                            $articleCategories = array_map(function ($cat) {
                                return $cat->term_id;
                            }, $articleCategories);
                        } else {
                            $articleCategories = [];
                        }

                        $image = get_the_post_thumbnail_url($post_id);
                        $description = get_field('description', $post_id);
                        $page_permalink = get_permalink($post_id);
                        $article_title = get_the_title($post_id);
                        $article_excerpt = get_the_excerpt($post_id);

                        ?>
                        <div class="article-card <?php if (!in_array($categories[0]->term_id, $articleCategories)) : ?> hidden <?php endif; ?>" data-id="<?= $post_id ?>">
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
            <div class='page-nav-container'>
                <?php
                    paginate_links(array(
                        'total' => $result->max_num_pages,
                        'prev_text' => __('<'),
                        'next_text' => __('>')
                    ));
                ?>
            </div>
    </div>
</section>