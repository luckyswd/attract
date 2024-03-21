<?php

/*
Title: Услуги блок с видeo
Mode: preview
*/

?>

<?php
$section_title = get_field('section-title');
$videos_row_1 = get_field('videos-row-1');
$videos_row_2 = get_field('videos-row-2');
$is_2_row_hide = !empty($videos_row_1) && count($videos_row_1);
?>

<?php if (!is_admin()) : ?>
    <section class="services-videos distance">
        <div class="container">
            <div class="services-videos__header">
                <h2 class="h3"><?= $section_title ?? '' ?></h2>
            </div>
            <div class="services-videos__content">
                <?php if(!empty($videos_row_1) && count($videos_row_1)): ?>
                <div class="services-videos__row services-videos__row_1">
                    <div class="swiper services-videos__row_1-swiper">
                        <div class="swiper-wrapper">
                            <?php foreach($videos_row_1 as $video): ?>
                                <div class="swiper-slide">
                                    <div class="services-videos__item">
                                        <?php //var_dump(current($video['poster'])); ?>
                                        <video src="<?= current($video['video']) ?? '' ?>" preload="none" controls playsinline></video>
                                        <div class="services-videos__item-poster">
                                            <img src="<?= current($video['poster'])['sizes']['medium_large'] ?? '' ?>" alt="" lazyload>
                                            <button class="play-video"><svg width="72" height="72" viewBox="0 0 72 72" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="36" cy="36" r="36" transform="rotate(180 36 36)" fill="white"/><path d="M50.5117 35.5893L28.8638 48.0877L28.8638 23.0908L50.5117 35.5893Z" fill="#1744D0"/></svg></button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if(!empty($videos_row_2) && count($videos_row_2)): ?>
                    <div class="services-videos__row services-videos__row_2 <?= $is_2_row_hide ? 'hide' : ''; ?>">
                        <div class="swiper services-videos__row_2-swiper">
                            <div class="swiper-wrapper">
                                <?php foreach($videos_row_2 as $video): ?>
                                    <div class="swiper-slide">
                                        <div class="services-videos__item">
                                            <?php //var_dump(current($video['poster'])); ?>
                                            <video src="<?= current($video['video']) ?? '' ?>" preload="none" controls playsinline></video>
                                            <div class="services-videos__item-poster">
                                                <img src="<?= current($video['poster'])['sizes']['medium_large'] ?? '' ?>" alt="" lazyload>
                                                <button class="play-video"><svg width="72" height="72" viewBox="0 0 72 72" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="36" cy="36" r="36" transform="rotate(180 36 36)" fill="white"/><path d="M50.5117 35.5893L28.8638 48.0877L28.8638 23.0908L50.5117 35.5893Z" fill="#1744D0"/></svg></button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <?php if($is_2_row_hide): ?>
                    <div class="services-videos__load-more">
                        <button class="btn white load-more-btn"><span class="default-text">Загрузить еще</span><span class="active-text">Скрыть</span></button>
                    </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Услуги блок с видeo</h2>
<?php endif; ?>