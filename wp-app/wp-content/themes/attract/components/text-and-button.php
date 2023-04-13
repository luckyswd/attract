<div class="text-and-button">
    <p class="text-and-button__information">
        <?= $text ?? '' ?>
    </p>

    <?php if (!empty($button)) : ?>
        <a href="<?= $button['url'] ?>" class="text-and-button_btn btn">
            <?= $button['title'] ?? '' ?>
        </a>
    <?php endif; ?>
</div>