<?php
/**
 * progression Theme Customizer
 *
 * @package progression
 */

function progression_studios_add_tab_to_panel( $tabs ) {
	
   $tabs['progression-studios-navigation-font'] = array(
       'name'        => 'progression-studios-navigation-font',
       'panel'       => 'progression_studios_header_panel',
       'title'       => esc_html__('Navigation', 'ratency-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
   $tabs['progression-studios-sub-navigation-font'] = array(
       'name'        => 'progression-studios-sub-navigation-font',
       'panel'       => 'progression_studios_header_panel',
       'title'       => esc_html__('Sub-Navigation', 'ratency-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	
   $tabs['progression-studios-top-header-font'] = array(
       'name'        => 'progression-studios-top-header-font',
       'panel'       => 'progression_studios_header_panel',
       'title'       => esc_html__('Top Header Options', 'ratency-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	
   $tabs['progression-studios-body-font'] = array(
       'name'        => 'progression-studios-body-font',
       'panel'       => 'progression_studios_body_panel',
       'title'       => esc_html__('Body Main', 'ratency-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	
   $tabs['progression-studios-page-title'] = array(
       'name'        => 'progression-studios-page-title',
       'panel'       => 'progression_studios_body_panel',
       'title'       => esc_html__('Page Title', 'ratency-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
   $tabs['progression-studios-widgets-font'] = array(
       'name'        => 'progression-studios-widgets-font',
       'panel'       => 'progression_studios_footer_panel',
       'title'       => esc_html__('Footer Main', 'ratency-progression'),
       'description' => '',
       'sections'    => array(),
   );
	


   $tabs['progression-studios-footer-nav-font'] = array(
       'name'        => 'progression-studios-footer-nav-font',
       'panel'       => 'progression_studios_footer_panel',
       'title'       => esc_html__('Footer Navigation', 'ratency-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	
	
	
   $tabs['progression-studios-default-headings'] = array(
       'name'        => 'progression-studios-default-headings',
       'panel'       => 'progression_studios_body_panel',
       'title'       => esc_html__('H1-H6 Headings', 'ratency-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	
  
	
   $tabs['progression-studios-sidebar-headings'] = array(
       'name'        => 'progression-studios-sidebar-headings',
       'panel'       => 'progression_studios_body_panel',
       'title'       => esc_html__('Sidebar Options', 'ratency-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
   $tabs['progression-studios-button-typography'] = array(
       'name'        => 'progression-studios-button-typography',
       'panel'       => 'progression_studios_body_panel',
       'title'       => esc_html__('Button/Input Styles', 'ratency-progression'),
       'description' => '',
       'sections'    => array(),
   );
	


	
   $tabs['progression-studios-blog-headings'] = array(
       'name'        => 'progression-studios-blog-headings',
       'panel'       => 'progression_studios_blog_panel',
       'title'       => esc_html__('Blog Default Styles', 'ratency-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	$tabs['progression-studios-blog-overlay-headings'] = array(
       'name'        => 'progression-studios-blog-overlay-headings',
       'panel'       => 'progression_studios_blog_panel',
       'title'       => esc_html__('Blog Overlay Styles', 'ratency-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
   $tabs['progression-studios-blog-post-options'] = array(
       'name'        => 'progression-studios-blog-post-options',
       'panel'       => 'progression_studios_blog_panel',
       'title'       => esc_html__('Blog Post Options', 'ratency-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
   $tabs['progression-studios-blog-post-styles'] = array(
       'name'        => 'progression-studios-blog-post-styles',
       'panel'       => 'progression_studios_blog_panel',
       'title'       => esc_html__('Blog Post Styles', 'ratency-progression'),
       'description' => '',
       'sections'    => array(),
   );
	

	
    // Return the tabs.
    return $tabs;
}
add_filter( 'tt_font_get_settings_page_tabs', 'progression_studios_add_tab_to_panel' );

/**
 * How to add a font control to your tab
 *
 * @see  parse_font_control_array() - in class EGF_Register_Options
 *       in includes/class-egf-register-options.php to see the full
 *       properties you can add for each font control.
 *
 *
 * @param   array $controls - Existing Controls.
 * @return  array $controls - Controls with controls added/removed.
 *
 * @since 1.0
 * @version 1.0
 *
 */
function progression_studios_add_control_to_tab( $controls ) {

    /**
     * 1. Removing default styles because we add-in our own
     */
    unset( $controls['tt_default_body'] );
    unset( $controls['tt_default_heading_1'] );
    unset( $controls['tt_default_heading_2'] );
    unset( $controls['tt_default_heading_3'] );
    unset( $controls['tt_default_heading_4'] );
    unset( $controls['tt_default_heading_5'] );
    unset( $controls['tt_default_heading_6'] );
	 
	 
    /**
     * 2. Now custom examples that are theme specific
     */
	 
	
    $controls['progression_studios_body_font_family'] = array(
        'name'       => 'progression_studios_body_font_family',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Body Font', 'ratency-progression'),
        'tab'        => 'progression-studios-body-font',
        'properties' => array( 'selector'   => 'body,  body input, body textarea, select' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
    $controls['progression_studios_heading_h1'] = array(
        'name'       => 'progression_studios_heading_h1',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 1', 'ratency-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h1' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	
    $controls['progression_studios_heading_h2'] = array(
        'name'       => 'progression_studios_heading_h2',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 2', 'ratency-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h2' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	
    $controls['progression_studios_heading_h3'] = array(
        'name'       => 'progression_studios_heading_h3',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 3', 'ratency-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h3' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	
    $controls['progression_studios_heading_h4'] = array(
        'name'       => 'progression_studios_heading_h4',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 4', 'ratency-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h4' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
    $controls['progression_studios_heading_h5'] = array(
        'name'       => 'progression_studios_heading_h5',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 5', 'ratency-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h5' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
    $controls['progression_studios_heading_h6'] = array(
        'name'       => 'progression_studios_heading_h6',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 6', 'ratency-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h6' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
	 
	 
    $controls['progression_studios_page_title_font_family'] = array(
        'name'       => 'progression_studios_page_title_font_family',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Page Title Font', 'ratency-progression'),
        'tab'        => 'progression-studios-page-title',
        'properties' => array( 'selector'   => '#page-title-pro h1' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
    $controls['progression_studios_page_sub_title_font_family'] = array(
        'name'       => 'progression_studios_page_sub_title_font_family',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Page Sub-Title Font', 'ratency-progression'),
        'tab'        => 'progression-studios-page-title',
        'properties' => array( 'selector'   => '#page-title-pro h4' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
	 
	 
    $controls['progression_studios_nav_font_family'] = array(
        'name'       => 'progression_studios_nav_font_family',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Navigation Font Family', 'ratency-progression'),
        'tab'        => 'progression-studios-navigation-font',
        'properties' => array( 'selector'   => '#progression-studios-header-search-icon i.pe-7s-search span, #progression-studios-header-login-container a.progresion-studios-login-icon span, nav#site-navigation, nav#progression-studios-right-navigation' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );

	 
    $controls['progression_studios_sub_nav_font_family'] = array(
        'name'       => 'progression_studios_sub_nav_font_family',
 	'type'        => 'font',
        'title'      =>  esc_html__('Sub-Navigation Font Family', 'ratency-progression'),
        'tab'        => 'progression-studios-sub-navigation-font',
        'properties' => array( 'selector'   => 'ul#progression-studios-panel-login, .sf-menu ul, #main-nav-mobile, ul.mobile-menu-pro li a' ),
 	'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 

	 
	 
    $controls['progression_studios_top_header_default'] = array(
        'name'       => 'progression_studios_top_header_default',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Top Header Font', 'ratency-progression'),
        'tab'        => 'progression-studios-top-header-font',
        'properties' => array( 'selector'   => '#ratency-progression-header-top' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
    $controls['progression_studios_sub_nav_megamenu'] = array(
        'name'       => 'progression_studios_sub_nav_megamenu',
 	'type'        => 'font',
        'title'      =>  esc_html__('Mega Menu Heading', 'ratency-progression'),
        'tab'        => 'progression-studios-sub-navigation-font',
        'properties' => array( 'selector'   => 'body #progression-sticky-header header ul.mobile-menu-pro h2.mega-menu-heading a,
body header ul.mobile-menu-pro .sf-mega h2.mega-menu-heading a, ul.mobile-menu-pro .sf-mega h2.mega-menu-heading a, ul.mobile-menu-pro .sf-mega h2.mega-menu-heading, .sf-mega h2.mega-menu-heading, body #progression-sticky-header header .sf-mega h2.mega-menu-heading a, body header .sf-mega h2.mega-menu-heading a' ),
 	'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 


	 
	 
	 
    $controls['progression_studios_blog_title_font'] = array(
        'name'       => 'progression_studios_blog_title_font',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Title', 'ratency-progression'),
        'tab'        => 'progression-studios-blog-headings',
        'properties' => array( 'selector'   => 'h2.progression-blog-title' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
    $controls['progression_studios_blog_category_post'] = array(
        'name'       => 'progression_studios_blog_category_post',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Post Category', 'ratency-progression'),
        'tab'        => 'progression-studios-blog-headings',
        'properties' => array( 'selector'   => '.blog-meta-category-list a' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
    $controls['progression_studios_blog_category_post_hover'] = array(
        'name'       => 'progression_studios_blog_category_post_hover',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Post Category Hover', 'ratency-progression'),
        'tab'        => 'progression-studios-blog-headings',
        'properties' => array( 'selector'   => '.blog-meta-category-list a:hover' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
    $controls['progression_studios_blog_byline_font'] = array(
        'name'       => 'progression_studios_blog_byline_font',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Post Meta', 'ratency-progression'),
        'tab'        => 'progression-studios-blog-headings',
        'properties' => array( 'selector'   => 'ul.progression-post-meta li, ul.progression-post-meta li a' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
    $controls['progression_studios_blog_byline_link_font_hover'] = array(
        'name'       => 'progression_studios_blog_byline_link_font_hover',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Post Meta Hover', 'ratency-progression'),
        'tab'        => 'progression-studios-blog-headings',
        'properties' => array( 'selector'   => 'ul.progression-post-meta li a:hover' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
    $controls['progression_studios_blog_exceprt'] = array(
        'name'       => 'progression_studios_blog_exceprt',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Index Excerpt', 'ratency-progression'),
        'tab'        => 'progression-studios-blog-headings',
        'properties' => array( 'selector'   => '.progression-studios-blog-excerpt' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
	 
	 
	 
    $controls['progression_studios_blog_title_overlay_font'] = array(
        'name'       => 'progression_studios_blog_title_overlay_font',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Title', 'ratency-progression'),
        'tab'        => 'progression-studios-blog-overlay-headings',
        'properties' => array( 'selector'   => 'h2.overlay-progression-blog-title' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
    $controls['progression_studios_blog_category_overlay_post'] = array(
        'name'       => 'progression_studios_blog_category_overlay_post',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Post Category', 'ratency-progression'),
        'tab'        => 'progression-studios-blog-overlay-headings',
        'properties' => array( 'selector'   => '.overlay-blog-meta-category-list a, .related-overlay-blog-meta-category-list span' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
    $controls['progression_studios_blog_category_overlay_post_hover'] = array(
        'name'       => 'progression_studios_blog_category_overlay_post_hover',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Post Category Hover', 'ratency-progression'),
        'tab'        => 'progression-studios-blog-overlay-headings',
        'properties' => array( 'selector'   => '.overlay-blog-meta-category-list a:hover' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
    $controls['progression_studios_blog_overlay_byline_font'] = array(
        'name'       => 'progression_studios_blog_overlay_byline_font',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Post Meta', 'ratency-progression'),
        'tab'        => 'progression-studios-blog-overlay-headings',
        'properties' => array( 'selector'   => 'ul.progression-studio-overlay-post-meta li' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 

	 
    $controls['progression_studios_blog_overlay_exceprt'] = array(
        'name'       => 'progression_studios_blog_overlay_exceprt',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Index Excerpt', 'ratency-progression'),
        'tab'        => 'progression-studios-blog-overlay-headings',
        'properties' => array( 'selector'   => '.overlay-progression-studios-excerpt p' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
    
	 
    $controls['progression_studios_sidebar_heading'] = array(
        'name'       => 'progression_studios_sidebar_heading',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Sidebar Heading', 'ratency-progression'),
        'tab'        => 'progression-studios-sidebar-headings',
        'properties' => array( 'selector'   => '.sidebar h4.widget-title, .sidebar h2.widget-title' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
	 
    $controls['progression_studios_sidebar_default'] = array(
        'name'       => 'progression_studios_sidebar_default',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Sidebar Default Text', 'ratency-progression'),
        'tab'        => 'progression-studios-sidebar-headings',
        'properties' => array( 'selector'   => '.sidebar' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
	 
    $controls['progression_studios_sidebar_link'] = array(
        'name'       => 'progression_studios_sidebar_link',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Sidebar Default Link', 'ratency-progression'),
        'tab'        => 'progression-studios-sidebar-headings',
        'properties' => array( 'selector'   => '.sidebar a' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
    $controls['progression_studios_sidebar_link_hover'] = array(
        'name'       => 'progression_studios_sidebar_link_hover',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Sidebar Link Hover', 'ratency-progression'),
        'tab'        => 'progression-studios-sidebar-headings',
        'properties' => array( 'selector'   => '.sidebar ul li.current-cat, .sidebar ul li.current-cat a, .sidebar a:hover' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
	 
	 
	 
    $controls['progression_studios_button_font_family'] = array(
        'name'       => 'progression_studios_button_font_family',
 	'type'        => 'font',
        'title'      =>  esc_html__('Button Font Family', 'ratency-progression'),
        'tab'        => 'progression-studios-button-typography',
        'properties' => array( 'selector'   => '#reward_options input.button, input.wpneo-submit-campaign, input#wpneo_active_edit_form, .wpneo-buttons-group button#wpneo-edit, .wpneo-buttons-group button#wpneo-dashboard-btn-cancel, .wpneo-buttons-group button#wpneo-password-save, .wpneo-buttons-group button#wpneo-dashboard-save, .wpneo-buttons-group button#wpneo-contact-save, .wpneo-buttons-group button#wpneo-profile-save, button.wpneo_donate_button, .tagcloud a, body .woocommerce nav.woocommerce-MyAccount-navigation li.is-active a, .post-password-form input[type=submit], #respond input.submit, .wpcf7-form input.wpcf7-submit, #boxed-layout-pro .woocommerce .shop_table input.button, #boxed-layout-pro .form-submit input#submit, #boxed-layout-pro input.button, #boxed-layout-pro #customer_login input.button, #boxed-layout-pro .woocommerce-checkout-payment input.button, #boxed-layout-pro button.button, #boxed-layout-pro a.button' ),
 	'default' => array(
		'subset'                     => 'latin',
		'text_decoration'            => 'none',
 		),
    );
    
	 
	 
	 
	 
	 
	 
	 
	 
    $controls['progression_studios_post_title'] = array(
        'name'       => 'progression_studios_post_title',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Post Title', 'ratency-progression'),
        'tab'        => 'progression-studios-blog-post-options',
        'properties' => array( 'selector'   => '#progression-studios-post-page-title h1' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
    $controls['progression_studios_post_sub_title'] = array(
        'name'       => 'progression_studios_post_sub_title',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Post Sub-title', 'ratency-progression'),
        'tab'        => 'progression-studios-blog-post-options',
        'properties' => array( 'selector'   => '#progression-studios-post-page-title h4' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
	 
    $controls['progression_studios_post_cat'] = array(
        'name'       => 'progression_studios_post_cat',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Post Category', 'ratency-progression'),
        'tab'        => 'progression-studios-blog-post-options',
        'properties' => array( 'selector'   => '#progression-studios-post-category a' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
    $controls['progression_studios_post_cat_hover'] = array(
        'name'       => 'progression_studios_post_cat_hover',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Post Category Hover', 'ratency-progression'),
        'tab'        => 'progression-studios-blog-post-options',
        'properties' => array( 'selector'   => '#progression-studios-post-category a:hover' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
	 
    $controls['progression_studios_post_meta'] = array(
        'name'       => 'progression_studios_post_meta',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Post Meta', 'ratency-progression'),
        'tab'        => 'progression-studios-blog-post-options',
        'properties' => array( 'selector'   => 'ul.progression-studios-single-post-meta li a, ul.progression-studios-single-post-meta li' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
	 
	 
    $controls['progression_studios_postreview_title'] = array(
        'name'       => 'progression_studios_postreview_title',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Review Title', 'ratency-progression'),
        'tab'        => 'progression-studios-blog-post-options',
        'properties' => array( 'selector'   => '.progression-blog-review-content h2' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
    
	 
	 
	 
	// Return the controls.
    return $controls;
}
add_filter( 'tt_font_get_option_parameters', 'progression_studios_add_control_to_tab' );