<?php

$tax = $args['tax'] ?? false;

$blocks = get_field("content-blocks", $tax) ?? array();
?>
<?php foreach($blocks as $block): ?>
    <section class="content-block distance" >
        <?php if(!empty($block['block_id'])): ?>
            <div class="block-anchor" id="<?= $block['block_id'] ?>"></div>
        <?php endif; ?>
        <div class="content-block__row">
            <?php foreach($block['block'] as $col): ?>
                <div class="content-block__cl <?php echo !empty($col['align-center']) && !!$col['align-center'] ? 'content-block__cl_align-center' : '' ?> <?php echo !empty($col['full-width']) && !!$col['full-width'] ? 'content-block__cl_full-width' : '' ?>">
                    <?php $col = $col['column'] ?>
                    <?php //var_dump($col); ?>
                    <?php foreach($col as $el): ?>
                        <?php
                        switch ($el['acf_fc_layout']):
                            case 'blue-title':
                                ?>
                                <div class="content-block__blue-title text-1"><?= $el['text']; ?></div>
                                <?php
                                break;
                            case 'title':
                                ?>
                                <h2 class="content-block__title h5"><?= $el['text']; ?></h2>
                                <?php
                                break;
                            case 'sub-title':
                                ?>
                                <div class="content-block__sub-title text-1"><?= $el['text']; ?></div>
                                <?php
                                break;
                            case 'blue-box-text':
                                ?>
                                <div class="content-block__blue-box-text text-1"><?= $el['text']; ?></div>
                                <?php
                                break;
                            case 'text-block-wrapper':
                                ?>
                                <div class="content-block__texts-wrapper">
                                    <?php $i = 1; ?>
                                    <?php foreach($el['text-block'] as $text_block): ?>
                                        <div class="content-block__text-wrapper">
                                            <?php if(!empty($el['show-numbers']) && !!$el['show-numbers']): ?>
                                                <div class="content-block__number">(<?php echo str_pad($i, 2, "0", STR_PAD_LEFT) ?>)</div>
                                            <?php endif; ?>
                                            <div class="content-block__text text-2"><?= $text_block['text']; ?></div>
                                        </div>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </div>
                                <?php
                                break;
                        endswitch;
                        ?>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php endforeach; ?>