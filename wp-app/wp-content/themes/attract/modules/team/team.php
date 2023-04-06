<?php

/*
Title: Команда модуль
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$blocks = get_field('blocks');

$col1 = array_slice($blocks, 0, 2);
$col2 = array_slice($blocks, 2, 3);
$col3 = array_slice($blocks, 5, 3);
$col4 = array_slice($blocks, 8, 2);

?>

<?php if (!is_admin()) : ?>
    <section class="team distance">
        <div class="container">
            <h2 class="steps__headline">
                <?= $headline ?? '' ?>
            </h2>
            <?php if (!empty($blocks)) : ?>
                <div class="team-wrapper-desktop">
                    <div class="team-col-1 col">
                        <?php foreach ($col1 as $item) : ?>
                            <div class="team-item">
                                <p class="name"><?= $item['name'] ?? '' ?></p>
                                <p class="position"><?= $item['job_title'] ?? '' ?></p>
                                <?= getPictureImage($item['image']) ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="team-col-2 col">
                        <?php foreach ($col2 as $item) : ?>
                            <div class="team-item">
                                <p class="name"><?= $item['name'] ?? '' ?></p>
                                <p class="position"><?= $item['job_title'] ?? '' ?></p>
                                <?= getPictureImage($item['image']) ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="team-col-3 col">
                        <?php foreach ($col3 as $item) : ?>
                            <div class="team-item">
                                <p class="name"><?= $item['name'] ?? '' ?></p>
                                <p class="position"><?= $item['job_title'] ?? '' ?></p>
                                <?= getPictureImage($item['image']) ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="team-col-4 col">
                        <?php foreach ($col4 as $item) : ?>
                            <div class="team-item">
                                <p class="name"><?= $item['name'] ?? '' ?></p>
                                <p class="position"><?= $item['job_title'] ?? '' ?></p>
                                <?= getPictureImage($item['image']) ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="team-wrapper-mobile">
                    <?php foreach ($blocks as $item) : ?>
                        <div class="team-item">
                            <p class="name"><?= $item['name'] ?? '' ?></p>
                            <p class="position"><?= $item['job_title'] ?? '' ?></p>
                            <?= getPictureImage($item['image']) ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Команда модуль</h2>
<?php endif; ?>