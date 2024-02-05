<?php

/*
Title: Кейс результаты ( с двумя картинками ) модуль
Mode: preview
*/

$headline = get_field('headline');
$all_cases_info = get_field('work_results');
$bottom_info = get_field('bottom_info');

?>
<section class="cases-results distance">
    <div class="container">
        <p class="h2"><?= $headline; ?></p>
        <div class="cases-info__wrap">

            <?php foreach ($all_cases_info as $case_info) : ?>
                <div class="cases-info__card">

                    <div class="info-gallery__wrap">
                        <?php if ($case_info["gallery"][0]) : ?>
                            <img src="<?= $case_info["gallery"][0]; ?>" />
                        <?php endif; ?>
                        <?php if ($case_info["gallery"][1]) : ?>
                            <img src="<?= $case_info["gallery"][1]; ?>" />
                        <?php endif; ?>
                    </div>
                    <span class="info-spitter"></span>
                    <div class="info-data__wrap">
                        <?php foreach ($case_info["desc_results"] as $case_desc) : ?>
                            <div class="info-data__desc">
                                <p class="case-desc__title"><?= $case_desc["headline"]; ?></p>
                                <p class="case-desc__info"><?= $case_desc["description"]; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="cases-bottom__info">
                <?php foreach ($bottom_info as $bottom_info_item) : ?>
                    <span class="bottom-splitter"></span>
                    <div class="botton-info__card">
                        <p class="info-card__title">
                            <?= $bottom_info_item["headline"]; ?>
                        </p>
                        <p class="info-card__description">
                            <?= $bottom_info_item["description"]; ?>
                        </p>
                    </div>
                    <span class="bottom-splitter"></span>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>