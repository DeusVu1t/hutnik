<?php

add_action('wp_enqueue_scripts', 'add_scripts_and_styles');
function add_scripts_and_styles()
{
    wp_enqueue_style('wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&display=swap', false);
    wp_enqueue_style('wpb-google-fonts-roboto', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap', false);
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), null, true);

    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css', false, '999', 'all');
    wp_enqueue_style('normalize', get_template_directory_uri() . '/assets/css/normalize.min.css', false, '999', 'all');
    wp_enqueue_script('owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array('jquery'), '2.3.4', true);
    wp_enqueue_style('owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', array(), '2.3.4');
    wp_enqueue_style('owl-carousel-deaf', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css', array(), '2.3.4');
/*     wp_enqueue_style( 'aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css' ); */
    wp_enqueue_style( 'lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.css' );
    wp_enqueue_script( 'lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js', array( 'jquery' ), '2.11.4', true );
   /*  wp_enqueue_script( 'aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), false, true ); */
    wp_enqueue_script( 'parallax', 'https://cdnjs.cloudflare.com/ajax/libs/parallax.js/1.4.2/parallax.min.js', array( 'jquery' ), '1.4.2', true );
}


if (function_exists('acf_add_options_page')) {
    acf_add_options_page('Ustawienia szablonu');
}


// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});

add_action('init', 'my_remove_editor_from_post_type');
function my_remove_editor_from_post_type()
{
    remove_post_type_support('page', 'editor');
}


function smartwp_remove_wp_block_library_css()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-blocks-style'); // Remove WooCommerce block CSS
}
add_action('wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100);


function add_fixed_save_button() {
    ?>
    <style>
        .fixed-save-button {
            position: fixed;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            z-index: 999;
            font-size: 20px!important;
            border-top-left-radius: 100%!important;
            border-top-right-radius: 100%!important;            
            padding-left: 20px!important;
            padding-right: 20px!important;
            padding-top: 10px!important;
        }
    </style>
    <script>
        jQuery(document).ready(function($) {
            var $button = $('<input type="submit" value="Zapisz zmiany" class="button button-primary fixed-save-button">').appendTo('#post');
        });
    </script>
    <?php
}
add_action( 'admin_head', 'add_fixed_save_button' );

add_action( 'wp_enqueue_scripts', 'mywptheme_child_deregister_styles', 20 );
function mywptheme_child_deregister_styles() {
    wp_dequeue_style( 'classic-theme-styles' );

}



function add_lazyload_to_images($content) {
    return str_replace('<img ', '<img loading="lazy" ', $content);
}
add_filter('the_content', 'add_lazyload_to_images');

function allow_svg_upload($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');
function add_svg_mime_type($data, $file, $filename, $mimes) {
    if (strpos(file_get_contents($file), '<svg ') !== false) {
        $data['type'] = 'image/svg+xml';
        $data['ext']  = 'svg';
    }
    return $data;
}
add_filter('wp_check_filetype_and_ext', 'add_svg_mime_type', 10, 4);


function add_the_table_button( $buttons ) {
    array_push( $buttons, 'separator', 'table' );
    return $buttons;
}
add_filter( 'mce_buttons', 'add_the_table_button' );

function add_the_table_plugin( $plugins ) {
      $plugins['table'] = content_url() . '/tinymce-plugins/table/plugin.min.js';
      return $plugins;
}
add_filter( 'mce_external_plugins', 'add_the_table_plugin' );