<?php

/*
Title: Мифы
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$myths = get_field('myths');
?>

<?php if (!is_admin()) : ?>
    <section class="myths distance" id="myths">
        <?php anchorHelper('myths');?>

        <div class="container">
            <?php if (!empty($headline)) : ?>
                <h2 class="myths__headline">
                    <?= $headline ?>
                </h2>
            <?php endif; ?>

            <?php if (!empty($myths)) : ?>
                <div class="myths__myths">
                    <?php foreach ($myths as $key => $myth) : ?>
                        <div class="myths__myth">
                            <div class="myths__myth-header">
                                <div class="myths__myth-header-wrapper">
                                    <div class="myths__myth-number">
                                        <?= 'Миф №' . $key + 1 ?>
                                    </div>
                                    <?php if (!empty($myth['title'])) : ?>
                                        <div class="myths__myth-title">
                                            <?= $myth['title'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="myths__myth-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="59" viewBox="0 0 60 59" fill="none">
                                        <circle cx="30.0084" cy="29.6275" r="29.2027" fill="#1744D0"/>
                                        <line x1="30.4731" y1="13.749" x2="30.4731" y2="45.5059" stroke="#D9E1FF" stroke-width="5"/>
                                        <line x1="45.8868" y1="29.0869" x2="14.13" y2="29.0869" stroke="#D9E1FF" stroke-width="5"/>
                                    </svg>
                                </div>
                            </div>

                            <div class="myths__myth-body">
                                <?php if (!empty($myth['image'])) : ?>
                                    <div class="myths__myth-image">
                                        <?= getPictureImage($myth['image']) ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($myth['description'])) : ?>
                                    <div class="myths__myth-description">
                                        <?= $myth['description'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Мифы</h2>
<?php endif; ?>