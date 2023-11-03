<?php
function create_posttype()
{
    register_post_type(
        'regaty',
        array(
            'labels' => array(
                'name' => __('Regaty'),
                'singular_name' => __('Regaty'),
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'regaty_'),
        )
    );
}
add_action('init', 'create_posttype');

function cw_post_type_regaty()
{
    $supports = array(
        'title',
        'editor',
        'author',
        'thumbnail',
        'excerpt',
        'custom-fields',
        'revisions',
        'revisions',
        'post-formats',
        'template',
    );

    $labels = array(
        'name' => _x('Regaty', 'plural'),
        'singular_name' => _x('Regaty', 'singular'),
        'menu_name' => _x('Regaty', 'admin menu'),
        'name_admin_bar' => _x('Regaty', 'admin bar'),
        'add_new' => _x('Dodaj', 'add'),
        'add_new_item' => __('Dodaj nowy'),
        'new_item' => __('Nowy wpis'),
        'edit_item' => __('Edytuj wpis'),
        'view_item' => __('Zobacz wpis'),
        'all_items' => __('Wszystkie wpisy'),
        'search_items' => __('Szukaj'),
        'not_found' => __('No posts found.'),
    );
    $args = array(
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions', 'revisions', 'post-formats', 'template',),
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'has_archive' => true,
        'hierarchical' => false,
    );
    register_post_type('regaty', $args);
}
add_action('init', 'cw_post_type_regaty');

add_action('init', 'regaty_taxonomy', 0);

function regaty_taxonomy()
{
    $labels = array(
        'name' => _x('Categories', 'taxonomy general name'),
        'singular_name' => _x('Category', 'taxonomy singular name'),
        'search_items' => __('Search Types'),
        'all_items' => __('All Categories'),
        'parent_item' => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item' => __('Edit Category'),
        'update_item' => __('Update Category'),
        'add_new_item' => __('Add New Category'),
        'new_item_name' => __('New Category Name'),
        'menu_name' => __('Categories'),
    );

    register_taxonomy('regaty', array('regaty'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'regaty'),
    ));
}
function create_posttype_rejsy()
{
    register_post_type(
        'rejsy',       
        array(
            'labels' => array(
                'name' => __('Rejsy'),
                'singular_name' => __('Rejsy'), 
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'rejsy'), 
        )
    );
}
add_action('init', 'create_posttype_rejsy');

function cw_post_type_rejsy()
{
    $supports = array(
        'title',
        'editor',
        'author',
        'thumbnail',
        'excerpt',
        'custom-fields',
        'revisions',
        'revisions',
        'post-formats',
        'template',
    );

    $labels = array(
        'name' => _x('Rejsy', 'plural'),
        'singular_name' => _x('Rejsy', 'singular'),
        'menu_name' => _x('Rejsy', 'admin menu'),
        'name_admin_bar' => _x('Rejsy', 'admin bar'),
        'add_new' => _x('Dodaj', 'add'),
        'add_new_item' => __('Dodaj nowy'),
        'new_item' => __('Nowy wpis'),
        'edit_item' => __('Edytuj wpis'),
        'view_item' => __('Zobacz wpis'),
        'all_items' => __('Wszystkie wpisy'),
        'search_items' => __('Szukaj'),
        'not_found' => __('No posts found.'),
    );

    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'has_archive' => true,
        'hierarchical' => false,
    );

    register_post_type('rejsy', $args); 
}
add_action('init', 'cw_post_type_rejsy'); 

function rejsy_taxonomy() 
{
    $labels = array(
        'name' => _x('Categories', 'taxonomy general name'),
        'singular_name' => _x('Category', 'taxonomy singular name'),
        'search_items' =>  __('Search Types'),
        'all_items' => __('All Categories'),
        'parent_item' => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item' => __('Edit Category'),
        'update_item' => __('Update Category'),
        'add_new_item' => __('Add New Category'),
        'new_item_name' => __('New Category Name'),
        'menu_name' => __('Categories'),
    );

    register_taxonomy('rejsy_category', array('rejsy'), array( 
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'rejsy-category')
    ));
}
add_action('init', 'rejsy_taxonomy');