<?php

/*
Title: Кейсы для услуг модуль
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$button = get_field('button');
$cases = get_field('cases');
?>

<?php if (!is_admin()) : ?>
    <section class="cases for-services distance">
        <div class="block-anchor" id="cases"></div>
        <div class="container">
            <div class="cases-top">
                <p class="h4"><?= $headline ?? '' ?></p>
                <a class="btn blue" href="<?= $button['url'] ?>">
                    <span class="hover-animation">
                        <span><?= $button['title'] ?? '' ?></span>
                    </span>
                </a>
                <a class="btn blue" href="#contact-form">
                    <span class="hover-animation">
                        <span>Оставить заявку</span>
                    </span>
                </a>
            </div>
            <?php if (!empty($cases)) : ?>
                <div class="cases-wrapper">
                    <?php foreach ($cases as $key => $case) : ?>
                        <?php
                        $shor_description = get_field('shor_description', $case->ID);
                        $preview_image = get_field('preview_image', $case->ID);
                        $link = get_permalink($case);
                        $tags = get_field('tags', $case->ID);
                        $class = 'medium-mode';
                        $h = 'h5';
                        ?>
                        <?php include get_template_directory() . '/components/case-card.php' ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Кейсы для услуг модуль</h2>
<?php endif; ?>