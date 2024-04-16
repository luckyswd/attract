<?php

/*
Title: Кто нас выбирает
Mode: preview
*/

$clients = get_field('clients');

?>

<?php if (!is_admin()) : ?>
    <?php if (!empty($clients)) : ?>
        <section class="clients-grid-section distance">
            <div class="container">
                <div class="clients-grid" data-grid>
                    <?php foreach ($clients as $key => $client ): ?>
                        <div class="clients-grid__item <?= $key === 0 ? 'active' : '' ?>" data-grid-card>
                            <figure class="clients-grid__item-logo"><img src="<?= $client['logo'] ?>" alt="<?= $client['name'] ?>"></figure>
                            <button class="clients-grid__item-modal-activate" data-grid-card-modal-activate></button>
                            <div class="clients-grid__item-modal">
                                <button class="clients-grid__item-modal-close" data-grid-card-modal-close></button>
                                <figure class="clients-grid__item-modal-logo"><img src="<?= $client['logo'] ?>" alt="<?= $client['name'] ?>"></figure>
                                <div class="clients-grid__item-modal-content">
                                    <div class="clients-grid__item-modal-name h6"><?= $client['name'] ?></div>
                                    <div class="clients-grid__item-modal-desc text-2"><p><?= $client['description'] ?></p></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php else : ?>
    <h2 style="font-family: 'Mark', sans-serif;">Кто нас выбирает модуль</h2>
<?php endif; ?>