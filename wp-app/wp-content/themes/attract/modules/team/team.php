<?php

/*
Title: Команда модуль
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$text = get_field('text');
$image_desktop = get_field('image_desktop');
$image_tablet = get_field('image_tablet');
$image_mobile = get_field('image_mobile');
?>

<?php if (!is_admin()) : ?>
    <section class="team distance">
        <div class="container">
            <div class="team-wrapper">
                <div class="team-wrapper__left">
                    <p class="h3"><?= $headline ?? '' ?></p>
                    <p class="text-2"> <?= $text ?? '' ?> </p>
                </div>
                <div class="team-wrapper__right">
                    <picture>
                        <source media="(min-width: 1400px)" srcset="<?= $image_desktop['url'] ?>">
                        <source media="(min-width: 1024px)" srcset="<?= $image_tablet['url'] ?>">
                        <img src="<?= $image_mobile['url'] ?>" alt="картинка" width="482" height="585">
                    </picture>
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Команда модуль</h2>
<?php endif; ?>