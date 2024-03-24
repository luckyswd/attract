<div class="article-card">
    <?php $image = get_the_post_thumbnail_url(get_the_ID(), 'blog-post-thumbnail'); ?>
    <img src="<?= $image; ?>" alt="<?= get_the_title(); ?>" loading="lazy" />
    <div class="article-card-content">
        <div>
            <p class="h6"><?= get_the_title(); ?></p>
            <p class="text-4 article-card-content-description"><?= get_the_excerpt(); ?></p>
        </div>
        <div class="article-card-content-bottom">
            <a href="<?= get_permalink(); ?>" class="btn blue">
                <span class="hover-animation">
                    <span>Читать</span>
                </span>
            </a>
        </div>
    </div>
</div>