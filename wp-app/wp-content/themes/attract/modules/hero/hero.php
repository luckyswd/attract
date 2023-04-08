<?php

/*
Title: Главный модуль
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$photos = get_field('photos');
$button = get_field('button');
$information = get_field('information');
?>

<?php if (!is_admin()) : ?>
    <section class="hero distance">
        <div class="container">
            <?php if (!empty($headline)) : ?>
                <h2>
                    <?= $headline ?>
                </h2>
            <?php endif; ?>
            <?php if (!empty($photos)) : ?>
                <div class="hero-photos">
                    <?php foreach ($photos as $photo) : ?>
                        <div class="hero-photo">
                            <?= getPictureImage($photo['photo'], 350, 350) ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="hero-footer">
                    <?php if (!empty($information)) : ?>
                        <div class="hero-information">
                            <?= $information ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($button)) : ?>
                        <a href="<?= $button['url'] ?>" class="hero-btn">
                            <?= $button['title'] ?? '' ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Главный модуль</h2>
<?php endif; ?>