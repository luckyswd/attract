<?php

/*
Title: Для чего нужна услуга модуль
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$text = get_field('text');
$for_what_blocks = get_field('for_what_blocks');
?>

<?php if (!is_admin()) : ?>
    <section class="for-what distance">
        <div class="container">
            <div class="for-what-wrapper">
                <div class="for-what-top">
                    <?php if(!empty($headline)): ?>  
                        <h2 class="h2"><?= $headline ?? '' ?></h2>
                    <?php endif; ?>
                    <div class="text-2"><?= $text ?? '' ?></div>
                </div>
                <?php if (!empty($for_what_blocks)) : ?>
                    <div class="for-what-bottom">
                        <div class="for-what-blocks">
                            <?php foreach ($for_what_blocks as $block) : ?>
                                <div class="for-what-block">
                                    <?php if($block['headline_svg']): ?>
                                    <div class="headline-svg"><img src="<?= $block['headline_svg'] ?? '' ?>" alt="<?= $block['headline'] ?? '' ?>" /></div>
                                    <?php endif; ?>
                                    <div class="h5"><?= $block['headline'] ?? '' ?></div>
                                    <div class="text-3"><?= $block['text'] ?? '' ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php else : ?>
    <h2 style="font-family: 'Mark', sans-serif;">Для чего нужна услуга модуль</h2>
<?php endif; ?>