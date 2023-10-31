<?php

/*
Title: Свяжитесь с нами модуль
Mode: preview
*/

?>

<?php
$feedback_text = get_field('feedback_text', 'option');
$button_feedback = get_field('button_feedback', 'option');
?>

<?php if (!is_admin()) : ?>
    <section class="contact-us distance">
        <div class="container">
            <div class="contact-us-wrap">
                <p class="h5"> <?= $feedback_text ?? '' ?> </p>
                <a class="btn blue" href="javascript:;" data-fancybox="" data-src="#modal-feedback-form">
                    <span class="hover-animation">
                        <span><?= $button_feedback['title'] ?? '' ?></span>
                    </span>
                </a>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Свяжитесь с нами модуль</h2>
<?php endif; ?>