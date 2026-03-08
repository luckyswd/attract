<?php
include 'hooks_filters/register_styles_scripts.php';
include 'hooks_filters/postTypes_taxonomies.php';
include 'hooks_filters/webp_upload.php';
include 'hooks_filters/after_setup_theme.php';
include 'hooks_filters/reset_default_css_js.php';
include 'hooks_filters/theme_schemas.php';

include 'theme_foos/breadcrumbs.php';

require_once 'helpers/helpers.php';
require_once 'ajax/Ajax.php';
$ajax = new Ajax();
$ajax->register();

add_filter('show_admin_bar', '__return_false');
add_filter('wpcf7_autop_or_not', '__return_false');
add_action('acf/init', 'my_register_blocks');
function my_register_blocks()
{
    if (function_exists('acf_register_block_type')) {
        $path = get_template_directory();
        $filesPhp = globSearch($path . "/modules/*.php");

        foreach ($filesPhp as $file) {
            $filePath = str_replace($path, '', $file);
            $fileName = explode('/', $filePath);
            $fileName = end($fileName);
            $fileName = str_replace('.php', '', $fileName);
            $file_headers = get_file_data(__DIR__ . $filePath, [
                'title' => 'Title',
                'description' => 'Description',
                'category' => 'Category',
                'icon' => 'Icon',
                'keywords' => 'Keywords',
                'mode' => 'Mode',
                'align' => 'Align',
                'post_types' => 'PostTypes',
                'supports_align' => 'SupportsAlign',
                'supports_anchor' => 'SupportsAnchor',
                'supports_mode' => 'SupportsMode',
                'supports_jsx' => 'SupportsInnerBlocks',
                'supports_align_text' => 'SupportsAlignText',
                'supports_align_content' => 'SupportsAlignContent',
                'supports_multiple' => 'SupportsMultiple',
                'enqueue_style'     => 'EnqueueStyle',
                'enqueue_script'    => 'EnqueueScript',
                'enqueue_assets'    => 'EnqueueAssets',
            ]);

            acf_register_block_type(array(
                'name' => $fileName,
                'title' => __($file_headers['title']),
                'mode' => __($file_headers['mode']),
                'render_callback' => 'my_acf_block_render_callback',
                'category' => 'formatting',
            ));
        }
    }
}

function my_acf_block_render_callback($block)
{
    $slug = str_replace('acf/', '', $block['name']);
    if (file_exists(get_theme_file_path("modules/" . $slug . '/' . $slug . ".php"))) {
        include(get_theme_file_path("modules/" . $slug . '/' . $slug . ".php"));
    }
}

add_filter('allow_dev_auto_core_updates', '__return_false');


/*----- Breadcrumbs -----*/

add_filter('wpseo_breadcrumb_separator', 'modify_yoast_breadcrumb_separator');
function modify_yoast_breadcrumb_separator($separator)
{
    $separator = "<span class='separator'>" . $separator . "</span>";
    return $separator;
}

add_filter('wpseo_breadcrumb_output_wrapper', 'modify_yoast_breadcrumb_wrapper');
function modify_yoast_breadcrumb_wrapper()
{
    return 'wrapper';
}

add_filter('wpseo_breadcrumb_output', 'modify_yoast_breadcrumb_output');
function modify_yoast_breadcrumb_output($html)
{
    $html = str_replace(['<wrapper>', '</wrapper>'], '', $html);

    return $html;
}

add_filter('wpseo_breadcrumb_links', 'modify_yoast_breadcrumb_links');
function modify_yoast_breadcrumb_links($links)
{

    if (is_singular('service') || is_tax('service-category') || is_category() || is_tag()) {
        $breadcrumb[] = array(
            'url' => site_url('/uslugi/'),
            'text' => 'Услуги',
        );

        array_splice($links, 1, -2, $breadcrumb);
    }
    
    if (is_tax('case-category') || is_category() || is_tag()) {
        $breadcrumb[] = array(
            'url' => site_url('/kejsy/'),
            'text' => 'Наши кейсы',
        );

        array_splice($links, 1, -2, $breadcrumb);
    }

    return $links;
}

add_filter('wpseo_breadcrumb_links', function ($links)
{

    if (is_singular('post')) {
        $breadcrumb[] = array(
            'url' => site_url('/blog/'),
            'text' => 'Блог',
        );

        array_splice($links, 1, -2, $breadcrumb);
    }

    if (is_singular('case')) {
        $breadcrumb[] = array(
            'url' => site_url('/kejsy/'),
            'text' => 'Наши кейсы',
        );

        array_splice($links, 1, -2, $breadcrumb);
    }

    return $links;
});

// Add custom class to parent header mobile

add_filter('nav_menu_css_class', 'special_nav_class', 10, 4);
function special_nav_class($classes, $item, $args, $depth)
{
    if ($item->menu_item_parent == 0) {
        $classes[] = 'parent-menu-item';
    }

    // Add current-menu-item to submenu item when it matches the current page
    if ($item->menu_item_parent != 0 && ! in_array('current-menu-item', $classes, true)) {
        $queried_object_id = (int) get_queried_object_id();

        if ('post_type' === $item->type && $queried_object_id && (int) $item->object_id === $queried_object_id) {
            $classes[] = 'current-menu-item';
        } elseif ('custom' === $item->type && ! empty($item->url)) {
            $current_url = set_url_scheme('http://' . ($_SERVER['HTTP_HOST'] ?? '') . ($_SERVER['REQUEST_URI'] ?? ''));
            $item_url = set_url_scheme(untrailingslashit($item->url));
            $current_url_normalized = untrailingslashit($current_url);

            if ($item_url === $current_url_normalized || $item_url === untrailingslashit(urldecode($current_url))) {
                $classes[] = 'current-menu-item';
            }
        }
    }

    return $classes;
}

function upload_posts()
{

    $articles = get_posts([
        'post_type' => 'post',
        'category' => $_POST['currentCategory'],
        'posts_per_page' => $_POST['countProducts'] ? $_POST['countProducts'] : 9,
        'post_status' => array('publish'),
    ]);


    $categories = get_terms([
        'taxonomy' => 'category',
        'hide_empty' => false,
    ]);


    // $query = new WP_Query($articles);

    get_template_part('components/article',
        null,
        $articles
    );

    die();
}
add_action('wp_ajax_upload_posts', 'upload_posts');
add_action('wp_ajax_nopriv_upload_posts', 'upload_posts');

function nav_menu_item_change_submenu( $item_output, $item, $depth, $args ) {
	if ( in_array( 'menu-item-has-children', $item->classes ) ) {
		$item_output .= '<span class="parent-icon"></span>';
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'nav_menu_item_change_submenu', 10, 4 );

// Добавляем классы ссылкам
add_filter( 'nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 4 );
function filter_nav_menu_link_attributes( $atts, $item, $args, $depth ) {

    $atts['class'] = isset( $atts['class'] ) ? $atts['class'] . ' header__button' : 'header__button';

	return $atts;
}


function get_pattern($name) {
    ob_start();
    get_template_part("patterns/$name", null);
    return apply_filters('the_content', ob_get_clean());
}

function the_pattern($name) {
    echo get_pattern($name) ?? '';
}

/**
 * LCP image preload: find block with images → extract URLs → output preload.
 */
add_action('wp_head', 'attract_preload_lcp_image', 1);
function attract_preload_lcp_image(): void
{
    $data = attract_get_lcp_preload_data();
    if (!$data) {
        return;
    }

    if (!empty($data['imagesrcset'])) {
        printf(
            '<link rel="preload" as="image" href="%s" imagesrcset="%s" imagesizes="%s" fetchpriority="high">',
            esc_url($data['href']),
            esc_attr($data['imagesrcset']),
            esc_attr($data['imagesizes'])
        );
    } else {
        printf('<link rel="preload" as="image" href="%s" fetchpriority="high">', esc_url($data['href']));
    }
}

function attract_get_lcp_preload_data(): ?array
{
    if (is_singular('post')) {
        $url = get_the_post_thumbnail_url(get_queried_object_id(), 'full');
        return $url ? ['href' => $url] : null;
    }
    if (is_singular('case')) {
        $img = get_field('individual_image', get_queried_object_id());
        $url = is_array($img) ? ($img['sizes']['case-hero'] ?? $img['url'] ?? null) : null;
        return $url ? ['href' => $url] : null;
    }
    if (is_tax('service-category')) {
        $base = content_url('uploads/2023/08/');
        return [
            'href' => $base . 'item-1.svg',
            'imagesrcset' => $base . 'mobile.svg 480w, ' . $base . 'tablet.svg 1024w, ' . $base . 'item-1.svg 1920w',
            'imagesizes' => '(max-width: 480px) 100vw, (max-width: 1024px) 100vw, 100vw',
        ];
    }

    return attract_find_block_lcp_preload();
}

function attract_find_block_lcp_preload(): ?array
{
    $ids = [];
    $obj = get_queried_object();
    if ($obj instanceof WP_Post) {
        $ids[] = $obj->ID;
    }
    if ($obj instanceof WP_Term && $obj->taxonomy === 'service-category') {
        $c = get_field('custom_post_content', $obj);
        if ($c) {
            $ids[] = is_object($c) ? $c->ID : (int) $c;
        }
    }
    if ($id = (int) get_option('page_on_front')) {
        $ids[] = $id;
    }
    $ids = array_unique(array_filter($ids));
    $block_config = attract_get_lcp_block_config();

    foreach ($ids as $post_id) {
        $post = get_post($post_id);
        if (!$post || empty($post->post_content)) {
            continue;
        }

        $blocks = parse_blocks($post->post_content);

        foreach ($block_config as $block_name => $extractor) {
            $block = attract_find_block($blocks, $block_name) ?: attract_find_block($blocks, str_replace('acf/', '', $block_name));
            if ($block && ($data = $extractor($block['attrs']['data'] ?? []))) {
                return $data;
            }
        }
    }

    return null;
}

/** Block name => extractor(data) => {href, imagesrcset?, imagesizes?} */
function attract_get_lcp_block_config(): array
{
    $img = fn ($d) => is_array($d) && !empty($d['url']) ? $d['url'] : (is_numeric($d) ? (wp_get_attachment_image_url((int) $d, 'full') ?: '') : '');

    return [
        'acf/services-hero' => function (array $d) use ($img) {
            $desktop = $img($d['background_image_desktop'] ?? null);
            $tablet = $img($d['background_image_tablet'] ?? null);
            $mobile = $img($d['background_image_mobile'] ?? null);
            $href = $desktop ?: $tablet ?: $mobile;
            if (!$href) {
                return null;
            }
            $parts = array_filter(array_map(fn ($u, $w) => $u ? esc_url($u) . " {$w}w" : '', [$mobile, $tablet, $desktop], [480, 1024, 1920]));
            return [
                'href' => $href,
                'imagesrcset' => count($parts) > 1 ? implode(', ', $parts) : null,
                'imagesizes' => count($parts) > 1 ? '(max-width: 480px) 100vw, (max-width: 1024px) 100vw, 100vw' : null,
            ];
        },
        'acf/hero' => function (array $d) use ($img) {
            $url = $img($d['image'] ?? null);
            return $url ? ['href' => $url] : null;
        },
    ];
}

function attract_find_block(array $blocks, string $name): ?array
{
    foreach ($blocks as $block) {
        if (($block['blockName'] ?? '') === $name) {
            return $block;
        }
        if (!empty($block['innerBlocks']) && $found = attract_find_block($block['innerBlocks'], $name)) {
            return $found;
        }
    }
    return null;
}