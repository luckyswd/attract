<picture>
    <img itemprop="image"
         src="<?= esc_url(($image ?? [])['url'] ?? '') ?>"
         alt="<?= esc_attr(($image ?? [])['title'] ?? ($image ?? [])['alt'] ?? '') ?>"
         loading="<?= !empty($fetchpriority_high) ? 'eager' : 'lazy' ?>"
         decoding="async"
        <?php if (!empty($fetchpriority_high)) : ?>
            fetchpriority="high"
        <?php endif; ?>
        <?php if ($width) : ?>
            width="<?= (int) $width ?>"
        <?php endif; ?>
        <?php if ($height) : ?>
            height="<?= (int) $height ?>"
        <?php endif; ?>
    >
</picture>