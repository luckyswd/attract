<?php

/*
Title: Продвижение
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$button = get_field('button');
?>

<?php if (!is_admin()) : ?>
    <section class="promotion distance" id="promotion">
        <div class="container">
            <?php if (!empty($headline)) : ?>
                <h2 class="promotion__headline">
                    <?= $headline ?>
                </h2>
            <?php endif; ?>

            <?php if (!empty($button)) : ?>
                <a href="<?= $button['url'] ?>" class="promotion__button">
                    <?= $button['title'] ?>
                </a>
            <?php endif; ?>
        </div>


    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Продвижение</h2>
<?php endif; ?>