<?php

/*
Title: Следи за нами
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$button = get_field('button');
$side_image = get_field('side_image');
?>

<?php if (!is_admin()) : ?>
    <section class="follow-us distance" id="follow-us">
        <div class="container">
            <div class="follow-us__content">
                <div class="follow-us__main">
                    <?php if (!empty($headline)) : ?>
                        <h2 class="follow-us__headline">
                            <?= $headline ?>
                        </h2>
                    <?php endif; ?>

                    <?php if (!empty($button)) : ?>
                        <a href="<?= $button['url'] ?? '#' ?>" class="follow-us__button">
                            <?= $button['title'] ?? '' ?>
                        </a>
                    <?php endif; ?>
                </div>

                <div class="follow-us__side">
                    <?php if (!empty($side_image)) : ?>
                        <div class="follow-us__image">
                            <?= getPictureImage($side_image) ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Следи за нами</h2>
<?php endif; ?>