<?php if (!empty($args)) : ?>
    <div class="articles-cards">
        <?php foreach ($args as $article) : ?>
            <?php
            $articleCategories = get_the_terms($article, 'category');

            if (!empty($articleCategories)) {
                $articleCategories = array_map(function ($cat) {
                    return $cat->term_id;
                }, $articleCategories);
            } else {
                $articleCategories = [];
            }

            $image = get_the_post_thumbnail_url($article->ID);
            $description = get_field('description', $article->ID);
            $page_permalink = get_permalink($article->ID);

            ?>
            <div class="article-card">
                <img src="<?= $image; ?> " alt="<?= $article->ID ?>" />
                <div class="article-card-content">
                    <div>
                        <p class="h6"><?= $article->post_title ?? '' ?></p>
                        <p class="text-4 article-card-content-description"><?= $article->post_excerpt ?? '' ?></p>
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
        <?php endforeach; ?>
    </div>
<?php endif; ?>