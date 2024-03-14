<?php

/*
Title: Контакты
Mode: preview
*/

?>

<?php
$title = get_field('title');
$contacts = get_field('contacts');
?>

<?php if (!is_admin()) : ?>
    <section class="contacts distance">
        <div class="container">
            <h1 class="contacts__title h3"><?= $title ?></h1>
            <div class="contacts__cards">
                <?php foreach($contacts as $contact): ?>
                    <div class="contacts__card">
                        <div class="contacts__card-caption text-4"><?= $contact['caption'] ?></div>
                        <div class="contacts__card-text h6"><?= $contact['text'] ?></div>
                    </div>
                <?php endforeach; ?>
                <?php $socials = get_field('socials', 'option'); ?>
                <?php if (!empty($socials)) : ?>
                <div class="contacts__card">
                    <div class="contacts__card-caption text-4">Социальные сети</div>
                    <div class="contacts__card-text h6">
                        <div class="socials-btns">
                            <?php foreach ($socials as $social) : ?>
                                <?php if (!empty($social['icon'])) : ?>
                                    <a href="<?= $social['link'] ?? '' ?>" class="socials-btns__link">
                                        <?= getPictureImage($social['icon'], 29, 29) ?>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <img src="/wp-content/themes/attract/modules/contacts/section-bubble.png" alt="section bubble" class="contacts__bubble">
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Контакты</h2>
<?php endif; ?>