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





   $tabs['progression-studios-button-typography'] = array(
       'name'        => 'progression-studios-button-typography',
       'panel'       => 'progression_studios_body_panel',
       'title'       => esc_html__('Button/Input Styles', 'ratency-progression'),
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
        'properties' => array( 'selector'   => '.progression-studios-single-post-meta li' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );


	// Return the controls.
    return $controls;
}
add_filter( 'tt_font_get_option_parameters', 'progression_studios_add_control_to_tab' );
