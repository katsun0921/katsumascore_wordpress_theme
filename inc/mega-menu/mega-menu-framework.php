<?php
/**
 * Porgression MegaMenu Functions
 *
 * WARNING: This file is part of the Mega Menu Framework.
 * Do not edit the core files.
 * Add any modifications necessary under a child theme.
 */

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
	die;
}

// Don't duplicate me!
if( ! class_exists( 'ProgressionMegaMenuFramework' ) ) {

    /**
     * Main ProgressionMegaMenuFramework Class
     *
     * @since       1.0.0
     */
    class ProgressionMegaMenuFramework {

        public static $_version = '1.0.0';
        public static $_name;

        public static $_url;
        public static $_urls;
        public static $_dir;
        public static $_dirs;

        public static $_classes;

        function __construct() {

        	$this->init();

        	add_action( 'progression_studios_init', 				array( $this, 'include_functions' ) );
        	do_action( 'progression_studios_init' );

        } // end __construct()

		static function init() {

			// Windows-proof constants: replace backward by forward slashes. Thanks to: @peterbouwmeester
			$wp_content_dir = trailingslashit( str_replace( '\\', '/', WP_CONTENT_DIR ) );
			$relative_url   = str_replace( $wp_content_dir, '', self::$_dir );
			$wp_content_url = ( is_ssl() ? str_replace( 'http://', 'https://', WP_CONTENT_URL ) : WP_CONTENT_URL );
			self::$_url     = trailingslashit( $wp_content_url ) . $relative_url;

			self::$_urls = array(
				'parent'	=> get_template_directory_uri() . '/',
				'child' 	=> get_stylesheet_directory() . '/',
				'framework'	=> self::$_url . 'framework',
			);

			self::$_urls['admin-js'] = self::$_urls['parent'] . 'admin/assets/js';
			self::$_urls['admin-css'] = self::$_urls['parent'] . 'admin/assets/css';

			self::$_dirs = array(
				'parent' 	=> get_template_directory() . '/',
				'child' 	=> get_stylesheet_directory() . '/',
			);

        } // end init()


        public function include_functions() {


			// Load functions
			get_template_part('inc/mega-menu/mega', 'menus');
			
			
			self::$_classes['menus'] = new ProgressionMegaMenu();


        } // end include_functions()




	}

	$progressioncore = new ProgressionMegaMenuFramework();

}