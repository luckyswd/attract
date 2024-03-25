<?php

/*
Title: Категории услуг
Mode: preview
*/

?>

<?php if (!is_admin()) : ?>
    <?php get_template_part( 'components/section-service-cats', null ); ?>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Категории услуг</h2>
<?php endif; ?>