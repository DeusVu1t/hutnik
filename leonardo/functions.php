<?php

/**
 * leonardo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package leonardo
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function leonardo_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on leonardo, use a find and replace
		* to change 'leonardo' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('leonardo', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Menu główne', 'leonardo'),
			'menu-2' => esc_html__('Foot menu 1', 'leonardo'),
			'menu-3' => esc_html__('Foot menu 2', 'leonardo'),
			'menu-4' => esc_html__('Foot menu 3', 'leonardo'),
			'menu-5' => esc_html__('Foot menu mobile', 'leonardo'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'leonardo_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'leonardo_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function leonardo_content_width()
{
	$GLOBALS['content_width'] = apply_filters('leonardo_content_width', 640);
}
add_action('after_setup_theme', 'leonardo_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function leonardo_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'leonardo'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'leonardo'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'leonardo_widgets_init');



require_once('functions/style.php');

require_once('functions/custom_posts.php');


function klf_acf_input_admin_footer_new_2()
{ ?>
	<script type="text/javascript">
		(function($) {
			acf.add_filter('color_picker_args', function(args, $field) {
				if ($field.attr('data-name') === 'color_tekstu') {
					args.palettes = ['#FFFFFF', '#19143F', '#FE5200']
				} else if ($field.attr('data-name') === 'color_tla') {
					args.palettes = ['#19143F', '#FFFFFF', '#FAFAFA']
				} else if ($field.attr('data-name') === 'color_tekstus') {
					args.palettes = ['#FFFFFF', '#19143F']
				} else if ($field.attr('data-name') === 'color_bg_left') {
					args.palettes = ['#19143F', '#FFFFFF', '#FAFAFA']
				} else if ($field.attr('data-name') === 'color_bg_right') {
					args.palettes = ['#19143F', '#FFFFFF', '#FAFAFA']
				} else if ($field.attr('data-name') === 'left_color') {
					args.palettes = ['#FFFFFF', '#19143F']
				} else if ($field.attr('data-name') === 'right_color') {
					args.palettes = ['#FFFFFF', '#19143F']
				}
				return args;
			});
		})(jQuery);
	</script>
<?php }
add_action('acf/input/admin_footer', 'klf_acf_input_admin_footer_new_2');



add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts()
{
	echo '<style>
  .wp-picker-input-wrap {
    display: none!important;
}
  </style>';
}
function enqueue_core_js()
{
	wp_register_script('core-js', get_template_directory_uri() . '/assets/js/core.js', array('jquery'), '1.0', true);
	wp_enqueue_script('core-js');

	wp_localize_script('core-js', 'ajax_posts', array(
		'ajaxurl' => admin_url('admin-ajax.php'),
	));
}

add_action('wp_enqueue_scripts', 'enqueue_core_js');



function more_post_ajax()
{
	$ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 8;
	$page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 1;
	$category = (isset($_POST['category'])) ? $_POST['category'] : '';

	header("Content-Type: text/html");

	$args = array(
		'suppress_filters' => true,
		'post_type' => 'post',
		'posts_per_page' => $ppp,
		'paged'    => $page,
	);

	if ($category !== 'all') {
		$args['category_name'] = $category;
	}

	$loop = new WP_Query($args);

	if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post();

			// Get the image field
			$image = get_field('image');

			// Get the main category
			$categories = get_the_category();
			$main_category = '';
			if ($categories) {
				$main_category = $categories[0]->name;
			}

			// Start building the HTML output
			$out .= '<article class="single-post-box" data-aos="zoom-in">
<a href="' . esc_url(get_permalink()) . '" class="blog-link">
	<div class="image-block" style="background-image: url(' . esc_url(get_the_post_thumbnail_url(null, 'thumbnail')) . ');"></div>
	<div class="text-block">
	<div class="top-post">
	<p class="post-date">' . get_the_date('m/d/Y') . '</p>
	</div>		
		<div class="bottom-post">
		<h4 class="clamp-2">' . get_the_title() . '</h4>        
		<div class="descript clamp-3" style="">' . get_field('descript_post') . '</div>
			
		</div>
	</div>
</a>
</article>';


		endwhile;
	endif;



	// Reset the post data
	wp_reset_postdata();
	die($out);
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');





// Функция для загрузки кастомных постов регаты
function more_post_ajax_regaty()
{
	$ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 12;
	$page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 1;

	header("Content-Type: text/html");

	$args = array(
		'suppress_filters' => true,
		'post_type' => 'regaty', // Используем тип поста 'regaty' для кастомных постов регаты
		'posts_per_page' => $ppp,
		'paged'    => $page,
	);

	$loop = new WP_Query($args);

	if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post();
			// Get the image field
			$image = get_field('image');

			// Get the main category
			$categories = get_the_category();
			$main_category = '';
			if ($categories) {
				$main_category = $categories[0]->name;
			}

			// Start building the HTML output
			$out .= '<article class="single-post-box" data-aos="zoom-in">
<a href="' . esc_url(get_permalink()) . '" class="blog-link">
	<div class="image-block" style="background-image: url(' . esc_url(get_the_post_thumbnail_url(null, 'thumbnail')) . ');"></div>
	<div class="text-block">
	<div class="top-post">
	<p class="post-date">' . get_the_date('m/d/Y') . '</p>
	<p class="post-categ">' . esc_html($main_category) . '</p>
	</div>		
		<div class="bottom-post">
		<h4 class="clamp-2">' . get_the_title() . '</h4>        
		<div class="descript clamp-3" style="">' . get_field('descript_post') . '</div>
			
		</div>
	</div>
</a>
</article>';

		endwhile;
	endif;

	// Сбрасываем данные постов
	wp_reset_postdata();
	die($out);
}

add_action('wp_ajax_nopriv_more_post_ajax_regaty', 'more_post_ajax_regaty');
add_action('wp_ajax_more_post_ajax_regaty', 'more_post_ajax_regaty');


function custom_rewrite_rules()
{
	add_rewrite_rule(
		'regaty/([^/]+)/?$',
		'index.php?post_type=regaty&name=$matches[1]',
		'top'
	);

	add_rewrite_rule(
		'regaty/?$',
		'index.php?post_type=regaty',
		'top'
	);
}
add_action('init', 'custom_rewrite_rules');





function more_post_ajax_rejsy()
{
	$ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 8;
	$page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 1;

	header("Content-Type: text/html");

	$args = array(
		'suppress_filters' => true,
		'post_type' => 'rejsy', // Используем тип поста 'rejsy' для кастомных постов регаты
		'posts_per_page' => $ppp,
		'paged'    => $page,
	);

	$loop = new WP_Query($args);

	if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post();
			// Get the image field
			$image = get_field('image');

			// Get the main category
			$categories = get_the_category();
			$main_category = '';
			if ($categories) {
				$main_category = $categories[0]->name;
			}

			// Start building the HTML output
			$out .= '<article class="single-post-box" data-aos="zoom-in">
    <a href="' . esc_url(get_permalink()) . '" class="blog-link">
        <div class="image-block">
            <img src="' . esc_url(get_the_post_thumbnail_url(null, 'thumbnail')) . '" loading="lazy" alt="' . esc_attr(get_the_title()) . '">
        </div>
        <div class="text-block">
            <div class="top-post">
               
            </div>
            <div class="bottom-post">
                <h4 class="clamp-2">' . get_the_title() . '</h4>
                <div class="descript clamp-3" style="">' . get_field('descript_post') . '</div>
            </div>
        </div>
    </a>
</article>';


		endwhile;
	endif;

	// Сбрасываем данные постов
	wp_reset_postdata();
	die($out);
}

add_action('wp_ajax_nopriv_more_post_ajax_rejsy', 'more_post_ajax_rejsy');
add_action('wp_ajax_more_post_ajax_rejsy', 'more_post_ajax_rejsy');




function custom_rewrite_rules_rejsy()
{
	add_rewrite_rule(
		'rejsy/([^/]+)/?$',
		'index.php?post_type=rejsy&name=$matches[1]',
		'top'
	);

	add_rewrite_rule(
		'rejsy/?$',
		'index.php?post_type=rejsy',
		'top'
	);
}
add_action('init', 'custom_rewrite_rules_rejsy');



function custom_page_redirect()
{
	global $post;

	// Check if the current page is the "szkolenia" page
	if (is_page('szkolenia')) {
		// Redirect to the homepage
		wp_redirect(home_url());
		exit;
	}
}
add_action('template_redirect', 'custom_page_redirect');

function custom_acf_wysiwyg_image_size($sizes)
{

	$sizes['custom-wysiwyg-image-size'] = array(
		'width' => 9999,
		'height' => 9999,
		'crop' => false,
	);

	return $sizes;
}

add_filter('image_size_names_choose', 'custom_acf_wysiwyg_image_size');
function add_lazy_loading_to_acf_images($content)
{
	$content = preg_replace('/<img(.*?)>/i', '<img$1 loading="lazy">', $content);
	return $content;
}

add_filter('acf_the_content', 'add_lazy_loading_to_acf_images');


/* require_once(get_template_directory() . '/templates/news-form.php'); */

function process_news_form()
{
	if (isset($_POST['email'])) {

		$email = sanitize_email($_POST['email']);

		if (!empty($email) && is_email($email)) {
			global $wpdb;
			$table_name = $wpdb->prefix . 'custom_emails';
			$data = array('email' => $email);
			$format = array('%s');
			$wpdb->insert($table_name, $data, $format);

			// Send a success message
			echo 'Email added.';
		} else {
			echo 'Check email email.';
		}
	} else {
		echo 'Please fill out the form.';
	}

	wp_die();
}

add_action('wp_ajax_process_news_form', 'process_news_form');
add_action('wp_ajax_nopriv_process_news_form', 'process_news_form');

function export_custom_emails()
{
	global $wpdb;
	$table_name = $wpdb->prefix . 'custom_emails';

	$data = $wpdb->get_results("SELECT email FROM $table_name", ARRAY_A);

	if (!empty($data)) {

		$filename = 'custom_emails_export.csv';
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment; filename="' . $filename . '"');

		$output = fopen('php://output', 'w');

		fputcsv($output, array('Email'));

		foreach ($data as $row) {
			fputcsv($output, $row);
		}

		fclose($output);

		exit;
	} else {
		echo 'Нет данных для экспорта.';
	}
}

add_action('wp_ajax_export_custom_emails', 'export_custom_emails');
add_action('wp_ajax_nopriv_export_custom_emails', 'export_custom_emails');

function delete_email()
{	
	if (current_user_can('administrator')) {
		if (isset($_POST['email_id'])) {
			$email_id = sanitize_email($_POST['email_id']);
			global $wpdb;
			$table_name = $wpdb->prefix . 'custom_emails';
			$existing_email = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE email = %s", $email_id));

			if ($existing_email) {
				// Удаляем запись из базы данных
				$result = $wpdb->delete($table_name, array('email' => $email_id), array('%s'));

				if ($result) {
					echo 'Email deleted successfully';
				} else {
					echo 'Error deleting email';
				}
			} else {
				echo 'Email not found';
			}
		} else {
			echo 'Email ID not provided';
		}
	} else {
		echo 'You do not have permission to delete emails';
	}
	wp_die();
}
add_action('wp_ajax_delete_email', 'delete_email');
add_action('wp_ajax_nopriv_delete_email', 'delete_email'); // Если вам нужно обрабатывать запросы от неавторизованных пользователей
add_action('admin_post_download_custom_emails', 'download_custom_emails');
add_action('admin_post_nopriv_download_custom_emails', 'download_custom_emails');

function download_custom_emails() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'custom_emails';

    $data = $wpdb->get_results("SELECT email FROM $table_name", ARRAY_A);

    if (!empty($data)) {
        $filename = 'custom_emails_export.csv';

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $output = fopen('php://output', 'w');

        fputcsv($output, array('Email'));

        foreach ($data as $row) {
            fputcsv($output, $row);
        }

        fclose($output);

        exit;
    } else {
        echo 'No data to export.';
    }
}


function add_srcset_to_images($attr, $attachment, $size) {
    // Получаем URL и размер оригинального изображения
    $image_url = wp_get_attachment_url($attachment->ID); // Используем объект $attachment
    $image_size = getimagesize($image_url);

    // Проверяем, что изображение имеет ширину и высоту
    if ($image_size && isset($image_size[0]) && isset($image_size[1])) {
        // Формируем строку для атрибута srcset
        $srcset = $image_url . ' ' . $image_size[0] . 'w';

        // Добавляем атрибут srcset
        $attr['srcset'] = $srcset;
    }

    return $attr;
}

add_filter('wp_get_attachment_image_attributes', 'add_srcset_to_images', 10, 3);
