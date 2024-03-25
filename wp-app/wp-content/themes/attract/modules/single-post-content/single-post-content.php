<?php

/*
Title: Контент поста
Mode: preview
*/

?>

<?php
if (!is_admin()) :

    get_template_part( 'components/acf-post-content', null );

?>

<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Контент поста</h2>
<?php endif; ?>
