<?php

/*
Title: Команда модуль
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$description_text = get_field('text');

$categories = get_terms([
    'taxonomy' => 'team-category',
    'hide_empty' => true,
]);


$team = get_posts([
    'post_type' => 'team',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'ASC',
]);

?>

<?php if (!is_admin()) : ?>
    <section class="team distance">
        <div class="container">
            <div class="team-wrapper">
                <div class="head-text__wrap">
                    <p class="h3"><?= $headline ?? '' ?></p>
                    <p class="description_text"><?= $description_text; ?></p>
                </div>
                <?php if (!empty($team)) : ?>

                    <div class="swiper swiper-team">
                        <div class="swiper-wrapper">

                            <?php foreach ($team as $team_member) : ?>
                                <?php

                                $name = $team_member->post_title;
                                $image = get_field('staff-image', $team_member->ID);
                                $position = get_field('position', $team_member->ID);
                                $description = get_field('description', $team_member->ID);

                                ?>
                                <div class="swiper-slide">
                                    <div>
                                        <?= getPictureImageWithText(is_array($image) ? $image : null, 420, 146, $name, $position, $description) ?>
                                    </div>

                                </div>
                            <?php endforeach; ?>

                        </div>
                        <div class="swiper-prev animation-left">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="39" viewBox="0 0 25 39" fill="none">
                                <path d="M2.5 2L21 19.5L2.5 36.5" stroke="white" stroke-width="5" />
                            </svg>
                        </div>
                        <div class="swiper-next animation-right">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="39" viewBox="0 0 25 39" fill="none">
                                <path d="M2.5 2L21 19.5L2.5 36.5" stroke="white" stroke-width="5" />
                            </svg>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
    </section>
<?php else : ?>
    <h2 style="font-family: 'Mark', sans-serif;">Команда модуль</h2>
<?php endif; ?>