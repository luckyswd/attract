<?php

/*
Title: Хлебные крошки модуль
Mode: preview
*/

?>

<?php if (!is_admin()) : ?>
    <section class="breadcrumbs distance">
        <div class="container">
            <div class="breadcrumbs-wrap">
                <?= do_shortcode('[wpseo_breadcrumb]'); ?>
            </div>
        </div>
    </section>
<?php else : ?>
    <h2 style="font-family: 'Mark', sans-serif;">Хлебные крошки модуль</h2>
<?php endif; ?>