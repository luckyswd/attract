<?php

/*
Title: Каталог кейсов (шапка) модуль
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$background_image = get_field('background_image');
?>

<?php if (!is_admin()) : ?>
    <section class="catalog-cases-top distance">
        <div class="container">
            <div class="catalog-top" style="background-image: url(<?= $background_image['url'] ?? '' ?>)">
                <p class="text-1"><?= get_the_title() ?></p>
                <p class="h2"><?= $headline ?? '' ?></p>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Каталог кейсов (шапка) модуль</h2>
<?php endif; ?>