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
                            <div class="hero-footer">
                                <?php if (!empty($firstSlide['information'])) : ?>
                                    <div class="hero-information">
                                        <?= $firstSlide['information'] ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($firstSlide['button'])) : ?>
                                    <a href="<?= $firstSlide['button']['url'] ?>" class="hero-btn btn">
                                        <?= $firstSlide['button']['title'] ?? '' ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php foreach ($slides as $slide) : ?>
                        <?php
                        $headline = $slide['headline'];
                        $description = $slide['description'];
                        $tags = $slide['tags'];
                        $side_image = $slide['side_image'];
                        $side_image_mobile = $slide['side_image_mobile'];
                        $button = $slide['button'];
                        $information = $slide['information'];
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
                                                <?= getPictureImage($side_image_mobile) ?>
                                            <?php endif; ?>
                                        </div>
                                        <?php if (!empty($tags)) : ?>
                                            <div class="effective-marketing__tags">
                                                <?php foreach ($tags as $tag) : ?>
                                                    <?php if (!empty($tag)) : ?>
                                                        <div class="effective-marketing__tag">
                                                            <?= '<span>#</span>' . $tag['name_tag'] ?>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="effective-marketing__footer">
                                            <?php if (!empty($information)) : ?>
                                                <div class="effective-marketing__information">
                                                    <?= $information ?>
                                                </div>
                                            <?php endif; ?>

                                            <?php if (!empty($button)) : ?>
                                                <a href="<?= $button['url'] ?>" class="effective-marketing__btn btn">
                                                    <?= $button['title'] ?? '' ?>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="effective-marketing__side">
                                        <?php if (!empty($side_image)) : ?>
                                            <?= getPictureImage($side_image) ?>
                                        <?php endif; ?>

                                    </div>
                                </div>
                                <div class="effective-marketing__footer mobile">
                                    <?php if (!empty($information)) : ?>
                                        <div class="effective-marketing__information">
                                            <?= $information ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($button)) : ?>
                                        <div class="effective-marketing__btn btn">
                                            <?= $button['title'] ?? '' ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Главный модуль</h2>
<?php endif; ?>