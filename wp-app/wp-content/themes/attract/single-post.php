<?php
get_header();
setup_postdata($post);
$post_id = $post->ID;
$banner_image = get_field("inner_post_info");
$category_detail = get_the_category($post_id);
$category_name = end($category_detail)->name;
$post_title = get_the_title();
$post_excerpt = $post->post_excerpt;
$post_author = get_field("author-caption") ?? '';
$post_date = get_the_date('d.m.Y');

// leave comment

$comment_args = [
    'fields'               => [
        'cookies' => '',
    ],
    'comment_field'        => '<p class="comment-form-comment">
		<textarea id="comment" class="textarea-field" name="comment" cols="45" rows="8" aria-required="true" required="required" placeholder="Что вы об этом думаете?"></textarea>
        <input class="submit-comment__btn" name="%1$s" type="submit" id="%2$s" class="%3$s" value="Написать" />
	</p>',

    'comment_notes_after'  => '',
    'id_form'              => 'commentform',
    'id_submit'            => 'submit',
    'class_container'      => 'comment-respond',
    'class_form'           => 'comment-form',
    'class_submit'         => 'submit',
    'name_submit'          => 'submit',
    'title_reply'          => __(''),
    'title_reply_to'       => __(''),
    'title_reply_before'   => '<h3 style="display: none;" id="reply-title" class="comment-reply-title">',
    'title_reply_after'    => '</h3>',
    'comment_notes_before' => '',

    'cancel_reply_before'  => ' <small>',
    'cancel_reply_after'   => '</small>',
    'cancel_reply_link'    => __('Cancel reply'),
    'label_submit'         => __('Написать'),
    'submit_button'        => '',
    'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
    'format'               => 'xhtml',
];

$args = array(
    'post_id' => $post_id
);
$comments = get_comments($args);

?>
<div class="container">
    <section class="article-banner">
        <div class="article-banner__wrap" style="background-image: url(<?php echo get_the_post_thumbnail_url($post_id, 'full'); ?>)">
            <div class="article-banner__content">
                <div class="article-banner-desc__wrap">
                    <div class="article-banner__left-desc">
                        <div class="article-banner__category">
                            <?= $category_name; ?>
                        </div>
                        <h1 class="h3 article-banner__title">
                            <?= $post_title; ?>
                        </h1>
                        <div class="article-banner__title text-2">
                            <?= $post_excerpt ?>
                        </div>
                    </div>
                    <div class="article-banner__right-desc">
                        <div class="author-name__wrap">
                            <div class="right-desc__sub-title text-3">АВТОР</div>
                            <div class="h6"><?= $post_author; ?></div>
                        </div>
                        <div class="author-name__wrap">
                            <div class="right-desc__sub-title text-3">ДАТА НАПИСАНИЯ</div>
                            <div class="h6"><?= $post_date; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="single-post__breadcrumb site-breadcrumb">
        <?php do_action('pretty_breadcrumb'); ?>
    </div>
    <div class="single-post__content">
        <?php the_content() ?>

        <div class="article-inner-socials__wrap">
            <div class="share-socials__wrap">
                <a class="share-social__item facebook" class="share-social__item" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()) ?>" target="_blank" rel="nofollow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
                        <path d="M30.9451 15.5C30.9451 6.93959 24.0309 0 15.5018 0C6.97276 0 0.0585938 6.93959 0.0585938 15.5C0.0585938 23.2365 5.70595 29.6489 13.0888 30.8117V19.9805H9.1677V15.5H13.0888V12.0852C13.0888 8.20047 15.3944 6.0547 18.922 6.0547C20.6116 6.0547 22.3789 6.35743 22.3789 6.35743V10.1719H20.4315C18.5131 10.1719 17.9149 11.3667 17.9149 12.5925V15.5H22.1979L21.5132 19.9805H17.9148V30.8117C25.2977 29.6489 30.9451 23.2365 30.9451 15.5Z" fill="white" />
                        <path d="M21.5135 19.9805L22.1982 15.5H17.9151V12.5924C17.9151 11.3667 18.5134 10.1719 20.4318 10.1719H22.3792V6.35741C22.3792 6.35741 20.6119 6.05469 18.9222 6.05469C15.3947 6.05469 13.0891 8.20046 13.0891 12.0852V15.5H9.16797V19.9805H13.0891V30.8117C13.8873 30.9373 14.6941 31.0002 15.5021 31C16.323 31 17.1289 30.9355 17.9151 30.8117V19.9805H21.5135Z" fill="#1877F2" />
                    </svg>
                    <span class="share-social__text">Поделиться</span>
                </a>
                <a class="share-social__item telegram" href="https://t.me/share/url?url='<?php echo urlencode(get_permalink()) ?>" target="_blank" rel="nofollow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="29" height="27" viewBox="0 0 29 27" fill="none">
                        <path d="M28.3807 2.42316L23.3071 23.1072C23.0684 24.0813 21.9642 24.5832 21.0588 24.1206L14.642 20.844L11.6079 25.7542C10.7823 27.0925 8.6932 26.512 8.6932 24.9472V19.476C8.6932 19.0529 8.87218 18.6494 9.18061 18.3542L21.6856 6.54602C21.6756 6.39842 21.5164 6.27059 21.3574 6.37865L6.43532 16.6518L1.42155 14.0934C0.247796 13.493 0.297536 11.8103 1.51104 11.2889L26.2323 0.632267C27.416 0.120487 28.6891 1.17357 28.3807 2.42316Z" fill="white" />
                    </svg>
                    <span class="share-social__text">Поделиться</span>
                </a>
                <a class="share-social__item whatsapp" target="_blank" onclick="this.href='https://wa.me/?text=<?= $post_title; ?>: '+location.href">
                    <svg xmlns="http://www.w3.org/2000/svg" width="29" height="31" viewBox="0 0 29 31" fill="none">
                        <g clip-path="url(#clip0_2189_370)">
                            <path d="M6.17683 28.1158L6.73299 28.3962C9.00075 29.7561 11.5934 30.4668 14.2319 30.4521C22.3547 30.4334 29.0287 23.6891 29.0287 15.5C29.0287 11.5424 27.4695 7.74175 24.6971 4.94009C21.9283 2.10948 18.1455 0.514282 14.2032 0.514282C6.1175 0.514282 -0.535156 7.22217 -0.535156 15.3729C-0.535156 15.4374 -0.535156 15.5009 -0.534227 15.5654C-0.509874 18.3366 0.258929 21.0494 1.69044 23.4153L2.0612 23.976L0.578107 29.4895L6.17683 28.1158Z" fill="white" />
                            <path d="M26.3447 3.258C23.1884 0.0115049 18.8586 -1.80982 14.35 -1.78839H14.3213C5.03618 -1.78836 -2.60458 5.9148 -2.60458 15.2757C-2.60458 15.3196 -2.60365 15.3626 -2.60365 15.4066C-2.56868 18.3828 -1.80445 21.3041 -0.378987 23.9106L-2.78906 32.7883L6.193 30.4521C8.6743 31.8255 11.4639 32.5334 14.2944 32.508C23.6139 32.4566 31.2537 24.7096 31.2482 15.3131C31.2704 10.7985 29.5046 6.4568 26.3447 3.258ZM14.35 29.611C11.841 29.6242 9.37606 28.9456 7.22188 27.6486L6.66572 27.3682L1.31727 28.77L2.70768 23.4433L2.33692 22.8826C0.959666 20.6406 0.230008 18.0558 0.229971 15.4187C0.229971 7.64177 6.57767 1.24223 14.2917 1.24223C22.0056 1.24223 28.3533 7.64177 28.3533 15.4187C28.3533 20.3155 25.8367 24.8778 21.71 27.4617C19.5274 28.8712 16.9884 29.6174 14.3964 29.611M22.5442 19.238L21.5246 18.7708C21.5246 18.7708 20.0415 18.1166 19.1145 17.6494C19.0218 17.6494 18.9291 17.5559 18.8364 17.5559C18.6079 17.5616 18.3846 17.6259 18.1876 17.7428C17.9901 17.8596 18.0949 17.8363 16.7972 19.3315C16.7091 19.5062 16.5284 19.6156 16.3337 19.6118H16.241C16.1017 19.5883 15.9725 19.5232 15.8702 19.4249L15.4068 19.238C14.4123 18.8136 13.5017 18.2121 12.7186 17.4625C12.5332 17.2756 12.2552 17.0886 12.0698 16.9017C11.3836 16.239 10.791 15.4844 10.3086 14.659L10.2159 14.4721C10.1354 14.3578 10.0728 14.2317 10.0305 14.0982C10.0063 13.9364 10.0391 13.771 10.1232 13.631C10.2076 13.4908 10.494 13.1637 10.7721 12.8834C11.0501 12.603 11.0501 12.4162 11.2355 12.2292C11.3308 12.0958 11.3967 11.9434 11.4286 11.7822C11.4606 11.621 11.458 11.4548 11.4209 11.2947C10.9889 10.0855 10.4939 8.90016 9.93782 7.74362C9.78877 7.50993 9.55656 7.34271 9.28896 7.27636H8.26932C8.08394 7.27636 7.89856 7.3698 7.71315 7.3698L7.62046 7.46325C7.43508 7.55669 7.2497 7.74362 7.06429 7.83706C6.87891 7.93051 6.78622 8.21088 6.60084 8.39777C5.95283 9.22333 5.59428 10.242 5.5812 11.2947C5.59147 12.0352 5.74906 12.7661 6.04465 13.4441L6.13737 13.7244C6.96968 15.5185 8.1337 17.136 9.56706 18.4904L9.93782 18.8642C10.2076 19.0895 10.4559 19.3398 10.6794 19.6118C12.6 21.2967 14.8812 22.5116 17.3441 23.163C17.6221 23.2564 17.9929 23.2564 18.271 23.3499H19.198C19.6824 23.3258 20.1563 23.1984 20.5884 22.976C20.8154 22.8723 21.0323 22.7471 21.2372 22.6023L21.4226 22.4153C21.608 22.2284 21.7934 22.135 21.9788 21.9481C22.1599 21.7854 22.3161 21.5964 22.4422 21.3874C22.6202 20.9687 22.7453 20.5295 22.813 20.0791V19.4249C22.7297 19.3495 22.6361 19.2865 22.5349 19.238" fill="#00E676" />
                        </g>
                        <defs>
                            <clipPath id="clip0_2189_370">
                                <rect width="29" height="30.1154" fill="white" transform="translate(0 0.442261)" />
                            </clipPath>
                        </defs>
                    </svg>
                    <span class="share-social__text">Поделиться</span>
                </a>
            </div>
            <?php comment_form($comment_args); ?>
        </div>
        <?php if ($comments) : ?>
            <section class="comments-area__wrap distance">
                <div class="h4 comments-area__title">Комментарии</div>
                <div class="all-comments__wrap">
                    <?php foreach ($comments as $comment) : ?>
                        <div class="single-comment__wrap">
                            <div class="single-comment__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="51" height="33" viewBox="0 0 51 33" fill="none">
                                    <circle cx="25.6707" cy="7.61795" r="6.60318" stroke="#1744D0" stroke-width="2.02955" />
                                    <path d="M38.9287 32.2583V28.5088C38.9287 22.9044 34.3854 18.3611 28.7809 18.3611H22.5618C16.9574 18.3611 12.4141 22.9044 12.4141 28.5088V32.2583" stroke="#1744D0" stroke-width="2.02955" />
                                </svg>
                            </div>
                            <div class="single-comment__text">
                                <?php echo $comment->comment_content; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>
    </div>
    <div class="recent-posts__container distance">
        <?php
        $post_categories = wp_get_post_categories($post_id);

        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 9,
            'cat' => $post_categories,
            'post__not_in' => [ $post_id ],
            'orderby' => 'date',
            'order' => 'DESC'
        );

        $result = new WP_Query($args);

        if ($result->have_posts()) : ?>
            <div class="recent-posts__block">
                <div class="post-recent__wrap post-padding">
                    <div class="post-recent__header">
                        <div class="h4 post-recent__title">Интересные статьи</div>
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
                    <div class="swiper swiper-recent-posts__wrap" itemscope itemtype="https://schema.org/ItemList">
                        <div class="swiper-wrapper">
                            <?php while ($result->have_posts()) : $result->the_post(); ?>
                                <?php $image = get_the_post_thumbnail_url(get_the_ID(), 'blog-post-thumbnail'); ?>
                                <div class="swiper-slide">
                                    <?php get_template_part('components/blog-article', null) ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;?>
    </div>
</div>
<?php 
the_pattern('clients-on-map');
get_footer();

