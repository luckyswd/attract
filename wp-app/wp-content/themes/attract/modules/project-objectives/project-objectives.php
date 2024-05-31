<?php

/*
Title: Задачи проекта модуль
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$tasks = get_field('tasks');
?>


<?php if (!is_admin()) : ?>
    <section class="project-objectives distance">
        <div class="container">
            <?php if(!empty($headline)): ?>  
                <h2 class="h4"><?= $headline ?></h2>
            <?php endif; ?>
            <?php get_template_part('components/cards-row', '', array('cards' => $tasks)) ?>
        </div>
    </section>
<?php else : ?>
    <h2 style="font-family: 'Mark', sans-serif;">Задачи проекта модуль</h2>
<?php endif; ?>