<?php

/*
Title: Кейсы модуль
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$button = get_field('button');
$cases = get_field('cases');
?>

<?php if (!is_admin()) : ?>
    <section class="cases distance">
        <div class="block-anchor" id="cases"></div>
        <div class="container">
            <div class="cases-top">
                <h2 class="h3"><?= $headline ?? '' ?></h2>
                <a class="btn blue" href="<?= $button['url'] ?>">
                    <span class="hover-animation">
                        <span><?= $button['title'] ?? '' ?></span>
                    </span>
                </a>
            </div>
            <?php if (!empty($cases)) : ?>
                <div class="cases-wrapper">
                    <?php shuffle($cases); ?>
                    <?php foreach ($cases as $key => $case) : ?>
                        <?php
                        $category = get_the_terms($case->ID, 'case-category');
                        $categoryName = '';
                        if (!empty($category)) {
                            $categoryName = $category[0]->name;
                        }
                        
                        $shor_description = get_field('shor_description', $case->ID);
                        $img = get_field('preview_image', $case->ID);
                        $preview_image['url'] = is_array($img) ? $img['sizes']['catalog-case-thumbnail'] : '';
                        $link = get_permalink($case);
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
                        <?php include get_template_directory() . '/components/case-card.php' ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Кейсы модуль</h2>
<?php endif; ?>