<?php

/*
Title: Политика конфиденциальности
Mode: preview
*/

?>

<?php
$title = get_field('title');
$text = get_field('text');
?>

<?php if (!is_admin()) : ?>
    <section class="privacy-policy">
        <div class="container">
            <div class="privacy-policy-wrap">
                <h1><?= $title ?? '' ?></h1>
                <?= $text ?? '' ?>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Политика конфиденциальности модуль</h2>
<?php endif; ?>