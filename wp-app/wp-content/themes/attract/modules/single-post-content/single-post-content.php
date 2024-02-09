<?php

/*
Title: Контент поста
Mode: preview
*/

?>

<?php
if (!is_admin()) :

$blocks = get_field("content-blocks");

?>
<?php foreach($blocks as $block): ?>
    <section class="content-block distance" >
        <?php if(!empty($block['block_id'])): ?>
            <div class="block-anchor" id="<?= $block['block_id'] ?>"></div>
        <?php endif; ?>
        <div class="content-block__row">
            <?php foreach($block['block'] as $col): ?>
                <?php $col = $col['column'] ?>
                <div class="content-block__cl <?php echo !empty($col['full-width']) && !!$col['full-width'] ? 'content-block__cl_full-width' : '' ?>">
                    <?php if(!empty($col['blue-title'])): ?>
                        <div class="content-block__blue-title text-1"><?= $col['blue-title']; ?></div>
                    <?php endif; ?>
                    <?php if(!empty($col['title'])): ?>
                        <div class="content-block__title h5"><?= $col['title']; ?></div>
                    <?php endif; ?>
                    <?php if(!empty($col['sub-title'])): ?>
                        <div class="content-block__sub-title text-1"><?= $col['sub-title']; ?></div>
                    <?php endif; ?>
                    <?php if(!empty($col['number'])): ?>
                        <div class="content-block__number"><?= $col['number']; ?></div>
                    <?php endif; ?>
                    <?php if(!empty($col['text'])): ?>
                        <div class="content-block__text text-2"><?= $col['text']; ?></div>
                    <?php endif; ?>
                    <?php if(!empty($col['blue-box-text'])): ?>
                        <div class="content-block__blue-box-text text-1"><?= $col['blue-box-text']; ?></div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php endforeach; ?>

<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Контент поста</h2>
<?php endif; ?>
