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

function extractIdFromLink(
    string $link
):string {
    try {
        parse_str(
            parse_url($link, PHP_URL_QUERY),
            $youtubeData
        );

        return $youtubeData['v'];
    } catch (Exception $e) {
        return '';
    }
}

function getYoutubePreview(
    string $videoId
):string {
    return sprintf(
        'https://img.youtube.com/vi/%s/maxresdefault.jpg',
        $videoId
    );
}