<?php

/*
Title: Клиенты на карте
Mode: preview
*/

?>

<?php
$title = get_field('title');
$countries = get_field('countries');
?>

<?php if (!is_admin()) : ?>
    <section class="clients-on-map distance">
        <div class="container">
            <?php if (!empty($title)) : ?>
                <div class="section__header">
                    <h2 class="h3 section__title"><?= $title ?></h3>
                </div>
            <?php endif; ?>
            <div class="clients-on-map__content">
                <div class="clients-on-map__captions">
                    <ul class="h6">
                        <?php foreach ($countries as $country) : ?>
                            <li><?= $country['caption'] ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="clients-on-map__map">
                    <div class="map-isolate-wrapper">
                        <div class="map-isolate">
                            <img class="map-isolate__map" src="/wp-content/themes/attract/modules/clients-on-map/map.svg" alt="">
                            <div class="map-isolate__points">
                                <?php foreach ($countries as $country) : ?>
                                    <?php 
                                        extract($country['position']);
                                        $style = "top:$top; left:$left; bottom:$bottom; right:$right;" 
                                    ?>
                                    <span class="map-isolate__point" style="<?= $style ?>"></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php else : ?>
    <h2 style="font-family: 'Mark', sans-serif;">Клиенты на карте</h2>
<?php endif; ?>