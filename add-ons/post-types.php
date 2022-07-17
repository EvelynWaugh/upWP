<?php
add_action('init', 'oceanwp_register_post_types');

function oceanwp_register_post_types()
{

    register_post_type('events', [
        'labels' => [
            'name'               => _x('События', 'События админка', 'oceanwp'),
            'singular_name'      => _x('Событие', 'События админка', 'oceanwp'),
            'menu_name'          => _x('События', 'События админка', 'oceanwp'),
            'all_items'          => _x('Все События', 'События админка', 'oceanwp'),
            'add_new'            => _x('Добавить новое', 'События админка', 'oceanwp'),
            'add_new_item'       => _x('Добавить Событиe', 'События админка', 'oceanwp'),
            'edit'               => _x('Редактировать', 'События админка', 'oceanwp'),
            'edit_item'          => _x('Редактировать Событие', 'События админка', 'oceanwp'),
            'new_item'           => _x('Новое Событие', 'События админка', 'oceanwp'),
            'view'               => _x('Смотреть События', 'События админка', 'oceanwp'),
            'view_item'          => _x('Смотреть Событие', 'События админка', 'oceanwp'),
            'search_items'       => _x('Искать События', 'События админка', 'oceanwp'),
            'not_found'          => _x('События не найдены', 'События админка', 'oceanwp'),
            'not_found_in_trash' => _x('События не найдены в корзине', 'События админка', 'oceanwp'),
            'parent'             => _x('Родитель События', 'События админка', 'oceanwp'),
        ],
        'rewrite' => [
            'slug'       => 'events',

        ],
        'description'         => '',
        'public'              => true,
        'show_ui'             => true,
        'capability_type'     => 'page',
        'map_meta_cap'        => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'hierarchical'        => false,
        'query_var'           => true,
        'show_in_rest' => true,

        'supports'            => ['title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'],
        'menu_position'       => 3,
        'has_archive'         => true,
        'show_in_nav_menus'   => true,


    ]);

    register_taxonomy('events_category', ['events'], [
        'labels' => [
            'name'              => _x('Категории', 'Категория события админка', 'oceanwp'),
            'singular_name'     => _x('Категория', 'Категория события админка', 'oceanwp'),
            'menu_name'         => _x('Категории', 'Категория события админка', 'oceanwp'),
            'search_items'      => _x('Искать Категорию', 'Категория события админка', 'oceanwp'),
            'all_items'         => _x('Все Категории', 'Категория события админка', 'oceanwp'),
            'parent_item'       => _x('Родитель Категория', 'Категория события админка', 'oceanwp'),
            'parent_item_colon' => _x('Родитель Категория:', 'Категория события админка', 'oceanwp'),
            'edit_item'         => _x('Редактировать Категория', 'Категория события админка', 'oceanwp'),
            'update_item'       => _x('Обновить Категорию', 'Категория события админка', 'oceanwp'),
            'add_new_item'      => _x('Добавить новую Категорию', 'Категория события админка', 'oceanwp'),
            'new_item_name'     => _x('Новое имя Категории', 'Категория события админка', 'oceanwp'),
        ],
        'public'                => true,
        'show_in_rest' => true,
        'hierarchical'          => true,
        'update_count_callback' => '_update_post_term_count',
        'rewrite' => ['slug' => 'events_category'],
        'meta_box_cb' => 'post_categories_meta_box',
        'show_admin_column' => true

    ]);

    register_taxonomy('events_tags', ['events'], [
        'labels' => [
            'name'              => _x('Теги', 'Теги события админка', 'oceanwp'),
            'singular_name'     => _x('Тег', 'Теги события админка', 'oceanwp'),
            'menu_name'         => _x('Теги', 'Теги события админка', 'oceanwp'),
            'search_items'      => _x('Искать Теги', 'Теги события админка', 'oceanwp'),
            'all_items'         => _x('Все Теги', 'Теги события админка', 'oceanwp'),
            'parent_item'       => _x('Родитель Теги', 'Теги события админка', 'oceanwp'),
            'parent_item_colon' => _x('Родитель Теги:', 'Теги события админка', 'oceanwp'),
            'edit_item'         => _x('Редактировать Теги', 'Теги события админка', 'oceanwp'),
            'update_item'       => _x('Обновить Тег', 'Теги события админка', 'oceanwp'),
            'add_new_item'      => _x('Добавить новый Тег', 'Теги события админка', 'oceanwp'),
            'new_item_name'     => _x('Новое имя Тега', 'Теги события админка', 'oceanwp'),
        ],
        'public'                => true,
        'show_in_rest' => true,
        'hierarchical'          => true,
        'update_count_callback' => '_update_post_term_count',
        'rewrite' => ['slug' => 'events_tags'],
        'meta_box_cb' => 'post_tags_meta_box',
        'show_admin_column' => true

    ]);
}
