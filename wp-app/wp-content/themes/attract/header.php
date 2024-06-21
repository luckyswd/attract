<!doctype html>
<html lang="ru">

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="facebook-domain-verification" content="7uzstvjd65ff4zqr7dx3011dwt6vrl" />
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l][];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-TTH5VDK6');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i]

            function() {
                (m[i].a = m[i].a[]).push(arguments)
            };
            m[i].l = 1 * new Date();
            for (var j = 0; j < document.scripts.length; j++) {
                if (document.scripts[j].src === r) {
                    return;
                }
            }
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(95119440, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/95119440" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
    <?php if(!is_user_logged_in()): ?>
    <script>
        document.oncontextmenu = function (e) {return false;};
        document.oncopy = function (e) {return false;};
        document.oncut = function (e) {return false;};
        document.onselectstart = function (e) {return false;};
        document.onkeydown = function(e) {
            if(event.keyCode == 123) {
                return false;
            }
            if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
                return false;
            }
            if(e.altKey && e.metaKey && e.keyCode == 'I'.charCodeAt(0)){
                return false;
            }    
            if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
                return false;
            }
            if(e.altKey && e.metaKey && e.keyCode == 'J'.charCodeAt(0)){
                return false;
            }
            if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
                return false;
            }
            if(e.altKey && e.metaKey && e.keyCode == 'U'.charCodeAt(0)){
                return false;
            }
        }
    </script>
    <?php endif; ?>
    <title><?php wp_title('«', true, 'right'); ?> | <?php bloginfo('name'); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_head(); ?>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TTH5VDK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <?php
    $logo = get_field('logo', 'option');
    $buttons = get_field('anchor_buttons', 'option');
    $socials = get_field('socials', 'option');


    ?>
    <header id="header">
        <div class="container">
            <div class="header__wrapper">
                <div class="header__desktop">
                    <a href="/" class="header__logo">
                        <?= getPictureImage($logo, 150, 21) ?>
                    </a>
                    <div class="header__burger">
                        <svg class="burger" xmlns="http://www.w3.org/2000/svg" width="25" height="18" viewBox="0 0 25 18" fill="none">
                            <rect x="24.0002" y="1.38477" width="1.2" height="23" transform="rotate(90 24.0002 1.38477)" fill="#1744D0" />
                            <rect x="24.0002" y="8.38477" width="1.2" height="23" transform="rotate(90 24.0002 8.38477)" fill="#1744D0" />
                            <rect x="24.0002" y="15.3848" width="1.2" height="23" transform="rotate(90 24.0002 15.3848)" fill="#1744D0" />
                        </svg>
                        <svg class="close" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <rect x="16.2637" y="0.884766" width="1.2" height="23" transform="rotate(45 16.2637 0.884766)" fill="#1744D0" />
                            <rect width="1.2" height="23" transform="matrix(-0.707107 0.707107 0.707107 0.707107 1.1123 0.884766)" fill="#1744D0" />
                        </svg>
                    </div>
                    <?php if (!empty($buttons)) : ?>
                        <?php wp_nav_menu(
                                array(
                                    'menu' => 'Mobile menu',
                                    'container_class' => 'header__buttons'
                                )
                            ); ?>
                        <!-- <div class="header__buttons">
                            <?php foreach ($buttons as $button) : ?>
                                <?php if (!empty($button)) : ?>
                                    <a href="<?= $button['button']['url'] ?? '#' ?>" class="header__button">
                                        <?= $button['button']['title'] ?? '' ?>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div> -->
                        <a href="javascript:;" data-fancybox="" data-src="#modal-feedback-form" class="header__call-feedback btn red">
                            <span>Бесплатная оценка</span>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="header__mobile">
                    <?php if (!empty($buttons)) : ?>
                        <div class="header__buttons-mobile">
                            <?php wp_nav_menu(
                                array(
                                    'menu' => 'Mobile menu'
                                )
                            ); ?>
                        </div>
                        <?php if (!empty($socials)) : ?>
                            <div class="socials-wrapper">
                                <a href="https://wa.me/message/7K5K776JDVK6O1" target="_blank" class="social-card" rel="nofollow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="29" height="30" viewBox="0 0 29 30" fill="none">
                                        <path d="M24.822 4.37856C22.1329 1.5618 18.4439 -0.0184305 14.6026 0.000162233H14.5781C6.66714 0.000187633 0.157177 6.68368 0.157177 14.8055C0.157177 14.8436 0.157968 14.8809 0.157968 14.919C0.187766 17.5013 0.838889 20.0359 2.05339 22.2974L0 30L7.65275 27.973C9.76683 29.1646 12.1436 29.7788 14.5552 29.7568C22.4954 29.7122 29.0046 22.9906 28.9998 14.8379C29.0188 10.9209 27.5143 7.15394 24.822 4.37856ZM14.6026 27.2433C12.4648 27.2547 10.3647 26.6659 8.52936 25.5406L8.0555 25.2973L3.49861 26.5135L4.68324 21.8919L4.36735 21.4055C3.19393 19.4603 2.57226 17.2176 2.57223 14.9296C2.57223 8.18205 7.98049 2.62962 14.5528 2.62962C21.1252 2.62962 26.5334 8.18205 26.5334 14.9296C26.5334 19.1782 24.3892 23.1365 20.8732 25.3784C19.0137 26.6013 16.8505 27.2488 14.6421 27.2433M21.584 18.2433L20.7153 17.8379C20.7153 17.8379 19.4517 17.2703 18.6619 16.865C18.583 16.865 18.504 16.7839 18.425 16.7839C18.2303 16.7888 18.04 16.8446 17.8722 16.946C17.704 17.0474 17.7932 17.0271 16.6875 18.3244C16.6125 18.476 16.4585 18.5709 16.2927 18.5676H16.2137C16.095 18.5472 15.9849 18.4908 15.8978 18.4055L15.5029 18.2433C14.6556 17.8751 13.8798 17.3532 13.2126 16.7028C13.0547 16.5406 12.8177 16.3785 12.6598 16.2163C12.0751 15.6413 11.5702 14.9865 11.1593 14.2704L11.0803 14.1082C11.0117 14.0091 10.9584 13.8997 10.9223 13.7839C10.9017 13.6434 10.9296 13.5 11.0013 13.3785C11.0732 13.2569 11.3172 12.9731 11.5541 12.7298C11.7911 12.4866 11.7911 12.3245 11.949 12.1623C12.0302 12.0465 12.0863 11.9143 12.1135 11.7744C12.1408 11.6346 12.1385 11.4904 12.1069 11.3515C11.7389 10.3023 11.3171 9.27387 10.8433 8.27042C10.7164 8.06766 10.5185 7.92258 10.2905 7.86501H9.42177C9.26383 7.86501 9.10589 7.94609 8.94792 7.94609L8.86895 8.02716C8.711 8.10824 8.55306 8.27042 8.39509 8.3515C8.23715 8.43257 8.15818 8.67583 8.00023 8.83798C7.44812 9.55426 7.14264 10.4381 7.13149 11.3515C7.14024 11.9939 7.27451 12.6281 7.52635 13.2163L7.60535 13.4596C8.31448 15.0161 9.30623 16.4195 10.5275 17.5947L10.8433 17.919C11.0732 18.1145 11.2847 18.3316 11.4751 18.5676C13.1115 20.0295 15.0551 21.0836 17.1535 21.6487C17.3904 21.7298 17.7063 21.7298 17.9432 21.8109H18.733C19.1458 21.79 19.5495 21.6794 19.9176 21.4865C20.1111 21.3965 20.2959 21.2879 20.4705 21.1622L20.6284 21.0001C20.7864 20.8379 20.9443 20.7568 21.1023 20.5947C21.2566 20.4535 21.3897 20.2895 21.4971 20.1082C21.6488 19.7449 21.7554 19.3639 21.8131 18.9731V18.4055C21.7421 18.34 21.6623 18.2854 21.5761 18.2433" fill="black" />
                                    </svg>
                                </a>
                                <a href="https://www.instagram.com/attract.company/?igshid=YmMyMTA2M2Y%3D" target="_blank" class="social-card" rel="nofollow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="29" height="30" viewBox="0 0 29 30" fill="none">
                                        <g clip-path="url(#clip0_2169_3595)">
                                            <path d="M19.3326 15C19.3326 12.3307 17.1693 10.1663 14.5 10.1663C11.8307 10.1663 9.66628 12.3307 9.66628 15C9.66628 17.6693 11.8307 19.8337 14.5 19.8337C17.1693 19.8337 19.3326 17.6693 19.3326 15ZM21.9456 15C21.9456 19.1122 18.6122 22.4456 14.5 22.4456C10.3878 22.4456 7.0544 19.1122 7.0544 15C7.0544 10.8878 10.3878 7.5544 14.5 7.5544C18.6122 7.5544 21.9456 10.8878 21.9456 15ZM8.49972 7.25925C8.49972 8.21967 7.72084 8.99972 6.75925 8.99972C5.79883 8.99972 5.01878 8.21967 5.01878 7.25925C5.01878 6.29883 5.79766 5.51995 6.75925 5.51995C7.72084 5.51995 8.49972 6.29883 8.49972 7.25925ZM20.3586 26.8026C21.7723 26.7382 22.5406 26.5028 23.0513 26.3037C23.7282 26.0401 24.2108 25.7263 24.7191 25.2191C25.2263 24.712 25.5413 24.2294 25.8037 23.5524C26.0028 23.0418 26.2382 22.2734 26.3026 20.8597C26.3729 19.3313 26.387 18.8721 26.387 15C26.387 11.1279 26.3717 10.6699 26.3026 9.14027C26.2382 7.72658 26.0016 6.95941 25.8037 6.44758C25.5401 5.7706 25.2263 5.28804 24.7191 4.77973C24.212 4.27258 23.7294 3.95751 23.0513 3.69515C22.5406 3.49604 21.7723 3.26062 20.3586 3.1962C18.8301 3.12593 18.371 3.11187 14.5 3.11187C10.6279 3.11187 10.1699 3.1271 8.64027 3.1962C7.22657 3.26062 6.45941 3.49721 5.94758 3.69515C5.2706 3.95751 4.78804 4.27258 4.27972 4.77973C3.77258 5.28687 3.45868 5.7706 3.19515 6.44758C2.99604 6.95824 2.76062 7.72658 2.6962 9.14027C2.62593 10.6699 2.61187 11.1279 2.61187 15C2.61187 18.871 2.62593 19.3301 2.6962 20.8597C2.76062 22.2734 2.99721 23.0418 3.19515 23.5524C3.45868 24.2294 3.77258 24.712 4.27972 25.2191C4.78687 25.7263 5.2706 26.0401 5.94758 26.3037C6.45824 26.5028 7.22657 26.7382 8.64027 26.8026C10.1687 26.8729 10.6279 26.887 14.5 26.887C18.371 26.887 18.8301 26.8729 20.3586 26.8026ZM20.478 0.587843C22.0217 0.658118 23.0758 0.902908 23.9976 1.26131C24.951 1.63142 25.7592 2.12803 26.5662 2.93385C27.372 3.73966 27.8686 4.54782 28.2387 5.50238C28.5971 6.42415 28.8419 7.47827 28.9122 9.02197C28.9836 10.568 29 11.0623 29 15C29 18.9377 28.9836 19.432 28.9122 20.978C28.8419 22.5217 28.5971 23.5758 28.2387 24.4976C27.8686 25.451 27.3731 26.2603 26.5662 27.0662C25.7603 27.872 24.9522 28.3674 23.9976 28.7387C23.0747 29.0971 22.0217 29.3419 20.478 29.4122C18.9308 29.4824 18.4377 29.5 14.5 29.5C10.5611 29.5 10.068 29.4836 8.52197 29.4122C6.97827 29.3419 5.92415 29.0971 5.00238 28.7387C4.04899 28.3674 3.24083 27.872 2.43385 27.0662C1.62803 26.2603 1.13259 25.451 0.761309 24.4976C0.402908 23.5758 0.156946 22.5217 0.0878429 20.978C0.0175686 19.4308 0.00117302 18.9377 0.00117302 15C0.00117302 11.0623 0.0175686 10.568 0.0878429 9.02197C0.158117 7.47827 0.402908 6.42415 0.761309 5.50238C1.13259 4.54899 1.62803 3.74083 2.43385 2.93385C3.23966 2.12803 4.04899 1.63142 5.00121 1.26131C5.92415 0.902908 6.97827 0.656947 8.5208 0.587843C10.0668 0.517569 10.5611 0.5 14.4988 0.5C18.4377 0.5 18.9308 0.516397 20.478 0.587843Z" fill="black" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_2169_3595">
                                                <rect width="29" height="29" fill="white" transform="matrix(-1 0 0 1 29 0.5)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                                <a href="https://t.me/stat_pvml" target="_blank" class="social-card" rel="nofollow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="29" height="28" viewBox="0 0 29 28" fill="none">
                                        <path d="M28.9513 2.07109L23.6696 24.3462C23.4211 25.3953 22.2715 25.9358 21.3291 25.4376L14.649 21.9089L11.4904 27.1968C10.6309 28.6381 8.45614 28.0129 8.45614 26.3277V20.4357C8.45614 19.9801 8.64246 19.5456 8.96354 19.2276L21.9816 6.5111C21.9712 6.35214 21.8054 6.21448 21.6399 6.33085L6.10563 17.3942L0.886164 14.639C-0.335748 13.9925 -0.283968 12.1803 0.979322 11.6188L26.7148 0.142441C27.9471 -0.408706 29.2724 0.725379 28.9513 2.07109Z" fill="black" />
                                    </svg>
                                </a>
                                <a href="https://www.behance.net/attractcompany" target="_blank" class="social-card" rel="nofollow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="37" height="24" viewBox="0 0 37 24" fill="none">
                                        <path d="M14.9324 10.7826C14.9324 10.7826 18.4339 10.5274 18.4339 6.49732C18.4339 2.46691 15.5692 0.5 11.9406 0.5H0V23.0225H11.9406C11.9406 23.0225 19.2298 23.2485 19.2298 16.3749C19.2298 16.375 19.5476 10.7826 14.9324 10.7826ZM11.0811 4.50312H11.9406C11.9406 4.50312 13.5636 4.50312 13.5636 6.84649C13.5636 9.18957 12.6091 9.52928 11.5264 9.52928H5.26116V4.50312H11.0811ZM11.6031 19.0195H5.26116V13.0007H11.9406C11.9406 13.0007 14.3597 12.9695 14.3597 16.0937C14.3597 18.7281 12.5528 18.9996 11.6031 19.0195ZM28.9513 6.23039C20.1269 6.23039 20.1347 14.8842 20.1347 14.8842C20.1347 14.8842 19.5292 23.4936 28.9513 23.4936C28.9513 23.4936 36.803 23.9339 36.803 17.5045H32.765C32.765 17.5045 32.8997 19.9257 29.086 19.9257C29.086 19.9257 25.0474 20.1914 25.0474 16.0073H36.9377C36.9377 16.0072 38.2387 6.23039 28.9513 6.23039ZM25.003 13.0007C25.003 13.0007 25.4961 9.52921 29.0411 9.52921C32.5853 9.52921 32.5409 13.0007 32.5409 13.0007H25.003ZM33.4816 4.60034H24.0144V1.82686H33.4816V4.60034Z" fill="black" />
                                    </svg>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
    <main id="main" class="main slug-<?= get_queried_object()->post_name ?>" data-page-id="<?= get_queried_object_id() ?>">