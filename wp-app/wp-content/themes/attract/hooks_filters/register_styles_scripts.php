<?php
function globSearch($pattern, $flags = 0)
{
    $files = glob($pattern, $flags);
    foreach (glob(dirname($pattern) . '/*', GLOB_ONLYDIR | GLOB_NOSORT) as $dir)
        $files = array_merge($files, globSearch($dir . '/' . basename($pattern), $flags));
    return $files;
}

function searchFiles()
{
    $path = get_template_directory() . '/dist/';
    $files = globSearch($path . "*.css");
    array_map(function ($file) {
        $file = explode('/', $file);
        $file = end($file);
    }, $files);
}

function register_styles_scripts(): void
{
    $path = get_template_directory();
    $filesCss = globSearch($path . "/dist/*.css");
    $filesJs = globSearch($path . "/dist/*.js");

    foreach ($filesCss as $file) {
        $filePath = str_replace($path, '', $file);
        $fileName = explode('/', $filePath);
        $fileName = end($fileName);
        $fileName = str_replace('.css', ' ', $fileName);
        wp_register_style(trim($fileName),get_template_directory_uri() . $filePath, array(), getHasFile('css/style.min.css'), 'screen');
        wp_enqueue_style(trim($fileName));
    }

    foreach ($filesJs as $file) {
        $filePath = str_replace($path, '', $file);
        $fileName = explode('/', $filePath);
        $fileName = end($fileName);
        $fileName = str_replace('.js', ' ', $fileName);
        wp_enqueue_script(trim($fileName),get_template_directory_uri() . $filePath, array(), getHasFile('js/build-min.js'), true);
    }
    wp_localize_script(
        'build',
        'myajax',
        array(
            'url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('myajax-nonce')
        ),
    );
}

add_action('wp_enqueue_scripts', 'register_styles_scripts', 10);

function admin_register_styles_scripts()
{
    wp_enqueue_style('admin-styles', get_stylesheet_directory_uri() . '/assets/admin/admin-style.css');
    
}

// add_action('wp_enqueue_scripts', 'admin_register_localize_scripts', 100);

// function admin_register_localize_scripts()
// {
    
// }

add_action('admin_enqueue_scripts', 'admin_register_styles_scripts');

function getHasFile(
    string $path,
): string {
    $fullPath = sprintf('%s/dist/%s', get_template_directory(), $path);

    if (!file_exists($fullPath)) {
        return rand(1,999);
    }

    return hash_file('md5', $fullPath);
}

