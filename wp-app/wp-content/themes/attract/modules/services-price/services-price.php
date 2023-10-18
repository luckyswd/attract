<?php

/*
Title: Стоимость услуг модуль
Mode: preview
*/

?>

<?php
$textLeft = get_field('text_left');
$price = get_field('price');
$textRight = get_field('text_right');
$services = get_field('services');
$background_image_desktop = get_field('background_image_desktop');
$background_image_tablet = get_field('background_image_tablet');
$background_image_mobile = get_field('background_image_mobile');
?>

<?php if (!is_admin()) : ?>
    <section class="services-price distance">
        <div class="container">
            <div class="services-price-wrap">
                <picture>
                    <source media="(min-width: 1024px)" srcset="<?= $background_image_desktop ?>">
                    <source media="(min-width: 768px)" srcset="<?= $background_image_tablet ?>">
                    <img src="<?= $background_image_mobile ?>" alt="фон">
                </picture>
                <div class="services-price-content">
                    <div class="services-price-left">
                        <p class="text-1"><?= $textLeft ?? '' ?></p>
                        <div class="text-1 price">
                            от <span><?= $price ?? '' ?>$</span>
                        </div>
                        <a class="btn blue" href="#contact-form">
                            <span class="hover-animation">
                                <span>Оставить заявку</span>
                            </span>
                        </a>
                    </div>
                    <div class="services-price-right">
                        <p class="text-1"><?= $textRight ?? '' ?></p>
                        <?php if (!empty($services)) : ?>
                            <div class="services-price-items">
                                <?php foreach ($services as $service) :
                                    $name = $service->post_title;
                                    $link = get_permalink($service->ID);
                                ?>
                                    <a href="<?= $link ?>" class="services-price-item"><?= $name ?></a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <a class="btn white transparent" href="#contact-form">
                            <span>Оставить заявку</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
<?php else : ?>
    <h2 style="font-family: 'Mark', sans-serif;">Стоимость услуг модуль</h2>
<?php endif; ?>