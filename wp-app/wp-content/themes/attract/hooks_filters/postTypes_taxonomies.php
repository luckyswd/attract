<?php
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme settings',
        'menu_title' => 'Theme settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}

function create_taxonomy()
{
    register_taxonomy('tag', ['case'], [
        'label' => __('Тэги'),
        'rewrite' => ['slug' => 'tag'],
        'labels' => [
            'name' => 'Тэг',
            'singular_name' => 'Тэги',
            'search_items' => 'Найти тэг',
            'all_items' => 'Все тэги',
            'view_item ' => 'Просмотреть тэг',
            'parent_item' => 'Родительский тэг',
            'parent_item_colon' => 'Родительский тэг:',
            'edit_item' => 'Редактировать тэг',
            'update_item' => 'Обновить тэг',
            'add_new_item' => 'Добавить новый тэг',
            'new_item_name' => 'Новое название тэга',
            'menu_name' => 'Тэги',
        ],
        'public' => true,
        'hierarchical' => true,
        'capabilities' => [],
        'meta_box_cb' => null,
        'show_admin_column' => false,
        'show_in_rest' => true,
        'show_ui' => true,
        'publicly_queryable' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
    ]);
}

add_action('init', 'create_taxonomy');

function custom_register_post_types()
{
    $post_types = [
        [
            "post_type_name" => "case",
            "name" => "Кейсы",
            "name_plural" => "Кейсы",
            "name_lowercase" => "Кейсы",
            "name_lowercase_plural" => "Кейсы",
            'menu_icon' => 'dashicons-products',
            "supports" => ['title', 'editor'],
            "has_archive" => false,
        ],
    ];

    foreach ($post_types as $post_type) {
        $post_type_args = [
            'labels' => [
                'name' => __($post_type["name_plural"]),
                'singular_name' => __($post_type["name"]),
                'add_new' => __('Добавить ' . $post_type["name"]),
                'add_new_item' => __('Добавить ' . $post_type["name"]),
                'edit_item' => __('Редактировать ' . $post_type["name"]),
                'new_item' => __('Добавить ' . $post_type["name"]),
                'view_item' => __('Посмотреть ' . $post_type["name"]),
                'view_items' => __('Посмотреть ' . $post_type["name_plural"]),
                'search_items' => __('Найти ' . $post_type["name_plural"]),
                'not_found' => __('Нет ' . $post_type["name_lowercase_plural"] . ' found'),
                'not_found_in_trash' => __('Нет ' . $post_type["name_lowercase_plural"] . ' found in Trash'),
                'all_items' => __('Все ' . $post_type["name_plural"]),
                'archives' => __($post_type["name"] . ' Archives'),
                'attributes' => __($post_type["name"] . ' Attributes'),
                'insert_into_item' => __('Insert into ' . $post_type["name_lowercase"]),
                'uploaded_to_this_item' => __('Uploaded to this ' . $post_type["name_lowercase"]),
                'item_published ' => __($post_type["name"] . ' published.'),
                'item_published_privately' => __($post_type["name"] . ' published privately.'),
                'item_reverted_to_draft' => __($post_type["name"] . ' reverted to draft.'),
                'item_scheduled' => __($post_type["name"] . ' scheduled.'),
                'item_updated' => __($post_type["name"] . ' updated.'),
            ],
            'menu_icon' => $post_type['menu_icon'],
            'public' => true,
            'has_archive' => $post_type["has_archive"],
            'menu_position' => 5,
            'show_in_rest' => true,
            'supports' => $post_type["supports"],
            'taxonomies' => $post_type["taxonomies"] ?? [],
            'rewrite' => $post_type['rewrite'] ?? []
        ];
        register_post_type($post_type["post_type_name"], $post_type_args);
    }
}

add_action('init', 'custom_register_post_types');