<picture>
    <img loading="lazy" src="<?= $image['url'] ?? '' ?>" alt="<?= $image['title'] ?? '' ?>" <?php if ($width) : ?> width="<?= $width ?>" <?php endif; ?> <?php if ($height) : ?> height="<?= $height ?>" <?php endif; ?>>
    <div class="staff-position__info">
        <p class="staff-position__text"><?= $position; ?></p>
        <p class="h6"><?= $name; ?></p>
        <p class="text-3"><?= $description; ?></p>
    </div>
</picture>