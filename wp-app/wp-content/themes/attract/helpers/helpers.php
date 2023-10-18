<?php

function getPictureImage(
    ?array $image = null,
    ?int   $width = null,
    ?int   $height = null,
): void {
    include get_template_directory() . '/components/picture.php';
}

function getPictureImageWithText(
    ?array $image = null,
    ?int   $width = null,
    ?int   $height = null,
    ?string $name = null,
    ?string $position = null,
    ?string $description = null
): void {
    include get_template_directory() . '/components/picture-with-text.php';
}

function anchorHelper(
    string $id
): void {
    include get_template_directory() . '/components/anchor-helper.php';
}

function extractIdFromLink(
    string $url,
): string {
    $pattern = '/^(?:https?:\/\/)?(?:www\.)?(?:youtube\.com|youtu\.be)\/(?:watch\?v=)?(.+)$/';
    preg_match($pattern, $url, $matches);

    if (!empty($matches[1])) {
        $matches[1] = str_replace('shorts/', '', $matches[1]);
    }

    return $matches[1] ?? '';
}

function getYoutubePreview(
    string $videoId
): string {
    return sprintf(
        'https://img.youtube.com/vi/%s/maxresdefault.jpg',
        $videoId
    );
}
