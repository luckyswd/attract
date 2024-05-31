<?php

/*
Title: Сетка с карточками
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$cards = get_field('cards');
?>


<?php if (!is_admin()) : ?>
    <section class="cards-grid-section distance">
        <div class="container">
            <?php if(!empty($headline)): ?>  
                <h2 class="h3 section__title"><?= $headline ?></h2>
            <?php endif; ?>
            <?php if (!empty($cards)) : ?>
                <div class="cards-grid">
                    <?php foreach ($cards as $key => $card) : ?>
                        <div class="cards-grid__card <?= $card['full-width'] ? 'cards-grid__card_full-width' : '' ?>" style="background-image: url(<?= $card['bg'] ?>);">
                            <div class="cards-grid__card-top">
                                <img class="cards-grid__card-icon" src="<?= $card['icon'] ?>" alt="">
                                <div class="cards-grid__card-subtitle text-2 cl-blue"><?= $card['subtitle'] ?></div>
                            </div>
                            <div class="cards-grid__card-content">
                                <div class="cards-grid__card-title text-1"><?= $card['title'] ?></div>
                                <?php $text = $card['text']; ?>
                                <?php if (!empty($text)) : ?>
                                    <div class="cards-grid__card-text text-4"><?= $text ?></div>
                                <?php endif; ?>
                                <?php $list = $card['list']; ?>
                                <?php if (!empty($list)) : ?>
                                    <div class="cards-grid__card-list card-list">
                                        <?php foreach ($list as $key => $li) : ?>
                                            <div class="card-list__item text-4">
                                                <?php $number = !empty($li['number']) ? $li['number'] : '(' . str_pad(($key + 1), 2, "0", STR_PAD_LEFT) . ')'; ?>
                                                <p class="card-list__item-number"><?= $number; ?></p>
                                                <p class="card-list__item-text"><?= $li['text'] ?></p>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php else : ?>
    <h2 style="font-family: 'Mark', sans-serif;">Секта с карточками</h2>
<?php endif; ?>