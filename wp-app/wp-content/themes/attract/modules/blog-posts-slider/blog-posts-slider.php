<?php

/*
Title: Слайдер с записями
Mode: preview
*/

$title = get_field('title');
$post_ids = get_field('post_ids');

?>

<?php if (!is_admin()) : ?>
    <?php if (!empty($post_ids)) : ?>
        <section class="recent-posts distance">
            <div class="container recent-posts__container">
                <?php

                $args = array(
                    'post_type' => 'post',
                    'post__in' => $post_ids,
                    'orderby' => 'post__in',
                );

                $result = new WP_Query($args);

                if ($result->have_posts()) : ?>
                    <div class="recent-posts__block">
                        <div class="post-recent__wrap post-padding">
                            <div class="post-recent__header">
                                <?php if(!empty($title)): ?>
                                    <h2 class="h4 post-recent__title"><?= $title ?></h2>
                                <?php endif; ?>
                                <div class="slider-header__arrows-wrap">
                                    <div class="swiper-prev">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44" fill="none">
                                            <g clip-path="url(#clip0_906_641)">
                                                <circle cx="21.5" cy="21.5" r="21.5" transform="matrix(-1 -1.56454e-09 -1.56454e-09 1 43.5 0.199219)" fill="white" />
                                                <line y1="-1.12069" x2="22.1243" y2="-1.12069" transform="matrix(1 2.02912e-08 2.02912e-08 -1 11.4242 21.1982)" stroke="#000618" stroke-width="2.24138" />
                                                <line x1="12.2021" y1="22.0015" x2="21.8814" y2="12.3221" stroke="#000618" stroke-width="2.24138" />
                                                <line y1="-1.12069" x2="13.6887" y2="-1.12069" transform="matrix(0.707107 0.707107 0.707107 -0.707107 12.9944 21.8784)" stroke="#000618" stroke-width="2.24138" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_906_641">
                                                    <rect width="43" height="43" fill="white" transform="matrix(4.21468e-08 1 1 -4.21468e-08 0.5 0.199219)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="swiper-next">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44" fill="none">
                                            <g clip-path="url(#clip0_906_620)">
                                                <circle cx="22" cy="21.6992" r="21.5" fill="white" />
                                                <line class="arrow" x1="32.5758" y1="22.3189" x2="10.4515" y2="22.3189" stroke="#000618" stroke-width="2.24138" />
                                                <line class="arrow" y1="-1.12069" x2="13.6887" y2="-1.12069" transform="matrix(-0.707107 -0.707107 -0.707107 0.707107 31.0055 22.7939)" stroke="#000618" stroke-width="2.24138" />
                                                <line class="arrow" x1="31.7981" y1="22.6709" x2="22.1187" y2="32.3502" stroke="#000618" stroke-width="2.24138" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_906_620">
                                                    <rect width="43" height="43" fill="white" transform="translate(43.5 0.199219) rotate(90)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper swiper-recent-posts__wrap">
                                <div class="swiper-wrapper">
                                    <?php while ($result->have_posts()) : $result->the_post(); ?>
                                        <div class="swiper-slide">
                                            <?php get_template_part('components/blog-article', null) ?>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
                <?php wp_reset_query(); ?>
            </div>
        </section>
    <?php endif; ?>
<?php else : ?>
    <h2 style="font-family: 'Mark', sans-serif;">Слайдер с записями</h2>
<?php endif; ?>