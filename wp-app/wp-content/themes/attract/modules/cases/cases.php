<?php

/*
Title: Кейсы модуль
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$cases = get_field('cases');
?>

<?php if (!is_admin()) : ?>
    <section class="cases">
        <div class="container">
            <h2><?= $headline ?? '' ?></h2>
            <?php if (!empty($cases)) : ?>
                <div class="cases-wrapper">
                    <?php foreach ($cases as $key => $case) : ?>
                        <?php
                        $shor_description = get_field('shor_description', $case->ID);
                        $preview_image = get_field('preview_image', $case->ID);
                        $tags = get_field('tags', $case->ID);
                        $index = $key + 1;
                        $class = 'medium-mode';
                        $h = 'h5';

                        if ($index % 6 === 1 || $index % 6 === 0) {
                            $class = 'big-mode';
                            $h = 'h4';
                        }

                        if ($index % 6 === 2 || $index % 6 === 5) {
                            $class = 'small-mode';
                            $h = 'h6';
                        }

                        ?>
                        <div class="case-card <?= $class ?>" style="background-image: url(<?= $preview_image['url'] ?>)">
                            <div class="case-card-top">
                                <p class="text-4"><?= $case->post_title ?></p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="44" height="43" viewBox="0 0 44 43" fill="none">
                                    <circle cx="22.1309" cy="21.5" r="21.5" fill="white"/>
                                    <line x1="30.2566" y1="13.9756" x2="14.6124" y2="29.6198" stroke="#000618" stroke-width="2.24138"/>
                                    <line y1="-1.12069" x2="13.6887" y2="-1.12069" transform="matrix(-1 1.24876e-07 1.24876e-07 1 29.4821 15.4218)" stroke="#000618" stroke-width="2.24138"/>
                                    <line x1="29.9555" y1="14.7745" x2="29.9555" y2="28.4632" stroke="#000618" stroke-width="2.24138"/>
                                </svg>
                            </div>
                            <<?= $h ?> class="case-card_short-description"><?= $shor_description ?? '' ?></<?= $h ?>>
                            <?php if (!empty($tags)) : ?>
                                <div class="case-card__tags">
                                    <?php foreach ($tags as $tag) : ?>
                                        <?php if (!empty($tag)) : ?>
                                            <div class="case-card__tag text-4"><?= $tag['name'] ?></div>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </div>
                            <?php endif;?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Кейсы модуль</h2>
<?php endif; ?>