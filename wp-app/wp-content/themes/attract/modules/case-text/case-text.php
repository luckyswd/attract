<?php

/*
Title: Кейс текст модуль
Mode: preview
*/

?>

<?php
$columns = get_field('columns');
?>

<?php if (!is_admin()) : ?>
    <?php if (!empty($columns)) : ?>
        <section class="case-text distance">
            <div class="container">
                <div class="case-text-wrap">
                    <?php foreach ($columns as $column) : ?>
                        <div class="case-text-column">
                            <p class="text-1"> <?= $column['caption'] ?? '' ?> </p>
                            <?php if (!empty($column['headline'])) : ?>
                                <p class="h5"><?= $column['headline'] ?></p>
                            <?php endif;?>
                            <p class="text-2"><?= $column['sub_headline'] ?? '' ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Кейс текст модуль</h2>
<?php endif; ?>