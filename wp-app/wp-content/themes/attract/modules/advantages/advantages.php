<?php

/*
Title: Преимущества модуль
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$advantages_cards = get_field('advantages_cards');
?>

<?php if (!is_admin()) : ?>
    <section class="advantages distance">
        <div class="container">
            <div class="advantages-wrapper">
                <?php if(!empty($headline)): ?>  
                    <h2 class="h3"><?= $headline ?></h2>
                <?php endif; ?>
                <?php if (!empty($advantages_cards)) : ?>
                    <div class="advantages-cards">
                        <?php foreach ($advantages_cards as $card) : ?>
                            <?php if (!empty($card)) : ?>
                                <div class="advantages-card"
                                        style="background-image: url(<?= $card['background_image']['url'] ?? '' ?>)">
                                    <p class="h5"> <?= $card['headline'] ?? '' ?> </p>
                                    <p class="text-2"> <?= $card['subheadline'] ?? '' ?> </p>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Преимущества модуль</h2>
<?php endif; ?>