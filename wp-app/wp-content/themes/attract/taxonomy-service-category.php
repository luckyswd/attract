<?php
get_header();

$tax = get_queried_object();
$page_title = get_field('page_title', $tax);
$custom_post_content_id = get_field('custom_post_content', $tax);
?>
<section class="service-tax-hero distance">
    <div class="container">
        <div class="wrap">
            <picture>
                <source media="(min-width: 1024px)" srcset="/wp-content/uploads/2023/08/item-1.svg">
                <source media="(min-width: 480px)" srcset="/wp-content/uploads/2023/08/tablet.svg">
                <img decoding="async" src="/wp-content/uploads/2023/08/mobile.svg" alt="фон">
            </picture>
            <div class="content ">
                <h1 class="h2"><?= $page_title ?? $tax->name ?? '' ?></h1>
            </div>
        </div>
        <div class="service-tax-hero__breadcrumb site-breadcrumb">
            <?php do_action('pretty_breadcrumb'); ?>
        </div>
    </div>
</section>
<?php get_template_part( 'components/section-service-cats', null ); ?>

<section class="service-tax-services services distance">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <div class="services-cards" itemtype="https://schema.org/ItemList" itemscope="">
            <?php
            /* Start the Loop */
            while ( have_posts() ) :
                the_post();

                get_template_part( 'components/service-card', null );

            endwhile;

        else:

            get_template_part( 'template-parts/content', 'none' );

        endif;
        ?>
        </div>
    </div>
</section>

<div class="service-tax-content">
    <?php if ($custom_post_content_id) : ?>
        <?php $custom_post_content = get_post($custom_post_content_id); ?>
        <?php echo apply_filters('the_content', $custom_post_content->post_content); ?>
    <?php endif; ?>
    <div class="container">
        <?php get_template_part( 'components/acf-post-content', null, array('tax' => $tax) ); ?>
    </div>
</div>
<?php 
$contact_us_block = get_field('contact_us_block', 'options');
$socials = $contact_us_block['social_links'];
?>
<section class="contact-form distance">
    <div class="block-anchor" id="contact-form"></div>
    <div class="container">
        <div class="form-wrapper">
            <div class="form-left">
                <p class="h4">Хватит искать команду своей мечты! Мы тут, оставляй заявку!</p>
                <div class="left-overlay">
                    <picture>
                        <img decoding="async" loading="lazy" src="/wp-content/uploads/2023/07/img-1.png" alt="img (1)" width="650" height="650">
                    </picture>
                </div>

                <div class="left-bottom">
                    <p class="h6"> Или свяжитесь любым другим удобным способом</p>
                    <?php if (!empty($socials)) : ?>
                        <div class="social-wrap">
                            <?php foreach ($socials as $social) : ?>
                                <?php $link = $social['link'] ?>
                                <a href="<?= $link['url'] ?? '' ?>" title="<?= $link['title'] ?? '' ?>" target="<?= $link['target'] ?? '' ?>" class="social-icon">
                                    <?= getPictureImage($social['icon'], 31, 31) ?>
                                </a>
                            <?php endforeach;?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
            <div class="form-right">
                <p class="h5">Заполняйте форму и мы с вами свяжемся!</p>
                <?= do_shortcode('[contact-form-7 id="137" title="Оставить заявку"]') ?>
            </div>
        </div>
    </div>
</section>
<?php
the_pattern('clients-on-map');
get_footer();
