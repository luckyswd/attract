<?php

/*
Title: Хлебные крошки модуль
Mode: preview
*/

$show_page_title = get_field("show_page_title");
$page_title =
    get_the_title();
?>

<?php if (!is_admin()) : ?>
    <section class="breadcrumbs distance <?php if ($show_page_title) :  ?> breadcrumbs-with-title <?php endif; ?>">
        <div class="container">
            <div class="breadcrumbs-wrap">
                <?= do_shortcode('[wpseo_breadcrumb]'); ?>
            </div>
            <?php if ($show_page_title) : ?>
                <div class="breadcrumbs-page-title">
                    <h1 class="h2"><?= $page_title; ?></h1>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php else : ?>
    <h2 style="font-family: 'Mark', sans-serif;">Хлебные крошки модуль</h2>
<?php endif; ?>