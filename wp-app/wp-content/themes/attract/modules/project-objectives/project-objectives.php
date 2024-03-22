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
            <?php if (!empty($tasks)) : ?>
                <div class="project-objectives">
                    <?php foreach ($tasks as $key => $task) : ?>
                        <div class="project-objectives-card">
                            <p class="project-objectives-card-number">(0<?= $key + 1; ?>)</p>
                            <p class="text-3"><?= $task['text'] ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php else : ?>
    <h2 style="font-family: 'Mark', sans-serif;">Задачи проекта модуль</h2>
<?php endif; ?>