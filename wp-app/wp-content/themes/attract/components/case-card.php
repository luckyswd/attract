<a href="javascript:;" data-fancybox="" data-src="#develop-message" class="case-card <?= $class ?? '' ?>" style="background-image: url(<?= $preview_image['url'] ?? '' ?>)">
    <div class="case-card-top">
        <p class="text-4"><?= $case->post_title ?></p>
        <svg xmlns="http://www.w3.org/2000/svg" width="44" height="43" viewBox="0 0 44 43" fill="none">
            <circle cx="22.1309" cy="21.5" r="21.5" fill="white"/>
            <line x1="30.2566" y1="13.9756" x2="14.6124" y2="29.6198" stroke="#000618" stroke-width="2.24138"/>
            <line y1="-1.12069" x2="13.6887" y2="-1.12069" transform="matrix(-1 1.24876e-07 1.24876e-07 1 29.4821 15.4218)" stroke="#000618" stroke-width="2.24138"/>
            <line x1="29.9555" y1="14.7745" x2="29.9555" y2="28.4632" stroke="#000618" stroke-width="2.24138"/>
        </svg>
    </div>
    <p class="case-card_short-description <?= $h ?>"><?= $shor_description ?? '' ?></p>
    <?php if (!empty($tags)) : ?>
        <div class="case-card__tags">
            <?php foreach ($tags as $tag) : ?>
                <?php if (!empty($tag['name'])) : ?>
                    <div class="case-card__tag text-4"><?= $tag['name'] ?></div>
                <?php endif;?>
            <?php endforeach;?>
        </div>
    <?php endif;?>
</a>