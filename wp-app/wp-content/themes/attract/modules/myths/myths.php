<?php

/*
Title: Мифы модуль
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$questions = get_field('questions');
?>

<?php if (!is_admin()) : ?>
    <section class="myths distance">
        <div class="block-anchor" id="myths"></div>
        <div class="container">
            <div class="myths-wrapper">
                <div class="sticky-wrap">
                    <p class="h5"><?= $headline ?? '' ?></p>
                </div>
                <?php if (!empty($questions)) : ?>
                    <div class="myths-questions">
                        <?php foreach ($questions as $key => $question) : ?>
                            <?php if (!empty($question)) : ?>
                                <div class="myths-question">
                                    <div class="myths-question-top">
                                        <p class="h6"> <?= $question['question'] ?> </p>
                                        <svg class="minus" xmlns="http://www.w3.org/2000/svg" width="20" height="2" viewBox="0 0 20 2" fill="none">
                                            <rect x="20" width="1.2" height="20" transform="rotate(90 20 0)" fill="#1744D0"/>
                                        </svg>
                                        <svg class="plus" xmlns="http://www.w3.org/2000/svg" width="20" height="2" viewBox="0 0 20 2" fill="none">
                                            <rect x="20" width="1.2" height="20" transform="rotate(90 20 0)" fill="#1744D0"/>
                                        </svg>
                                    </div>
                                    <div class="text-4"> <?= $question['answer'] ?? '' ?> </div>
                                    <span class="line"></span>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Мифы модуль</h2>
<?php endif; ?>