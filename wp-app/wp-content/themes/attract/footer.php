</main>

<?php
$socials = get_field('socials', 'option');
$image = get_field('footer_image', 'option');
$logo = get_field('logo', 'option');
$footer_form = get_field('footer_form', 'option');
?>
<footer id="footer" class="footer">
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

    <div class="container">
        <div class="footer-wrapper">
            <?php if (!empty($socials)) : ?>
                <div class="socials-wrapper">
                    <?php foreach ($socials as $social) : ?>
                    <a href="<?= $social['link'] ?>" target="_blank" class="social-card">
                        <div class="social-card-top">
                            <?= getPictureImage($social['icon'], 47, 47) ?>
                            <svg class="card-top-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="48px" height="48px" viewBox="0 0 48 48" version="1.1">
                                <g id="surface1">
                                    <path style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,100%,100%);fill-opacity:1;" d="M 48 24 C 48 37.253906 37.253906 48 24 48 C 10.746094 48 0 37.253906 0 24 C 0 10.746094 10.746094 0 24 0 C 37.253906 0 48 10.746094 48 24 Z M 48 24 "/>
                                    <path style="fill:none;stroke-width:2.24138;stroke-linecap:butt;stroke-linejoin:miter;stroke:rgb(0%,2.352941%,9.411765%);stroke-opacity:1;stroke-miterlimit:4;" d="M 29.625488 13.9764 L 13.979899 29.61849 " transform="matrix(1.116279,0,0,1.116279,0,0)"/>
                                    <path style="fill:none;stroke-width:2.24138;stroke-linecap:butt;stroke-linejoin:miter;stroke:rgb(0%,2.352941%,9.411765%);stroke-opacity:1;stroke-miterlimit:4;" d="M -0.000832301 -1.119961 L 13.688621 -1.119963 " transform="matrix(-1.116279,0.000000139396,0.000000139396,1.116279,32.206102,17.215033)"/>
                                    <path style="fill:none;stroke-width:2.24138;stroke-linecap:butt;stroke-linejoin:miter;stroke:rgb(0%,2.352941%,9.411765%);stroke-opacity:1;stroke-miterlimit:4;" d="M 29.324544 14.774251 L 29.324544 28.463704 " transform="matrix(1.116279,0,0,1.116279,0,0)"/>
                                </g>
                            </svg>
                        </div>
                        <p class="h5"> <?= $social['name'] ?> </p>
                        <p class="text-4"> <?= $social['description'] ?> </p>
                    </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="footer-bottom">
                <a href="/" class="header__logo">
                    <?= getPictureImage($logo, 150, 21) ?>
                </a>
                <div class="footer-image">
                    <?= getPictureImage($image, 462, 235) ?>
                </div>
                <p class="copy-right">© <?= date('Y')?> Attract Company</p>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>