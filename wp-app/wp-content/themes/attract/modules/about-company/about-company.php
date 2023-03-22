<?php

/*
Title: О компании
Mode: preview
*/

?>

<?php
$test = get_field('test');
?>

<?php if (!is_admin()) : ?>
    <section class="about-company">
        <div class="container">
            testqzz
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">О компании модуль</h2>
<?php endif; ?>