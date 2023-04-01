<?php

function getPictureImage(
    ?array $image = null,
): void
{
    include get_template_directory() . '/components/picture.php';
}