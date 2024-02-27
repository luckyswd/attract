<?php
get_header();

global $post;

$category = get_the_terms($post->ID, 'case-category');
$categoryName = '';
if (!empty($category)) {
    $categoryName = $category[0]->name;
}

$img = get_field('individual_image');
$backgroundImage['url'] = is_array($img) ? $img['sizes']['case-hero'] : '';
$shortDescription = get_field('shor_description');
$subHeadline = get_field('sub_headline');
$elapsedTime = get_field('elapsed_time');
$year = get_field('year');
?>

<section class="hero-case distance">
    <div class="container">
        <div class="hero-case-wrap" style="background-image: url(<?= $backgroundImage['url'] ?>)">
            <div class="case-info">
                <div class="case-left-info">
                    <p class="text-4"><?= $categoryName ? $categoryName : get_the_title() ?></p>
                    <p class="h3"><?= $shortDescription ?? '' ?></p>
                    <div class="wrap-bottom">
                        <div class="left">
                            <p class="text-2"><?= $subHeadline ?? '' ?></p>
                        </div>

                    </div>
                </div>
                <div class="right">
                    <?php if (!empty($elapsedTime)) : ?>
                        <div class="elapsed-time">
                            <p class="text-3">Время работы</p>
                            <p class="h6"><?= $elapsedTime ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($year)) : ?>
                        <div class="year">
                            <p class="text-3">ГОД</p>
                            <p class="h6"><?= $year ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
the_content();
?>
<?php
$next_case = get_adjacent_post( true, '', false, 'case-category' );
if(!!$next_case):
    $tags = get_field('tags', $next_case->ID);
    $img = get_field('preview_image', $next_case->ID);
    $img_url = is_array($img) ? $img['url'] : '';
?>
    <section class="case-next">
        <?php if (!empty($img_url)) : ?>
            <img src="<?= $img_url ?>" loading="lazy" alt="" class="case-next__bg">
        <?php endif;?>
        <a class="case-next__link" href="<?= get_permalink($next_case->ID) ?>">
            <div class="container">
                <div class="case-next__header">
                    <p class="case-next__header-caption">Следующий кейс</p>
                    <div class="case-next__header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="44" height="43" viewBox="0 0 44 43" fill="none">
                        <circle cx="22.1309" cy="21.5" r="21.5" fill="white"></circle>
                        <line x1="30.2566" y1="13.9756" x2="14.6124" y2="29.6198" stroke="#000618" stroke-width="2.24138"></line>
                        <line y1="-1.12069" x2="13.6887" y2="-1.12069" transform="matrix(-1 1.24876e-07 1.24876e-07 1 29.4821 15.4218)" stroke="#000618" stroke-width="2.24138"></line>
                        <line x1="29.9555" y1="14.7745" x2="29.9555" y2="28.4632" stroke="#000618" stroke-width="2.24138"></line>
                    </svg></div>
                </div>
                <div class="case-next__content">
                    <div class="case-next__title h2"><?= $next_case->post_title ?></div>
                    <?php if (!empty($tags)) : ?>
                        <div class="case-next__tags">
                            <?php foreach ($tags as $tag) : ?>
                                <?php if (!empty($tag['name'])) : ?>
                                    <div class="case-next__tag text-4"><?= $tag['name'] ?></div>
                                <?php endif;?>
                            <?php endforeach;?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </a>
    </section>
<?php
endif;
get_footer();
?>