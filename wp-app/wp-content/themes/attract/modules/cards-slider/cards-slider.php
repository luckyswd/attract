<?php

/*
Title: Слайдер с карточками
Mode: preview
*/

$title = get_field('title');
$cards = get_field('cards');

?>

<?php if (!is_admin()) : ?>
    <?php if (!empty($cards)) : ?>
        <section class="cards-slider distance">
            <div class="container">
                <div class="cards-slider__header">
                    <?php if(!empty($title)): ?>  
                        <h2 class="h4 cards-slider__title"><?= $title ?></h2>
                    <?php endif; ?>
                    <div class="cards-slider__arrows-wrap">
                        <div class="swiper-prev" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44" fill="none"><g clip-path="url(#a)"><circle cx="21.5" cy="21.5" r="21.5" transform="matrix(-1 0 0 1 43.5 .2)" fill="#fff"/><path stroke="#000618" stroke-width="2.241" d="M11.424 22.32h22.124M12.202 22.002l9.679-9.68M12.202 22.671l9.68 9.68"/></g><defs><clipPath id="a"><path fill="#fff" transform="matrix(0 1 1 0 .5 .2)" d="M0 0h43v43H0z"/></clipPath></defs></svg>
                        </div>
                        <div class="swiper-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44" fill="none"><g clip-path="url(#a)"><circle cx="22" cy="21.699" r="21.5" fill="#fff"/><path class="arrow" stroke="#000618" stroke-width="2.241" d="M32.576 22.319H10.451M31.798 22.001l-9.68-9.68M31.798 22.671l-9.679 9.679"/></g><defs><clipPath id="a"><path fill="#fff" transform="rotate(90 21.65 21.85)" d="M0 0h43v43H0z"/></clipPath></defs></svg>
                        </div>
                    </div>
                </div>
                <div class="swiper cards-slider__slider">
                    <div class="swiper-wrapper">
                        <?php foreach ($cards as $key => $card ): ?>
                            <div class="swiper-slide">
                                <div class="cards-slider__item">
                                    <div class="cards-slider__item-content">
                                        <div class="cards-slider__item-title"><p class="h6"><?= $card['title']; ?></p></div>
                                        <?php $link = $card['link']; ?>
                                        <a href="<?= $link['url'] ?>" target="<?= $link['target'] ?>" class="btn blue">
                                            <span class="hover-animation">
                                                <span><?= $link['title'] ?></span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="cards-slider__item-number">(<?= str_pad(($key + 1), 2, "0", STR_PAD_LEFT) ?>)</div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php else : ?>
    <h2 style="font-family: 'Mark', sans-serif;">Слайдер с карточками</h2>
<?php endif; ?>