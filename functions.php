<?php
/**
 * progression functions and definitions
 *
 * @package progression
 * @since progression 1.0
 */


if ( ! function_exists( 'progression_studios_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since progression 1.0
 */

function progression_studios_setup() {

	// Post Thumbnails
	add_theme_support( 'post-thumbnails' );

	add_image_size('progression-studios-blog-index', 900, 475, true);
	add_image_size('progression-studios-blog-background', 900, 900, false);
	add_image_size('progression-studios-blog-left-align', 700, 460, true);
	add_image_size('progression-studios-slider-thumb', 300, 200, true);


	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on pro, use a find and replace
	 * to change 'ratency-progression' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'ratency-progression', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio', 'quote', 'link', 'image' ) );


	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'progression-studios-primary' => esc_html__( 'Primary Menu', 'ratency-progression' ),
		'progression-studios-mobile-menu' => esc_html__( 'Mobile Primary Menu', 'ratency-progression' ),
	) );



}
endif; // progression_studios_setup
add_action( 'after_setup_theme', 'progression_studios_setup' );



/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since pro 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = esc_attr( get_theme_mod('progression_studios_site_width', '1200') ); /* pixels */


/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since pro 1.0
 */
function progression_studios_widgets_init() {
	register_sidebar( array(
		'name' => esc_html__( 'Post Widget Sidebar', 'ratency-progression' ),
		'description'   => esc_html__('Widget area at the right side of posts', 'ratency-progression'),
		'id' => 'progression-studios-post-widget-sidebar',
		'before_widget' => '<div id="%1$s" class="c-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );


	register_sidebar( array(
		'name' => esc_html__( 'Post Widget Area Top', 'ratency-progression' ),
		'description' => esc_html__( 'Widget area at the top of posts', 'ratency-progression' ),
		'id' => 'progression-studios-post-widgets-top',
		'before_widget' => '<div id="%1$s" class="c-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Post Widget Area Bottom', 'ratency-progression' ),
		'description' => esc_html__( 'Widget area at the bottom of posts', 'ratency-progression' ),
		'id' => 'progression-studios-post-widgets-bottom',
		'before_widget' => '<div id="%1$s" class="c-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'progression_studios_widgets_init' );




/**
 * Enqueue scripts and styles
 */
function progression_studios_scripts() {
	wp_enqueue_style(  'ratency-progression-style', get_stylesheet_uri());
	wp_enqueue_script( 'ratency-progression-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'scrolltofixed', get_template_directory_uri() . '/js/scrolltofixed.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/flexslider.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'ratency-progression-masonry', get_template_directory_uri() . '/js/masonry.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'ratency-progression-bundle', get_template_directory_uri() . '/js/bundle.js');
	wp_enqueue_style( 'katsumascore-style-build', get_template_directory_uri() . '/css/all.css');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_action( 'wp_enqueue_scripts', 'progression_studios_scripts' );


function progression_studios_demo_after_import_setup() {
	// Assign menus to their locations.
	$progession_studios_main_menu = get_term_by( 'name', 'Main Navigation', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'progression-studios-primary' => $progession_studios_main_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Latest news' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'progression_studios_demo_after_import_setup' );

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

/**
 * Custom Editor Settings
 */
function custom_enqueue_scripts($hook) {
    // Only add to the edit.php admin page.
    // See WP docs.
    if ('post.php' === $hook) {
      wp_enqueue_script( 'my-custom-script', get_template_directory_uri() . '/js/edit-post.js');
      wp_enqueue_style( 'my-custom-script', get_template_directory_uri() . '/css/edit-post.css' );
    }
}
add_action('admin_enqueue_scripts', 'custom_enqueue_scripts');

function my_redirect() {
    /* 著者アーカイブのリダイレクト */
    if ( is_author() ){
        wp_safe_redirect( home_url() );
        exit;
    }
}
add_action( 'template_redirect', 'my_redirect', 1);

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Theme Customizer
 */
require get_template_directory() . '/inc/default-customizer.php';

/**
 * Theme Customizer
 */
require get_template_directory() . '/inc/mega-menu/mega-menu-framework.php';



/**
 * Elementor Page Builder Functions
 */
require get_template_directory() . '/inc/elementor-functions.php';



/**
 * Load Plugin prohibitionation
 */
require get_template_directory() . '/inc/tgm-plugin-activation/plugin-activation.php';