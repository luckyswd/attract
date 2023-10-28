<?php

/*
Title: Шаги модуль
Mode: preview
*/

?>

<?php
$photos = get_field('employee_photos');
$headline = get_field('headline');
$subheadline = get_field('subheadline');
$caption = get_field('caption');
$cards = get_field('cards');
$displayButton = get_field('display_button');
?>

<?php if (!is_admin()) : ?>
    <section class="steps distance">
        <div class="block-anchor" id="steps"></div>
        <div class="container">
            <div class="steps-wrapper">
                <div class="steps-left">
                    <div class="steps-left-container">
                        <?php if (!empty($photos)) : ?>
                            <div class="steps-left-photos">
                                <?php foreach ($photos as $photo) : ?>
                                    <div class="steps-left-photo">
                                        <img src="<?= $photo['url']; ?>" alt="<?= $photo['alt']; ?>">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($caption)) : ?>
                            <p class="text-1"><?= $caption ?></p>
                        <?php endif; ?>
                        <?php if (!empty($headline)) : ?>
                            <p class="h4"> <?= $headline ?> </p>
                        <?php endif; ?>
                        <?php if (!empty($subheadline)) : ?>
                            <p class="text-2"><?= $subheadline ?></p>
                        <?php endif; ?>
                        <?php if (!empty($displayButton)) : ?>
                            <a href="#contact-form" class="btn blue only-large-laptop"><span class="hover-animation"><span>Оставить заявку</span></span></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="steps-right">
                    <?php if (!empty($cards)) : ?>
                        <?php foreach ($cards as $key => $card) : ?>
                            <?php if (!empty($card)) : ?>
                                <div class="steps-card">
                                    <p class="card-number">(0<?= $key + 1 ?>)</p>
                                    <div class="card-bottom">
                                        <p class="h6"> <?= $card['headline'] ?> </p>
                                        <div class="text-3"> <?= $card['subheadline'] ?> </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if (!empty($displayButton)) : ?>
                        <a href="#contact-form" class="btn blue only-laptop"><span class="hover-animation"><span>Оставить заявку</span></span></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php else : ?>
    <h2 style="font-family: 'Mark', sans-serif;">Шаги модуль</h2>
<?php endif; ?>