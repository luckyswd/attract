<?php

/*
Title: Отзывы модуль
Mode: preview
*/

?>

<?php
$reviews = get_field('reviews');
$headline = get_field('headline');
?>

<?php if (!is_admin()) : ?>
    <?php if (!empty($reviews)) : ?>
        <section class="review distance">
            <div class="block-anchor" id="review"></div>
            <div class="container">
                <div class="review-sides">
                    <div class="review-sides__left">
                        <p class="h3 review-headline"><?= $headline ?? '' ?></p>
                        <div class="button-wrap">
                            <div class="swiper-prev">
                                <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44" fill="none">
                                    <g clip-path="url(#clip0_906_641)">
                                        <circle cx="21.5" cy="21.5" r="21.5" transform="matrix(-1 -1.56454e-09 -1.56454e-09 1 43.5 0.199219)" fill="white" />
                                        <line y1="-1.12069" x2="22.1243" y2="-1.12069" transform="matrix(1 2.02912e-08 2.02912e-08 -1 11.4242 21.1982)" stroke="#000618" stroke-width="2.24138" />
                                        <line x1="12.2021" y1="22.0015" x2="21.8814" y2="12.3221" stroke="#000618" stroke-width="2.24138" />
                                        <line y1="-1.12069" x2="13.6887" y2="-1.12069" transform="matrix(0.707107 0.707107 0.707107 -0.707107 12.9944 21.8784)" stroke="#000618" stroke-width="2.24138" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_906_641">
                                            <rect width="43" height="43" fill="white" transform="matrix(4.21468e-08 1 1 -4.21468e-08 0.5 0.199219)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="swiper-next">
                                <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44" fill="none">
                                    <g clip-path="url(#clip0_906_620)">
                                        <circle cx="22" cy="21.6992" r="21.5" fill="white" />
                                        <line class="arrow" x1="32.5758" y1="22.3189" x2="10.4515" y2="22.3189" stroke="#000618" stroke-width="2.24138" />
                                        <line class="arrow" y1="-1.12069" x2="13.6887" y2="-1.12069" transform="matrix(-0.707107 -0.707107 -0.707107 0.707107 31.0055 22.7939)" stroke="#000618" stroke-width="2.24138" />
                                        <line class="arrow" x1="31.7981" y1="22.6709" x2="22.1187" y2="32.3502" stroke="#000618" stroke-width="2.24138" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_906_620">
                                            <rect width="43" height="43" fill="white" transform="translate(43.5 0.199219) rotate(90)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                        </div>
                        <div class="review-sides__left-slider swiper">
                            <div class="swiper-wrapper">
                                <?php foreach ($reviews as $review) : ?>
                                    <?php
                                    $description = get_field('description', $review);
                                    $author_review = get_field('author_review', $review);
                                    $title = get_field('short_description', $review);
                                    ?>
                                    <div class="swiper-slide">
                                        <!-- <div class="nav-wrap">
                                            <div class="pagination mobile"></div>
                                        </div> -->
                                        <p class="h5"> <?= $description ?? '' ?> </p>
                                        <p class="author_review"><?= $author_review ?? '' ?></p>
                                        <p class="title"> <?= $title ?? '' ?> </p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="review-sides__right">
                        <div class="swiper review-sides__right-slider">
                            <div class="swiper-wrapper">
                                <?php foreach ($reviews as $review) : ?>
                                    <?php
                                    $preview_image = get_field('preview_image', $review);
                                    $video = get_field('video', $review);
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="video__container">
                                            <?php $link = get_field('video_link', $review); ?>
                                            <?php if(!empty($link['url'])): ?>
                                                <a href="<?= $link['url'] ?? '' ?>" target="<?= $link['target'] ?? '' ?>" class="video__poster">
                                                    <svg class="video__play-icon" xmlns="http://www.w3.org/2000/svg" width="89" height="89" viewBox="0 0 89 89" fill="none">
                                                        <circle cx="44.4447" cy="44.5442" r="43.9446" transform="rotate(180 44.4447 44.5442)" fill="white" />
                                                        <path d="M62.1591 44.0433L35.7337 59.2999L35.7337 28.7866L62.1591 44.0433Z" fill="#1744D0" />
                                                    </svg>
                                                    <?= getPictureImage($preview_image, 562, 630) ?>
                                                </a>
                                            <?php else: ?>
                                                <div class="video__poster">
                                                    <svg class="video__play-icon" xmlns="http://www.w3.org/2000/svg" width="89" height="89" viewBox="0 0 89 89" fill="none">
                                                        <circle cx="44.4447" cy="44.5442" r="43.9446" transform="rotate(180 44.4447 44.5442)" fill="white" />
                                                        <path d="M62.1591 44.0433L35.7337 59.2999L35.7337 28.7866L62.1591 44.0433Z" fill="#1744D0" />
                                                    </svg>
                                                    <?= getPictureImage($preview_image, 562, 630) ?>
                                                </div>
                                            <?php endif; ?>
        
                                            <video data-src="<?= $video['url'] ?>" playsinline>
                                                Ваш браузер не поддерживает видео.
                                            </video>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pagination desktop"></div>
            </div>
        </section>
    <?php endif; ?>
<?php else : ?>
    <h2 style="font-family: 'Mark', sans-serif;">Отзывы модуль</h2>
<?php endif; ?>