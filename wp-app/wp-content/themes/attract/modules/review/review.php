<?php

/*
Title: Отзывы модуль
Mode: preview
*/


$reviews = get_field('reviews');
$headline = get_field('headline');

if (!is_admin()) :
    if (!empty($reviews)){
        get_template_part('components/reviews', null, array('headline' => $headline, 'reviews' => $reviews));
    }
else : ?>
    <h2 style="font-family: 'Mark', sans-serif;">Отзывы модуль</h2>
<?php endif; ?>