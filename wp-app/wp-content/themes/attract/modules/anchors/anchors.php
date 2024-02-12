<?php

/*
Title: Ссылки на якоря модуль
Mode: preview
*/

$title = get_field("title");
$anchors = get_field("anchors");
?>

<?php if (!is_admin()) : ?>
    <section class="anchor-links distance">
        <div class="anchor-links__title"><p class="h5"><?= $title ?></p></div>
        <?php if (!empty($anchors) && !!count($anchors)) : ?>
            <ul class="anchor-links__list">
                <?php foreach($anchors as $link): ?>
                    <?php $link = $link['link']; ?>
                    <li><a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>"><?php echo $link['title'] ?></a></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </section>
<?php else : ?>
    <h2 style="font-family: 'Mark', sans-serif;">Ссылки на якоря модуль</h2>
<?php endif; ?>