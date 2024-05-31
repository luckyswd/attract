<?php
$cards = $args['cards'] ?? [];
?>
<?php if (!empty($cards)) : ?>
  <div class="cards-row">
      <?php foreach ($cards as $key => $card) : ?>
          <div class="cards-row__card">
              <?php $number = !empty($card['number']) ? $card['number'] : '(' . str_pad(($key + 1), 2, "0", STR_PAD_LEFT) . ')'; ?>
              <p class="cards-row__card-number"><?= $number; ?></p>
              <p class="text-3"><?= $card['text'] ?></p>
          </div>
      <?php endforeach; ?>
  </div>
<?php endif; ?>