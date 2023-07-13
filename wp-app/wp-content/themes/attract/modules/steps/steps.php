<?php

/*
Title: Шаги модуль
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$subheadline = get_field('subheadline');
$cards = get_field('cards');
?>

<?php if (!is_admin()) : ?>
    <section class="steps distance">
        <div class="container">
            <div class="steps-wrapper">
                <div class="steps-left">
                    <div class="steps-left-container">
                        <p class="h4"> <?= $headline ?? '' ?> </p>
                        <p class="text-2"><?= $subheadline ?? '' ?></p>
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
                                        <p class="text-4"> <?= $card['subheadline'] ?> </p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Шаги модуль</h2>
<?php endif; ?>