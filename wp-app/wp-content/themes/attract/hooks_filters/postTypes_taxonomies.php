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

add_action('init', 'create_taxonomy');
function create_taxonomy()
{

    register_taxonomy('service-category', ['service'], [
        'label' => __('service category'),
        'rewrite' => ['slug' => 'uslugi/category', 'with_front' => false],
        'labels' => [
            'name' => 'Категория услуг',
            'singular_name' => 'Категории услуг',
            'search_items' => 'Найти услугу',
            'all_items' => 'Все категории услуг',
            'view_item ' => 'Просмотреть категорию услуг',
            'parent_item' => 'Родительская категория услуги',
            'parent_item_colon' => 'Родительская категория услуги:',
            'edit_item' => 'Редактировать категорию услуги',
            'update_item' => 'Обновить категорию услуги',
            'add_new_item' => 'Добавить новую категорию услуги',
            'new_item_name' => 'Новое название категории услуги',
            'menu_name' => 'Категории услуг',
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

    register_taxonomy('team-category', ['team'], [
        'label' => __('team category'),
        'rewrite' => ['slug' => 'team-category'],
        'labels' => [
            'name' => 'Команда',
            'singular_name' => 'Команда',
            'search_items' => 'Найти сотрудника',
            'all_items' => 'Все сотрудники',
            'view_item ' => 'Просмотреть сотрудника',
            'parent_item' => 'Родительская категория сотрудника',
            'parent_item_colon' => 'Родительская категория сотрудника:',
            'edit_item' => 'Редактировать категорию команды',
            'update_item' => 'Обновить категорию команды',
            'add_new_item' => 'Добавить новую категорию команды',
            'new_item_name' => 'Новое название категории команды',
            'menu_name' => 'Категории команды',
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

    register_taxonomy('case-category', ['case'], [
        'label' => __('case category'),
        'rewrite' => ['slug' => 'kejsy/category', 'with_front' => false],
        'labels' => [
            'name' => 'Категория кейсов',
            'singular_name' => 'Категории кейсов',
            'search_items' => 'Найти кейс',
            'all_items' => 'Все категории кейсов',
            'view_item ' => 'Просмотреть категорию кейсов',
            'parent_item' => 'Родительская категория кейса',
            'parent_item_colon' => 'Родительская категория кейса:',
            'edit_item' => 'Редактировать категорию кейса',
            'update_item' => 'Обновить категорию кейса',
            'add_new_item' => 'Добавить новую категорию кейса',
            'new_item_name' => 'Новое название категории кейса',
            'menu_name' => 'Категории кейсов',
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

    register_taxonomy('case-tag', ['case'], [
        'label' => __('case tag'),
        'rewrite' => ['slug' => 'case-tag'],
        'labels' => [
            'name' => 'Теги кейсов',
            'singular_name' => 'Теги кейсов',
            'search_items' => 'Найти тег',
            'all_items' => 'Все теги кейсов',
            'view_item ' => 'Просмотреть теги кейсов',
            'parent_item' => 'Родительский тег кейса',
            'parent_item_colon' => 'Родительский тег кейса:',
            'edit_item' => 'Редактировать тег кейса',
            'update_item' => 'Обновить тег кейса',
            'add_new_item' => 'Добавить новый тег кейса',
            'new_item_name' => 'Новое название тега кейса',
            'menu_name' => 'Теги кейсов',
        ],
        'public' => true,
        'hierarchical' => false,
        'capabilities' => [],
        'meta_box_cb' => null,
        'show_admin_column' => false,
        'show_in_rest' => true,
        'show_ui' => true,
        'publicly_queryable' => false,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
    ]);

    register_taxonomy('case-project', ['case'], [
        'label' => __('case project'),
        'rewrite' => ['slug' => 'case-project'],
        'labels' => [
            'name' => 'Проекты',
            'singular_name' => 'Проект',
            'search_items' => 'Найти проект',
            'all_items' => 'Все проекты',
            'view_item ' => 'Просмотреть проект',
            'parent_item' => 'Родительский проект',
            'parent_item_colon' => 'Родительский проект:',
            'edit_item' => 'Редактировать проект',
            'update_item' => 'Обновить проект',
            'add_new_item' => 'Добавить новый проект',
            'new_item_name' => 'Новое название проекта',
            'menu_name' => 'Проекты',
        ],
        'public' => true,
        'hierarchical' => true,
        'capabilities' => [],
        'meta_box_cb' => null,
        'show_admin_column' => false,
        'show_in_rest' => true,
        'show_ui' => true,
        'publicly_queryable' => false,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
    ]);

    register_taxonomy('rules-documents', ['rules'], [
        'label' => __('rule document'),
        'rewrite' => ['slug' => 'rules-documents'],
        'labels' => [
            'name' => 'Категория правового документа',
            'singular_name' => 'Категории правовых документов',
            'search_items' => 'Найти правовой документ',
            'all_items' => 'Все категории правовых документов',
            'view_item ' => 'Просмотреть категорию правового документа',
            'parent_item' => 'Родительская категория правового документа',
            'parent_item_colon' => 'Родительская категория правового документа:',
            'edit_item' => 'Редактировать категорию правового документа',
            'update_item' => 'Обновить категорию правового документа',
            'add_new_item' => 'Добавить новую категорию правового документа',
            'new_item_name' => 'Новое название категории правового документа',
            'menu_name' => 'Категории правовых документов',
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

// Make category taxonony not publicly queryable
add_filter( 'register_taxonomy_args', function($args, $taxonomy, $object_type){
    
    if($taxonomy === 'category') {
        $args['publicly_queryable'] = false;
        $args['query_var'] = true;
    }
    
    return $args;
}, 10, 3 );

function custom_register_post_types()
{
    $post_types = [
        [
            "post_type_name" => "case",
            "name" => "Кейсы",
            "name_plural" => "Кейсы",
            "name_lowercase" => "Кейсы",
            "name_lowercase_plural" => "Кейсы",
            'menu_icon' => 'dashicons-sticky',
            "supports" => ['title', 'editor'],
            "has_archive" => false,
            "rewrite" => ["with_front" => false, 'slug' => 'kejsy']
        ],
        [
            "post_type_name" => "review",
            "name" => "Отзывы",
            "name_plural" => "Отзывы",
            "name_lowercase" => "Отзывы",
            "name_lowercase_plural" => "Отзывы",
            'menu_icon' => 'dashicons-welcome-write-blog',
            "supports" => ['title', 'editor'],
            "has_archive" => false,
        ],
        [
            "post_type_name" => "service",
            "name" => "Услуги",
            "name_plural" => "Услуги",
            "name_lowercase" => "Услуги",
            "name_lowercase_plural" => "Услуги",
            'menu_icon' => 'dashicons-welcome-write-blog',
            "supports" => ['title', 'editor'],
            "has_archive" => false,
            "rewrite" => ['slug' => 'uslugi', 'with_front' => false],
        ],
        [
            "post_type_name" => "team",
            "name" => "Сотрудника",
            "name_plural" => "Команда",
            "name_lowercase" => "Сотрудники",
            "name_lowercase_plural" => "Сотрудники",
            'menu_icon' => 'dashicons-welcome-write-blog',
            "supports" => ['title', 'editor'],
            "has_archive" => false,
        ],
        [
            "post_type_name" => "rules",
            "name" => "правовой документ",
            "name_plural" => "Правовые документы",
            "name_lowercase" => "правовые документы",
            "name_lowercase_plural" => "правовые документы",
            'menu_icon' => 'dashicons-welcome-write-blog',
            "supports" => ['title', 'editor'],
            "has_archive" => false,
        ],
        [
            "post_type_name" => "schemas",
            "name" => "Микроразметки",
            "name_plural" => "Микроразметки",
            "name_lowercase" => "Микроразметки",
            "name_lowercase_plural" => "Микроразметки",
            'menu_icon' => 'dashicons-welcome-write-blog',
            "supports" => ['title', 'editor'],
            "has_archive" => false,
            "public" => false,
            "show_ui" => true
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
            'public' => $post_type['public'] ?? true,
            'show_ui' => $post_type['show_ui'] ?? true,
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
