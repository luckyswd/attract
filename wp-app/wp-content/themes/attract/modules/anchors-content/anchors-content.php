<?php

/*
Title: Ссылки на якоря в виде оглавления модуль
Mode: preview
*/

$title = get_field("title");
$anchors = get_field("anchors_content");
?>

<?php if (!is_admin()) : ?>
    <section class="anchor-content-links distance">
        <div class="anchor-content-links__title"><p class="h5"><?= $title ?></p></div>
        <?php if (!empty($anchors) && !!count($anchors)) : ?>
            <ul class="anchor-content-links__list">
                <?php
                    $currentLevel = 1;
                    $firstIndex = 1;
                    $secondIndex = 1;

                    foreach ($anchors as $anchor) {
                        $link = $anchor['link'];
                        $linkURL = $link['url'];
                        $linkTarget = $link['target'];
                        $linkTitle = $link['title'];

                        $linkType = $anchor['link_level'];

                        preg_match('/level-(\d+)/', $linkType, $matches);
                        $nestingLevel = isset($matches[1]) ? intval($matches[1]) : 1; 

                        if ($nestingLevel > $currentLevel) {
                            $firstIndex--;
                            for ($i = $currentLevel; $i < $nestingLevel; $i++) {
                                echo '<ul>'; // Opening new levels
                            }
                        } elseif ($nestingLevel < $currentLevel) {
                            $firstIndex++;
                            for ($i = $currentLevel; $i > $nestingLevel; $i--) {
                                echo '</ul>'; // Closing levels
                            }
                        }
                        
                        // Output the link
                        if ($nestingLevel === 1) {
                            echo "
                                <li data-level='$nestingLevel'>
                                    <span class='number'>$firstIndex.</span>
                                    <a href='$linkURL' target='$linkTarget'>$linkTitle</a>
                                </li>
                            ";

                            $firstIndex++;
                            $secondIndex = 1; // Reset second index
                        } else {
                            echo "
                                <li data-level='$nestingLevel'>
                                    <a href='$linkURL' target='$linkTarget'>$linkTitle</a>
                                    <span class='line'></span>
                                    <span class='number'>$firstIndex.$secondIndex</span>
                                </li>
                            ";

                            $secondIndex++;
                        }

                        // Update current level
                        $currentLevel = $nestingLevel;
                    }

                    // Close any remaining open lists
                    for($i = $currentLevel; $i > 0; $i--) {
                        echo '</ul>';
                    }
                ?>
            </ul>
        <?php endif; ?>
    </section>
<?php else : ?>
    <h2 style="font-family: 'Mark', sans-serif;">Ссылки на якоря в виде оглавления модуль</h2>
<?php endif; ?>