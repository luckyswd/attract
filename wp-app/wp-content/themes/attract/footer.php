</main>

<?php
$socials = get_field('socials', 'option');
$footer_main_menu = get_field('footer_main_menu', 'option');
$footer_service_menu = get_field('footer_service_menu', 'option');
$sale_email = get_field('sale_email', 'option');
$requisites = get_field('requisites', 'option');
$logo = get_field('footer_logo', 'option');
$footer_form = get_field('footer_form', 'option');
?>
<footer id="footer" class="footer">
    <div class="container">
        <div class="footer-wrapper">
            <div class="top-wrap">
                <div class="left">
                    <div class="main-menu-wrap">
                        <?php if (!empty($footer_main_menu)) : ?>
                            <?php foreach ($footer_main_menu as $main_menu) : ?>
                                <a href="<?= get_permalink($main_menu->ID) ?>" class="menu-page"><?= $main_menu->post_title ?></a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="info-wrap">
                        <p class="top-wrap__requisites requisites"><?= $requisites ?? '' ?></p>
                        <div class="wrap__socials">
                            <?php if (!empty($socials)) : ?>
                                <?php foreach ($socials as $social) : ?>
                                    <?php if (!empty($social['icon'])) : ?>
                                        <a href="<?= $social['link'] ?? '' ?>" class="bottom-wrap__social">
                                            <?= getPictureImage($social['icon'], 29, 29) ?>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <?php if (!empty($footer_service_menu)) : ?>
                        <?php foreach ($footer_service_menu as $key => $service_menu) : ?>
                            <div class="category-wrap">
                                <div class="service_category">
                                    <p><?= $service_menu['category']->name ?></p>
                                </div>

                                <div class="services-wrap">
                                    <?php if (!empty($service_menu['services'])) : ?>
                                        <?php foreach ($service_menu['services'] as $service) : ?>
                                            <a href="<?= get_permalink($service->ID) ?>" class="service-page"><?= $service->post_title ?></a>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>

                                <?php if (count($footer_service_menu) === $key + 1) : ?>
                                    <div class="info-requisites">
                                        <p class="top-wrap__requisites requisites"><?= $requisites ?? '' ?></p>
                                        <a class="bottom-wrap__sale-email" href="mailto:<?= $sale_email ?>" target="_blank"><?= $sale_email ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="bottom-wrap">
                <a href="/" class="bottom-wrap__logo">
                    <?= getPictureImage($logo, 167, 23) ?>
                </a>
                <div class="bottom-wrap-right">
                    <div class="wrap__socials">
                        <?php if (!empty($socials)) : ?>
                            <?php foreach ($socials as $social) : ?>
                                <?php if (!empty($social['icon'])) : ?>
                                    <a href="<?= $social['link'] ?? '' ?>" class="bottom-wrap__social">
                                        <?= getPictureImage($social['icon'], 29, 29) ?>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <p class="bottom-wrap__requisites requisites"><?= $requisites ?? '' ?></p>
                    <a class="bottom-wrap__sale-email" href="mailto:<?= $sale_email ?>" target="_blank"><?= $sale_email ?></a>
                    <div class="bottom-wrap__requires">
                        <a class="bottom-wrap__policy" href="/pravovye-dokumenty/" target="_blank">Правовые документы</a>
                        <a class="bottom-wrap__policy" href="/privacy-policy/" target="_blank">Политика конфиденциальности</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-form" id="develop-message">
        <div class="form-wrapper">
            <p class="form-headline text-1">Эта часть сайта находится в разработке, попробуйте позже</p>
        </div>
    </div>
    <div class="modal-form" id="modal-feedback-form">
        <div class="form-wrapper">
            <div class="contact-form">
                <div class="form-right modal-mode">
                    <p class="h6">ОСТАВЬТЕ ЗАЯВКУ <br>
                        И мы перезвоним Вам!</p>
                    <?= $footer_form ?>
                </div>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript" id="thm-js-extra">
    /* <![CDATA[ */
    var myajax = {
        "url": "<?= esc_attr(admin_url('admin-ajax.php')) ?>",
        "nonce": "<?= wp_create_nonce('myajax-nonce') ?>"
    };
    /* ]]> */
</script>
<?php wp_footer(); ?>
<script type="application/javascript">
    function getYClientID() {
        var match = document.cookie.match('(?:^|;)\\s*_ym_uid=([^;]*)');
        return (match) ? decodeURIComponent(match[1]) : false;
    }

    function getGoogleClientID() {
        var match = document.cookie.match('(?:^|;)\\s*_ga=([^;]*)');
        var raw = (match) ? decodeURIComponent(match[1]) : null;
        if (raw) {
            match = raw.match(/(\d+\.\d+)$/);
        }
        var gacid = (match) ? match[1] : null;
        if (gacid) {
            return gacid;
        }
    }

    window.onload = function() {
        const yCids = document.getElementsByClassName('yAnalytic');
        const yandexCid = getYClientID();

        const gCids = document.getElementsByClassName('gAnalytic');
        const googleCid = getGoogleClientID();

        for (let i = 0; i < yCids.length; i++) {
            yCids[i].value = yandexCid;
        }

        for (let i = 0; i < gCids.length; i++) {
            gCids[i].value = googleCid;
        }
    };
</script>
</body>

</html>