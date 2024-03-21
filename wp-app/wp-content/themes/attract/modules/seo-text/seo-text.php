<?php

/*
Title: SEO-текст модуль
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$subheadline = get_field('subheadline');
$text = get_field('text');
?>

<?php if (!is_admin()) : ?>
    <section class="seo-text distance">
        <div class="container">
            <div class="seo-text-wrapper">
                <div class="seo-text-left">
                    <h2 class="h3"><?= $headline ?? '' ?></h2>
                    <div class="text-2"><?= $subheadline ?? '' ?></div>
                </div>
                <div class="seo-text-right">
                    <div class="text-3"><?= $text ?? '' ?></div>
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">SEO-текст модуль</h2>
<?php endif; ?>