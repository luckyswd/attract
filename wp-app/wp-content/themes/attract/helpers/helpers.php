<?php

function getPictureImage(
    ?array $image = null,
    ?int   $width = null,
    ?int   $height = null,
): void
{
    include get_template_directory() . '/components/picture.php';
}

function anchorHelper(
    string $id
): void
{
    include get_template_directory() . '/components/anchor-helper.php';
}