</main>

<footer id="footer" class="footer">
    <?php
    ?>
    <div class="container">
        <div class="footer-wrapper">
            <div class="privacy-policy-info">
                <p>Pavel Mamul WoodBau, No NIP PL5223202849</p>
                <p>Сайт использует файлы cookie, которые содержат информацию о предыдущих посещениях веб-сайта.
                    <br>Если вы не хотите использовать файлы cookie, измените настройки браузера</p>
            </div>
            <p class="footer-company"> © <?= date("Y"); ?> Attract Company </p>
        </div>
    </div>
    <?php
    include get_template_directory() . '/components/modal-window.php';
    include get_template_directory() . '/components/modal-window-video.php';
    ?>
    <div class="overlay-modal"></div>

</footer>

<?php wp_footer(); ?>
</body>
</html>