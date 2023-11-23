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

            <div class="bottom-wrap">
                <div class="bottom-wrap__logo">
                    <?= getPictureImage($logo, 167, 23) ?>
                </div>
                <div class="bottom-wrap__socials">
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
                <p class="bottom-wrap__requisites"><?= $requisites ?? '' ?></p>
                <a class="bottom-wrap__sale-email" href="mailto:<?= $sale_email ?>" target="_blank"><?= $sale_email ?></a>
                <a class="bottom-wrap__policy" href="/" target="_blank">Политика конфиденциальности</a>
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
                    <?= $footer_form ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>