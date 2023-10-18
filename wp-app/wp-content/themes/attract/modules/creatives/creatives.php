<?php

/*
Title: Создание креативов модуль
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$creatives_first_line = get_field('creatives_first_line');
$creatives_second_line = get_field('creatives_second_line');
?>

<?php if (!is_admin()) : ?>
    <section class="creatives distance">
        <div class="container">
            <div class="creatives-wrapper">
                <div class="creatives-top">
                    <div class="h3"><?= $headline ?? '' ?></div>
                </div>
                <div class="creatives-bottom">
                    <?php if (!empty($creatives_first_line)) : ?>
                        <div class="creatives-items first marquee3k" data-speed="1" data-pausable="true">
                            <div>
                                <?php foreach ($creatives_first_line as $creative) : ?>
                                    <img src="<?= $creative['url'] ?>" />
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($creatives_second_line)) : ?>
                        <div class="creatives-items second marquee3k" data-speed="1" data-pausable="true" data-reverse="true">
                            <div>
                                <?php foreach ($creatives_second_line as $creative) : ?>
                                    <img src="<?= $creative['url'] ?>" />
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Создание креативов модуль</h2>
<?php endif; ?>