<?php

/*
Title: Эффективный маркетинг
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$description = get_field('description');
$tags = get_field('tags');
$side_image = get_field('side_image');
$side_image_mobile = get_field('side_image_mobile');
$button = get_field('button');
$information = get_field('information');
?>

<?php if (!is_admin()) : ?>
    <section class="effective-marketing distance">
        <?php anchorHelper('effective-marketing'); ?>
        <div class="container">
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
                            <div class="effective-marketing__btn">
                                <?= $button['title'] ?? '' ?>
                            </div>
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
                    <div class="effective-marketing__btn">
                        <?= $button['title'] ?? '' ?>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Эффективный маркетинг</h2>
<?php endif; ?>