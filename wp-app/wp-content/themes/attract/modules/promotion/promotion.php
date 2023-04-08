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
    <section class="promotion distance">
        <?php anchorHelper('promotion');?>

        <div class="container">
            <?php if (!empty($headline)) : ?>
                <h2 class="promotion__headline">
                    <?= $headline ?>
                </h2>
            <?php endif; ?>

            <?php if (!empty($button)) : ?>
                <a class="promotion__button btn">
                    <?= $button['title'] ?>
                </a>
            <?php endif; ?>
        </div>


    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Продвижение</h2>
<?php endif; ?>