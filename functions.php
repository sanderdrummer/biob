<?php
/**
 * Biob functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Biob
 */

if ( ! function_exists( 'biob_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function biob_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Biob, use a find and replace
	 * to change 'biob' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'biob', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'biob' ),
		'menu-2' => esc_html__( 'Footer', 'biob' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'biob_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'biob_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function biob_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'biob_content_width', 640 );
}
add_action( 'after_setup_theme', 'biob_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function biob_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'biob' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'biob' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
// add_action( 'widgets_init', 'biob_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function biob_scripts() {
	// wp_enqueue_style( 'biob-style', get_stylesheet_uri() );
    wp_enqueue_style( 'bundle', get_template_directory_uri() . '/dist/bundle.css',false,'1.1','all');

	// wp_enqueue_script( 'biob-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
    //
	// wp_enqueue_script( 'biob-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
    //
	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action( 'wp_enqueue_scripts', 'biob_scripts' );


class Bootstrap_Nav_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent\n";
    }

    function end_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $class_names = $value = '';
        $classes = empty($item->classes) ? array() : (array)$item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? esc_attr($class_names) : '';

        if ( in_array( 'current-menu-item', $classes ) )
            $class_names .= ' is-active';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '';
        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        $item_output = $args->before;
        $item_output .= '<a class="nav-item ' . $class_names  . '"' . $attributes . '>';
        $item_output .= $args->link_before . $item->title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    function end_el(&$output, $item, $depth = 0, $args = array())
    {
        $output .= "\n";
    }
}

add_filter( 'post_thumbnail_html', 'remove_thumbnail_width_height', 10, 5 );

function remove_thumbnail_width_height( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

function add_post_formats() {
    add_theme_support( 'post-formats', array( 'blog','gallery', 'quote', 'video', 'aside', 'image', 'link' ) );
}

add_action( 'after_setup_theme', 'add_post_formats', 20 );

// remove emjois
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
function my_deregister_scripts(){
    wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );



function get_breadcrumb() {
    echo '<div class="breadcrumbs">';
    if (is_category() || is_single()) {
        echo '<span class="tag">';
        the_category(' &bull; ');
        echo '</span>';
        if (is_single()) {
            echo '<span class="tag is-primary">';
            the_title();
            echo '</span>';
        }
    } elseif (is_page()) {
        echo '<span class="tag is-primary">';

        echo the_title();
        echo '</span>';
    } elseif (is_search()) {
        echo '<span class="tag is-primary">';
        echo the_search_query();
        echo '</span>';
    }
    echo '</div>';
}