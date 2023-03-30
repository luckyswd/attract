<?php

/*
Title: Эффективный маркетинг
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$socials = get_field('socials');
$description = get_field('description');
$tags = get_field('tags');
$side_image = get_field('side_image');
$side_image_mobile = get_field('side_image_mobile');
$button = get_field('button');
$information = get_field('information');
?>

<?php if (!is_admin()) : ?>
    <section class="effective-marketing">
        <div class="container">
            <div class="effective-marketing__content">
                <div class="effective-marketing__main">
                    <?php if (!empty($socials)) : ?>
                        <div class="effective-marketing__socials">
                            <?php foreach ($socials as $social) : ?>
                                <?php if (!empty($social)) : ?>
                                    <a href="<?= $social['url'] ?>" class="effective-marketing__social">
                                        <img loading="lazy" src="<?= $social['icon']['url'] ?>" alt="Иконка">
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($headline)) : ?>
                        <h2 class="effective-marketing__headline">
                            <?= $headline ?>
                        </h2>
                    <?php endif; ?>
                    <?php if (!empty($description)) : ?>
                        <p class="effective-marketing__description">
                            <?= $description ?>
                        </p>
                    <?php endif; ?>
                    <div class="effective-marketing__side-mobile">
                        <?php if (!empty($side_image_mobile)) : ?>
                            <img loading="lazy" src="<?= $side_image_mobile['url'] ?>" alt="Картинка">
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
                        <img loading="lazy" src="<?= $side_image['url'] ?>" alt="Картинка">
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