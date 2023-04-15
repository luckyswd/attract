<?php

/*
Title: Почему мы?
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$photos = get_field('photos');
$description = get_field('description');
$cards = get_field('cards');
$info_card = get_field('info_card');
?>

<?php if (!is_admin()) : ?>
    <section class="why-us distance">
        <?php anchorHelper('why-us');?>
        <div class="container">
            <div class="why-us__header">
                <?php if (!empty($headline)) : ?>
                    <h2 class="why-us__headline">
                        <?= $headline ?>
                    </h2>
                <?php endif; ?>

                <?php if (!empty($photos)) : ?>
                    <div class="why-us__photos-desktop">
                        <?php foreach ($photos as $photo) : ?>
                            <div class="why-us__photo">
                                <?= getPictureImage($photo['photo'], 115, 116) ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (!empty($description)) : ?>
                <p class="why-us__description subtitle-main">
                    <?= $description ?>
                </p>
            <?php endif; ?>

            <?php if (!empty($photos)) : ?>
                <div class="why-us__photos-mobile">
                    <?php foreach ($photos as $photo) : ?>
                        <div class="why-us__photo">
                            <?= getPictureImage($photo['photo'], 115, 116) ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($cards)) : ?>
                <div class="why-us__cards">
                    <?php foreach ($cards as $key => $card) : ?>
                        <div class="why-us__card">
                            <div class="why-us__card-number">
                                <?= $key + 1 ?>
                            </div>
                            <?php if (!empty($card['description'])) : ?>
                                <p class="why-us__card-description">
                                    <?= $card['description'] ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>

                    <?php if (!empty($info_card)) : ?>
                        <div class="why-us__info-card">
                            <?php if (!empty($info_card['title'])) : ?>
                                <p class="why-us__info-card-title subtitle-main">
                                    <?= $info_card['title'] ?>
                                </p>
                            <?php endif; ?>

                            <?php if (!empty($info_card['description'])) : ?>
                                <p class="why-us__info-card-description">
                                    <?= $info_card['description'] ?>
                                </p>
                            <?php endif; ?>

                            <?php if (!empty($info_card['button'])) : ?>
                                <a href="<?= $info_card['button']['url'] ?? '#' ?>" class="why-us__info-card-button btn">
                                    <?= $info_card['button']['title'] ?? '' ?>
                                </a>
                            <?php endif; ?>

                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Почему мы?</h2>
<?php endif; ?>