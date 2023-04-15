<?php

/*
Title: Главный модуль
Mode: preview
*/

?>

<?php
$firstSlide = get_field('first_slide');
$slides = get_field('slides');
?>

<?php if (!is_admin()) : ?>
    <section class="hero distance">
        <div class="container">
            <div class="swiper swiper-hero">
                <div class="swiper-wrapper">
                    <?php foreach ($slides as $slide) : ?>
                        <?php
                        $headline = $slide['headline'];
                        $description = $slide['description'];
                        $tags = $slide['tags'];
                        $side_image = $slide['side_image'];
                        $side_image_mobile = $slide['side_image_mobile'];
                        $button = $slide['button'];
                        $text = $slide['information'];
                        ?>
                        <div class="swiper-slide">
                            <div class="effective-marketing">
                                <div class="effective-marketing__content">
                                    <div class="effective-marketing__main">
                                        <?php if (!empty($headline)) : ?>
                                            <h2 class="effective-marketing__headline">
                                                <?= $headline ?>
                                            </h2>
                                        <?php endif; ?>
                                        <?php if (!empty($description)) : ?>
                                            <p class="effective-marketing__description subtitle-main">
                                                <?= $description ?>
                                            </p>
                                        <?php endif; ?>
                                        <div class="effective-marketing__side-mobile">
                                            <?php if (!empty($side_image_mobile)) : ?>
                                                <img src="<?= $side_image_mobile['url'] ?>" alt="">
<!--                                                --><?php //= getPictureImage($side_image_mobile, 400, 600) ?>
                                            <?php endif; ?>
                                        </div>
                                        <?php if (!empty($tags)) : ?>
                                            <div class="effective-marketing__tags">
                                                <?php foreach ($tags as $tag) : ?>
                                                    <?php if (!empty($tag)) : ?>
                                                        <p class="effective-marketing__tag">
                                                            <?= '<span>#</span>' . $tag['name_tag'] ?>
                                                        </p>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php include get_template_directory() . '/components/text-and-button.php' ?>
                                    </div>
                                    <div class="effective-marketing__side">
                                        <?php if (!empty($side_image)) : ?>
                                            <img src="<?= $side_image['url'] ?>" alt="">
<!--                                            --><?php //= getPictureImage($side_image, 500, 100) ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="swiper-slide">
                        <?php if (!empty($firstSlide['headline'])) : ?>
                            <h2>
                                <?= $firstSlide['headline'] ?>
                            </h2>
                        <?php endif; ?>
                        <?php if (!empty($firstSlide['photos'])) : ?>
                            <div class="hero-photos">
                                <?php foreach ($firstSlide['photos'] as $photo) : ?>
                                    <div class="hero-photo">
                                        <?= getPictureImage($photo['photo'], 350, 350) ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <?php
                            $text = $firstSlide['information'];
                            $button = $firstSlide['button'];
                            ?>
                            <?php include get_template_directory() . '/components/text-and-button.php' ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="text-and-button-mobile">
                <?php include get_template_directory() . '/components/text-and-button.php' ?>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Главный модуль</h2>
<?php endif; ?>