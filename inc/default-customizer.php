<?php

/**
 * Progression Theme Customizer
 *
 * @package pro
 */

get_template_part('inc/customizer/new', 'controls');
get_template_part('inc/customizer/typography', 'controls');
get_template_part('inc/customizer/alpha', 'control'); // New Alpha Control



/* Remove Default Theme Customizer Panels that aren't useful */
function progression_studios_change_default_customizer_panels($wp_customize)
{
	$wp_customize->remove_section("themes"); //Remove Active Theme + Theme Changer
	$wp_customize->remove_section("static_front_page"); // Remove Front Page Section
}
add_action("customize_register", "progression_studios_change_default_customizer_panels");


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function progression_studios_customize_preview_js()
{
	wp_enqueue_script('progression_studios_customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'progression_studios_customize_preview_js');


function progression_studios_customizer($wp_customize)
{


	/* Panel - General */
	$wp_customize->add_panel(
		'progression_studios_general_panel',
		array(
			'priority'    => 3,
			'title'       => esc_html__('General', 'ratency-progression'),
		)
	);


	/* Section - General - General Layout */
	$wp_customize->add_section(
		'progression_studios_section_general_layout',
		array(
			'title'          => esc_html__('General Options', 'ratency-progression'),
			'panel'          => 'progression_studios_general_panel', // Not typically needed.
			'priority'       => 10,
		)
	);



	/* Setting - General - General Layout */
	$wp_customize->add_setting('progression_studios_site_width', array(
		'default' => '1200',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_site_width', array(
			'label'    => esc_html__('Site Width(px)', 'ratency-progression'),
			'section' => 'progression_studios_section_general_layout',
			'priority'   => 15,
			'choices'     => array(
				'min'  => 961,
				'max'  => 4500,
				'step' => 1
			),
		))
	);


	/* Setting - Header - Header Options */
	$wp_customize->add_setting('progression_studios_select_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_select_color', array(
			'label'    => esc_html__('Mouse Selection Color', 'ratency-progression'),
			'section'  => 'progression_studios_section_general_layout',
			'priority'   => 20,
		))
	);

	/* Setting - Header - Header Options */
	$wp_customize->add_setting('progression_studios_select_bg', array(
		'default'	=> '#5c39f2',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_select_bg', array(
			'default'	=> '#5c39f2',
			'label'    => esc_html__('Mouse Selection Background', 'ratency-progression'),
			'section'  => 'progression_studios_section_general_layout',
			'priority'   => 25,
		))
	);









	/* Setting - General - General Layout */
	$wp_customize->add_setting('progression_studios_lightbox_caption', array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_lightbox_caption', array(
			'label'    => esc_html__('Lightbox Captions', 'ratency-progression'),
			'section' => 'progression_studios_section_general_layout',
			'priority'   => 100,
			'choices'     => array(
				'on' => esc_html__('On', 'ratency-progression'),
				'off' => esc_html__('Off', 'ratency-progression'),
			),
		))
	);

	/* Setting - General - General Layout */
	$wp_customize->add_setting('progression_studios_lightbox_play', array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_lightbox_play', array(
			'label'    => esc_html__('Lightbox Gallery Play/Pause', 'ratency-progression'),
			'section' => 'progression_studios_section_general_layout',
			'priority'   => 110,
			'choices'     => array(
				'on' => esc_html__('On', 'ratency-progression'),
				'off' => esc_html__('Off', 'ratency-progression'),
			),
		))
	);


	/* Setting - General - General Layout */
	$wp_customize->add_setting('progression_studios_lightbox_count', array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_lightbox_count', array(
			'label'    => esc_html__('Lightbox Gallery Count', 'ratency-progression'),
			'section' => 'progression_studios_section_general_layout',
			'priority'   => 150,
			'choices'     => array(
				'on' => esc_html__('On', 'ratency-progression'),
				'off' => esc_html__('Off', 'ratency-progression'),
			),
		))
	);








	/* Section - General - Page Loader */
	$wp_customize->add_section(
		'progression_studios_section_page_transition',
		array(
			'title'          => esc_html__('Page Loader', 'ratency-progression'),
			'panel'          => 'progression_studios_general_panel', // Not typically needed.
			'priority'       => 26,
		)
	);

	/* Setting - General - Page Loader */
	$wp_customize->add_setting('progression_studios_page_transition', array(
		'default' => 'transition-off-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_page_transition', array(
			'label'    => esc_html__('Display Page Loader?', 'ratency-progression'),
			'section' => 'progression_studios_section_page_transition',
			'priority'   => 10,
			'choices'     => array(
				'transition-on-pro' => esc_html__('On', 'ratency-progression'),
				'transition-off-pro' => esc_html__('Off', 'ratency-progression'),
			),
		))
	);

	/* Setting - General - Page Loader */
	$wp_customize->add_setting('progression_studios_transition_loader', array(
		'default' => 'circle-loader-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		'progression_studios_transition_loader',
		array(
			'label'    => esc_html__('Page Loader Animation', 'ratency-progression'),
			'section' => 'progression_studios_section_page_transition',
			'type' => 'select',
			'priority'   => 15,
			'choices' => array(
				'circle-loader-pro' => esc_html__('Circle Loader Animation', 'ratency-progression'),
				'cube-grid-pro' => esc_html__('Cube Grid Animation', 'ratency-progression'),
				'rotating-plane-pro' => esc_html__('Rotating Plane Animation', 'ratency-progression'),
				'double-bounce-pro' => esc_html__('Doube Bounce Animation', 'ratency-progression'),
				'sk-rectangle-pro' => esc_html__('Rectangle Animation', 'ratency-progression'),
				'sk-cube-pro' => esc_html__('Wandering Cube Animation', 'ratency-progression'),
				'sk-chasing-dots-pro' => esc_html__('Chasing Dots Animation', 'ratency-progression'),
				'sk-circle-child-pro' => esc_html__('Circle Animation', 'ratency-progression'),
				'sk-folding-cube' => esc_html__('Folding Cube Animation', 'ratency-progression'),

			),
		)
	);





	/* Setting - General - Page Loader */
	$wp_customize->add_setting('progression_studios_page_loader_text', array(
		'default' => '#cccccc',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_page_loader_text', array(
			'label'    => esc_html__('Page Loader Color', 'ratency-progression'),
			'section'  => 'progression_studios_section_page_transition',
			'priority'   => 30,
		))
	);

	/* Setting - General - Page Loader */
	$wp_customize->add_setting('progression_studios_page_loader_secondary_color', array(
		'default' => '#ededed',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_page_loader_secondary_color', array(
			'label'    => esc_html__('Page Loader Secondary (Circle Loader)', 'ratency-progression'),
			'section'  => 'progression_studios_section_page_transition',
			'priority'   => 31,
		))
	);


	/* Setting - General - Page Loader */
	$wp_customize->add_setting('progression_studios_page_loader_bg', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_page_loader_bg', array(
			'label'    => esc_html__('Page Loader Background', 'ratency-progression'),
			'section'  => 'progression_studios_section_page_transition',
			'priority'   => 35,
		))
	);









	/* Section - Footer - Scroll To Top */
	$wp_customize->add_section('progression_studios_section_scroll', array(
		'title'          => esc_html__('Scroll To Top Button', 'ratency-progression'),
		'panel'          => 'progression_studios_general_panel', // Not typically needed.
		'priority'       => 100,
	));

	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting('progression_studios_pro_scroll_top', array(
		'default' => 'scroll-on-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_pro_scroll_top', array(
		'label'    => esc_html__('Scroll To Top Button', 'ratency-progression'),
		'section'  => 'progression_studios_section_scroll',
		'priority'   => 10,
		'choices'     => array(
			'scroll-on-pro' => esc_html__('On', 'ratency-progression'),
			'scroll-off-pro' => esc_html__('Off', 'ratency-progression'),
		),
	)));

	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting(
		'progression_studios_scroll_color',
		array(
			'default' => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_scroll_color', array(
			'label'    => esc_html__('Color', 'ratency-progression'),
			'section'  => 'progression_studios_section_scroll',
			'priority'   => 15,
		))
	);


	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting(
		'progression_studios_scroll_bg_color',
		array(
			'default' => 'rgba(100,100,100,  0.65)',
			'sanitize_callback' => 'progression_studios_sanitize_choices',
		)
	);
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_scroll_bg_color', array(
			'default' => 'rgba(100,100,100,  0.65)',
			'label'    => esc_html__('Background', 'ratency-progression'),
			'section'  => 'progression_studios_section_scroll',
			'priority'   => 20,
		))
	);



	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting('progression_studios_scroll_hvr_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_scroll_hvr_color', array(
			'label'    => esc_html__('Hover Arrow Color', 'ratency-progression'),
			'section'  => 'progression_studios_section_scroll',
			'priority'   => 30,
		))
	);

	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting('progression_studios_scroll_hvr_bg_color', array(
		'default' => '#5c39f2',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_scroll_hvr_bg_color', array(
			'default' => '#5c39f2',
			'label'    => esc_html__('Hover Arrow Background', 'ratency-progression'),
			'section'  => 'progression_studios_section_scroll',
			'priority'   => 40,
		))
	);









	/* Panel - Header */
	$wp_customize->add_panel(
		'progression_studios_header_panel',
		array(
			'priority'    => 5,
			'title'       => esc_html__('Header', 'ratency-progression'),
		)
	);


	/* Section - General - Site Logo */
	$wp_customize->add_section(
		'progression_studios_section_logo',
		array(
			'title'          => esc_html__('Logo', 'ratency-progression'),
			'panel'          => 'progression_studios_header_panel', // Not typically needed.
			'priority'       => 10,
		)
	);

	/* Setting - General - Site Logo */
	$wp_customize->add_setting('progression_studios_theme_logo', array(
		'default' => get_template_directory_uri() . '/images/logo.png',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(
		new WP_Customize_Image_Control($wp_customize, 'progression_studios_theme_logo', array(
			'section' => 'progression_studios_section_logo',
			'priority'   => 10,
		))
	);

	/* Setting - General - Site Logo */
	$wp_customize->add_setting('progression_studios_theme_logo_width', array(
		'default' => '160',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_theme_logo_width', array(
			'label'    => esc_html__('Logo Width (px)', 'ratency-progression'),
			'section'  => 'progression_studios_section_logo',
			'priority'   => 15,
			'choices'     => array(
				'min'  => 0,
				'max'  => 1200,
				'step' => 1
			),
		))
	);

	/* Setting - General - Site Logo */
	$wp_customize->add_setting('progression_studios_theme_logo_margin_top', array(
		'default' => '35',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_theme_logo_margin_top', array(
			'label'    => esc_html__('Logo Margin Top (px)', 'ratency-progression'),
			'section'  => 'progression_studios_section_logo',
			'priority'   => 20,
			'choices'     => array(
				'min'  => 0,
				'max'  => 250,
				'step' => 1
			),
		))
	);

	/* Setting - General - Site Logo */
	$wp_customize->add_setting('progression_studios_theme_logo_margin_bottom', array(
		'default' => '32',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_theme_logo_margin_bottom', array(
			'label'    => esc_html__('Logo Margin Bottom (px)', 'ratency-progression'),
			'section'  => 'progression_studios_section_logo',
			'priority'   => 25,
			'choices'     => array(
				'min'  => 0,
				'max'  => 250,
				'step' => 1
			),
		))
	);



	/* Setting - General - Site Logo */
	$wp_customize->add_setting('progression_studios_logo_position', array(
		'default' => 'progression-studios-logo-position-left',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_logo_position', array(
			'label'    => esc_html__('Logo Position', 'ratency-progression'),
			'section'  => 'progression_studios_section_logo',
			'priority'   => 50,
			'choices'     => array(
				'progression-studios-logo-position-left' => esc_html__('Left', 'ratency-progression'),
				'progression-studios-logo-position-center' => esc_html__('Center', 'ratency-progression'),
				'progression-studios-logo-position-right' => esc_html__('Right', 'ratency-progression'),
			),
		))
	);



	/* Section - Header - Header Options */
	$wp_customize->add_section(
		'progression_studios_section_header_bg',
		array(
			'title'          => esc_html__('Header Options', 'ratency-progression'),
			'panel'          => 'progression_studios_header_panel', // Not typically needed.
			'priority'       => 20,
		)
	);


	/* Setting - Header - Header Options */
	$wp_customize->add_setting('progression_studios_header_width', array(
		'default' => 'progression-studios-header-full-width',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_header_width', array(
			'label'    => esc_html__('Header Layout', 'ratency-progression'),
			'section' => 'progression_studios_section_header_bg',
			'priority'   => 10,
			'choices'     => array(
				'progression-studios-header-full-width' => esc_html__('Full Width', 'ratency-progression'),
				//'progression-studios-header-full-width-no-gap' => esc_html__( 'No Gap', 'ratency-progression' ),
				'progression-studios-header-normal-width' => esc_html__('Max Width', 'ratency-progression'),
			),
		))
	);


	/* Setting - Header - Header Options */
	$wp_customize->add_setting('progression_studios_header_background_color', array(
		'default' => '#1e023d',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_header_background_color', array(
			'default' => '#1e023d',
			'label'    => esc_html__('Header Background Color', 'ratency-progression'),
			'section'  => 'progression_studios_section_header_bg',
			'priority'   => 15,
		))
	);




	/* Setting - General - Page Title */
	$wp_customize->add_setting('progression_studios_header_bg_image', array(
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(
		new WP_Customize_Image_Control($wp_customize, 'progression_studios_header_bg_image', array(
			'label'    => esc_html__('Header Background Image', 'ratency-progression'),
			'section' => 'progression_studios_section_header_bg',
			'priority'   => 40,
		))
	);



	/* Setting - Header - Header Options */
	$wp_customize->add_setting('progression_studios_header_bg_image_image_position', array(
		'default' => 'cover',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_header_bg_image_image_position', array(
			'label'    => esc_html__('Image Cover', 'ratency-progression'),
			'section' => 'progression_studios_section_header_bg',
			'priority'   => 50,
			'choices'     => array(
				'cover' => esc_html__('Image Cover', 'ratency-progression'),
				'repeat-all' => esc_html__('Image Pattern', 'ratency-progression'),
			),
		))
	);



	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_search', array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_nav_search', array(
			'label'    => esc_html__('Search in Header', 'ratency-progression'),
			'section' => 'progression_studios_section_header_bg',
			'priority'   => 500,
			'choices'     => array(
				'on' => esc_html__('On', 'ratency-progression'),
				'off' => esc_html__('Off', 'ratency-progression'),
			),
		))
	);

	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_search_colors', array(
		'default' => 'progression-studios-header-search-light',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_nav_search_colors', array(
			'label'    => esc_html__('Search Header Colors', 'ratency-progression'),
			'section' => 'progression_studios_section_header_bg',
			'priority'   => 550,
			'choices'     => array(
				'progression-studios-header-search-light' => esc_html__('Light', 'ratency-progression'),
				'progression-studios-header-search-dark' => esc_html__('Dark', 'ratency-progression'),
			),
		))
	);


	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_search_margin', array(
		'default' => '32',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_nav_search_margin', array(
			'label'    => esc_html__('Search Margin Top', 'ratency-progression'),
			'section' => 'progression_studios_section_header_bg',
			'priority'   => 600,
			'choices'     => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1
			),
		))
	);

	/* Setting - Header - Header Options */
	$wp_customize->add_setting('progression_studios_header_search_mobile', array(
		'default' => 'none',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_header_search_mobile', array(
			'label'    => esc_html__('Display Search on Mobile?', 'ratency-progression'),
			'section' => 'progression_studios_section_header_icons_section',
			'priority'   => 630,
			'choices'     => array(
				'none' => esc_html__('Full Width', 'ratency-progression'),
				'block' => esc_html__('Max Width', 'ratency-progression'),
			),
		))
	);




	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_section(
		'progression_studios_section_mobile_header',
		array(
			'title'          => esc_html__('Tablet/Mobile Header Options', 'ratency-progression'),
			'panel'          => 'progression_studios_header_panel', // Not typically needed.
			'priority'       => 23,
		)
	);




	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting('progression_studios_mobile_header_transparent', array(
		'default' => 'default',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_mobile_header_transparent', array(
			'label'    => esc_html__('Tablet/Mobile Header Transparent', 'ratency-progression'),
			'section'  => 'progression_studios_section_mobile_header',
			'priority'   => 9,
			'choices'     => array(
				'transparent' => esc_html__('Transparent', 'ratency-progression'),
				'default' => esc_html__('Default', 'ratency-progression'),
			),
		))
	);


	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting('progression_studios_mobile_header_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_mobile_header_bg', array(
			'label'    => esc_html__('Tablet/Mobile Background Color', 'ratency-progression'),
			'section'  => 'progression_studios_section_mobile_header',
			'priority'   => 10,
		))
	);


	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting('progression_studios_mobile_menu_text', array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_mobile_menu_text', array(
			'label'    => esc_html__('Display "Menu" text for Menu', 'ratency-progression'),
			'section'  => 'progression_studios_section_mobile_header',
			'priority'   => 11,
			'choices'     => array(
				'on' => esc_html__('Display', 'ratency-progression'),
				'off' => esc_html__('Hide', 'ratency-progression'),
			),
		))
	);



	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting('progression_studios_mobile_top_bar_left', array(
		'default' => 'progression_studios_hide_top_left_bar',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_mobile_top_bar_left', array(
			'label'    => esc_html__('Tablet/Mobile Header Top Left', 'ratency-progression'),
			'section'  => 'progression_studios_section_mobile_header',
			'priority'   => 12,
			'choices'     => array(
				'on-pro' => esc_html__('Display', 'ratency-progression'),
				'progression_studios_hide_top_left_bar' => esc_html__('Hide', 'ratency-progression'),
			),
		))
	);

	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting('progression_studios_mobile_top_bar_right', array(
		'default' => 'progression_studios_hide_top_left_right',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_mobile_top_bar_right', array(
			'label'    => esc_html__('Tablet/Mobile Header Top Right', 'ratency-progression'),
			'section'  => 'progression_studios_section_mobile_header',
			'priority'   => 13,
			'choices'     => array(
				'on-pro' => esc_html__('Display', 'ratency-progression'),
				'progression_studios_hide_top_left_right' => esc_html__('Hide', 'ratency-progression'),
			),
		))
	);



	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting('progression_studios_mobile_header_nav_padding', array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		'progression_studios_mobile_header_nav_padding',
		array(
			'label'    => esc_html__('Tablet/Mobile Nav Padding', 'ratency-progression'),
			'description'    => esc_html__('Optional padding above/below the Navigation. Example: 20', 'ratency-progression'),
			'section' => 'progression_studios_section_mobile_header',
			'type' => 'text',
			'priority'   => 25,
		)
	);


	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting('progression_studios_mobile_header_logo_width', array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		'progression_studios_mobile_header_logo_width',
		array(
			'label'    => esc_html__('Tablet/Mobile Logo Width', 'ratency-progression'),
			'description'    => esc_html__('Optional logo width. Example: 180', 'ratency-progression'),
			'section' => 'progression_studios_section_mobile_header',
			'type' => 'text',
			'priority'   => 30,
		)
	);



	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting('progression_studios_mobile_header_logo_margin', array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		'progression_studios_mobile_header_logo_margin',
		array(
			'label'    => esc_html__('Tablet/Mobile Logo Margin Top/Bottom', 'ratency-progression'),
			'description'    => esc_html__('Optional logo margin. Example: 25', 'ratency-progression'),
			'section' => 'progression_studios_section_mobile_header',
			'type' => 'text',
			'priority'   => 35,
		)
	);






	/* Section - Header - Sticky Header */
	$wp_customize->add_section(
		'progression_studios_section_sticky_header',
		array(
			'title'          => esc_html__('Sticky Header Options', 'ratency-progression'),
			'panel'          => 'progression_studios_header_panel', // Not typically needed.
			'priority'       => 25,
		)
	);

	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_header_sticky', array(
		'default' => 'none-sticky-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_header_sticky', array(
			'section' => 'progression_studios_section_sticky_header',
			'priority'   => 10,
			'choices'     => array(
				'sticky-pro' => esc_html__('Sticky Header', 'ratency-progression'),
				'none-sticky-pro' => esc_html__('Disable Sticky Header', 'ratency-progression'),
			),
		))
	);

	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_header_background_color', array(
		'default' =>  '#5c39f2',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_sticky_header_background_color', array(
			'default' =>  '#5c39f2',
			'label'    => esc_html__('Sticky Header Background', 'ratency-progression'),
			'section'  => 'progression_studios_section_sticky_header',
			'priority'   => 15,
		))
	);








	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_logo', array(
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(
		new WP_Customize_Image_Control($wp_customize, 'progression_studios_sticky_logo', array(
			'label'    => esc_html__('Sticky Logo', 'ratency-progression'),
			'section' => 'progression_studios_section_sticky_header',
			'priority'   => 20,
		))
	);

	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_logo_width', array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sticky_logo_width', array(
			'label'    => esc_html__('Sticky Logo Width (px)', 'ratency-progression'),
			'description'    => esc_html__('Set option to 0 to ignore this field.', 'ratency-progression'),

			'section'  => 'progression_studios_section_sticky_header',
			'priority'   => 30,
			'choices'     => array(
				'min'  => 0,
				'max'  => 1200,
				'step' => 1
			),
		))
	);

	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_logo_margin_top', array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sticky_logo_margin_top', array(
			'label'    => esc_html__('Sticky Logo Margin Top (px)', 'ratency-progression'),
			'description'    => esc_html__('Set option to 0 to ignore this field.', 'ratency-progression'),

			'section'  => 'progression_studios_section_sticky_header',
			'priority'   => 40,
			'choices'     => array(
				'min'  => 0,
				'max'  => 150,
				'step' => 1
			),
		))
	);

	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_logo_margin_bottom', array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sticky_logo_margin_bottom', array(
			'label'    => esc_html__('Sticky Logo Margin Bottom (px)', 'ratency-progression'),
			'description'    => esc_html__('Set option to 0 to ignore this field.', 'ratency-progression'),

			'section'  => 'progression_studios_section_sticky_header',
			'priority'   => 50,
			'choices'     => array(
				'min'  => 0,
				'max'  => 150,
				'step' => 1
			),
		))
	);


	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_nav_padding', array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sticky_nav_padding', array(
			'label'    => esc_html__('Sticky Nav Padding Top/Bottom', 'ratency-progression'),
			'description'    => esc_html__('Set option to 0 to ignore this field.', 'ratency-progression'),
			'section'  => 'progression_studios_section_sticky_header',
			'priority'   => 60,
			'choices'     => array(
				'min'  => 0,
				'max'  => 80,
				'step' => 1
			),
		))
	);

	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_nav_font_color', array(
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_font_color', array(
			'label'    => esc_html__('Sticky Nav Font Color', 'ratency-progression'),
			'section'  => 'progression_studios_section_sticky_header',
			'priority'   => 70,
		))
	);


	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_nav_font_color_hover', array(
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_font_color_hover', array(
			'label'    => esc_html__('Sticky Nav Font Hover Color', 'ratency-progression'),
			'section'  => 'progression_studios_section_sticky_header',
			'priority'   => 80,
		))
	);


	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_nav_underline', array(
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_underline', array(
			'label'    => esc_html__('Sticky Nav Underline', 'ratency-progression'),
			'section'  => 'progression_studios_section_sticky_header',
			'priority'   => 95,
		))
	);

	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_nav_font_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_font_bg', array(
			'label'    => esc_html__('Sticky Nav Background Color', 'ratency-progression'),
			'section'  => 'progression_studios_section_sticky_header',
			'priority'   => 100,
		))
	);

	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_nav_font_hover_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_font_hover_bg', array(
			'label'    => esc_html__('Sticky Nav Hover Background', 'ratency-progression'),
			'section'  => 'progression_studios_section_sticky_header',
			'priority'   => 105,
		))
	);











	/* Setting - Header - Header Options */
	$wp_customize->add_setting('progression_studios_nav_background_color', array(
		'default' => '#5c39f2',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_nav_background_color', array(
			'default' => '#5c39f2',
			'label'    => esc_html__('Navigation Background Color', 'ratency-progression'),
			'section' => 'tt_font_progression-studios-navigation-font',
			'priority'   => 5,
		))
	);



	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_align', array(
		'default' => 'progression-studios-nav-center',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_nav_align', array(
			'label'    => esc_html__('Navigation Alignment', 'ratency-progression'),
			'section' => 'tt_font_progression-studios-navigation-font',
			'priority'   => 10,
			'choices'     => array(
				'progression-studios-nav-left' => esc_html__('Left', 'ratency-progression'),
				'progression-studios-nav-center' => esc_html__('Center', 'ratency-progression'),
				'progression-studios-nav-right' => esc_html__('Right', 'ratency-progression'),
			),
		))
	);



	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_font_size', array(
		'default' => '15',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_nav_font_size', array(
			'label'    => esc_html__('Navigation Font Size', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-navigation-font',
			'priority'   => 500,
			'choices'     => array(
				'min'  => 0,
				'max'  => 30,
				'step' => 1
			),
		))
	);


	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_padding', array(
		'default' => '28',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_nav_padding', array(
			'label'    => esc_html__('Navigation Padding Top/Bottom', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-navigation-font',
			'priority'   => 505,
			'choices'     => array(
				'min'  => 5,
				'max'  => 100,
				'step' => 1
			),
		))
	);



	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_left_right', array(
		'default' => '42',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_nav_left_right', array(
			'label'    => esc_html__('Navigation Padding Left/Right', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-navigation-font',
			'priority'   => 510,
			'choices'     => array(
				'min'  => 8,
				'max'  => 80,
				'step' => 1
			),
		))
	);

	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_font_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_nav_font_color', array(
			'default'	=> '#ffffff',
			'label'    => esc_html__('Navigation Font Color', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-navigation-font',
			'priority'   => 520,
		))
	);


	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_font_color_hover', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_nav_font_color_hover', array(
			'default'	=> '#ffffff',
			'label'    => esc_html__('Navigation Font Hover Color', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-navigation-font',
			'priority'   => 530,
		))
	);



	/* Setting - Header - Header Options */
	$wp_customize->add_setting('progression_studios_nav_divider_vertical', array(
		'default' => 'rgba(255,255,255,  0.08)',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_nav_divider_vertical', array(
			'default' => 'rgba(255,255,255,  0.08)',
			'label'    => esc_html__('Navigation Vertical Divider', 'ratency-progression'),
			'section' => 'tt_font_progression-studios-navigation-font',
			'priority'   => 534,
		))
	);

	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_underline', array(
		'default' => 'rgba(255,255,255,  0.3)',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_underline', array(
			'default' => 'rgba(255,255,255,  0.3)',
			'label'    => esc_html__('Navigation Underline', 'ratency-progression'),
			'description'    => esc_html__('Remove underline by clearing the color.', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-navigation-font',
			'priority'   => 535,
		))
	);

	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_bg', array(
			'label'    => esc_html__('Navigation Item Background', 'ratency-progression'),
			'description'    => esc_html__('Remove background by clearing the color.', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-navigation-font',
			'priority'   => 536,
		))
	);

	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_bg_hover', array(
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_bg_hover', array(
			'label'    => esc_html__('Navigation Item Background Hover', 'ratency-progression'),
			'description'    => esc_html__('Remove background by clearing the color.', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-navigation-font',
			'priority'   => 536,
		))
	);



	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_letterspacing', array(
		'default' => '0.07',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_nav_letterspacing', array(
			'label'          => esc_html__('Navigation Letter-Spacing', 'ratency-progression'),
			'section' => 'tt_font_progression-studios-navigation-font',
			'priority'   => 540,
			'choices'     => array(
				'min'  => -1,
				'max'  => 1,
				'step' => 0.01
			),
		))
	);






	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_cat_count', array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_nav_cat_count', array(
			'label'    => esc_html__('Category Count in Navigation', 'ratency-progression'),
			'section' => 'tt_font_progression-studios-navigation-font',
			'priority'   => 600,
			'choices'     => array(
				'on' => esc_html__('On', 'ratency-progression'),
				'off' => esc_html__('Off', 'ratency-progression'),
			),
		))
	);


	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_cart_count_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_nav_cart_count_color', array(
			'default' => '#ffffff',
			'label'    => esc_html__('Category Count Color', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-navigation-font',
			'priority'   => 610,
		))
	);

	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_cart_count_background', array(
		'default' => 'rgba(255,255,255,  0.11)',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_nav_cart_count_background', array(
			'default' => 'rgba(255,255,255,  0.11)',
			'label'    => esc_html__('Category Count Background', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-navigation-font',
			'priority'   => 612,
		))
	);











	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting('progression_studios_sub_nav_border_top', array(
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_sub_nav_border_top', array(
			'label'    => esc_html__('Sub-Navigation Border Top Color', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-sub-navigation-font',
			'priority'   => 6,
		))
	);




	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting('progression_studios_sub_nav_bg', array(
		'default' => 'rgba(17,0,35,  0.86)',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_sub_nav_bg', array(
			'default' => 'rgba(17,0,35,  0.86)',
			'label'    => esc_html__('Sub-Navigation Background Color', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-sub-navigation-font',
			'priority'   => 10,
		))
	);





	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_sub_nav_font_size', array(
		'default' => '14',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sub_nav_font_size', array(
			'label'    => esc_html__('Sub-Navigation Font Size', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-sub-navigation-font',
			'priority'   => 510,
			'choices'     => array(
				'min'  => 0,
				'max'  => 30,
				'step' => 1
			),
		))
	);

	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_sub_nav_letterspacing', array(
		'default' => '0.07',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sub_nav_letterspacing', array(
			'label'          => esc_html__('Sub-Navigation Letter-Spacing', 'ratency-progression'),
			'section' => 'tt_font_progression-studios-sub-navigation-font',
			'priority'   => 515,
			'choices'     => array(
				'min'  => -1,
				'max'  => 1,
				'step' => 0.01
			),
		))
	);



	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting('progression_studios_sub_nav_font_color', array(
		'default'	=> 'rgba(255,255,255,  0.82)',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_sub_nav_font_color', array(
			'default'	=> 'rgba(255,255,255,  0.82)',
			'label'    => esc_html__('Sub-Navigation Font Color', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-sub-navigation-font',
			'priority'   => 520,
		))
	);


	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting('progression_studios_sub_nav_hover_font_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_sub_nav_hover_font_color', array(
			'default'	=> '#ffffff',
			'label'    => esc_html__('Sub-Navigation Font Hover Color', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-sub-navigation-font',
			'priority'   => 530,
		))
	);





	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting('progression_studios_sub_nav_border_color', array(
		'default' => 'rgba(255,255,255,  0)',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_sub_nav_border_color', array(
			'default' => 'rgba(255,255,255,  0)',
			'label'    => esc_html__('Sub-Navigation Divider Color', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-sub-navigation-font',
			'priority'   => 550,
		))
	);

	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting('progression_studios_sub_nav_h2_border_color', array(
		'default' => '#5c39f2',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_sub_nav_h2_border_color', array(
			'default' => '#5c39f2',
			'label'    => esc_html__('Sub-Navigation Divider Color', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-sub-navigation-font',
			'priority'   => 560,
		))
	);




	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_sub_nav_cart_count_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_sub_nav_cart_count_color', array(
			'default' => '#ffffff',
			'label'    => esc_html__('Category Count Color', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-sub-navigation-font',
			'priority'   => 610,
		))
	);

	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_sub_nav_cart_count_background', array(
		'default' => 'rgba(255,255,255,  0.16)',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_sub_nav_cart_count_background', array(
			'default' => 'rgba(255,255,255,  0.16)',
			'label'    => esc_html__('Category Count Background', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-sub-navigation-font',
			'priority'   => 612,
		))
	);






	/* Section - Header - Top Header Options */
	$wp_customize->add_setting('progression_studios_top_header_onoff', array(
		'default' => 'off-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_top_header_onoff', array(
			'label'    => esc_html__('Display Top Header Bar?', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-top-header-font',
			'priority'   => 10,
			'choices'     => array(
				'on-pro' => esc_html__('On', 'ratency-progression'),
				'off-pro' => esc_html__('Off', 'ratency-progression'),
			),
		))
	);


	/* Section - Header - Top Header Options */
	$wp_customize->add_setting('progression_studios_top_header_background', array(
		'default' => '#1e023d',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_top_header_background', array(
			'default' => '#1e023d',
			'label'    => esc_html__('Top Header Background Color', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-top-header-font',
			'priority'   => 20,
		))
	);

	/* Section - Header - Top Header Options */
	$wp_customize->add_setting('', array(
		'default' => 'rgba(255,255,255, 0.11)',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_top_header_border_bottom', array(
			'default' => 'rgba(255,255,255, 0.11)',
			'label'    => esc_html__('Top Header Border Bottom', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-top-header-font',
			'priority'   => 22,
		))
	);


	/* Section - Header - Top Header Options */
	$wp_customize->add_setting('progression_studios_top_header_font_size', array(
		'default' => '13',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_top_header_font_size', array(
			'label'    => esc_html__('Top Header Font Size', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-top-header-font',
			'priority'   => 530,
			'choices'     => array(
				'min'  => 5,
				'max'  => 25,
				'step' => 1
			),
		))
	);

	/* Section - Header - Top Header Options */
	$wp_customize->add_setting('progression_studios_top_header_padding', array(
		'default' => '13',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_top_header_padding', array(
			'label'    => esc_html__('Top Header Padding Above/Below', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-top-header-font',
			'priority'   => 535,
			'choices'     => array(
				'min'  => 0,
				'max'  => 30,
				'step' => 1
			),
		))
	);

	/* Section - Header - Top Header Options */
	$wp_customize->add_setting('progression_studios_top_header_color', array(
		'default' => '#dddddd',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_color', array(
			'label'    => esc_html__('Top Header Font/Link Color', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-top-header-font',
			'priority'   => 550,
		))
	);

	/* Section - Header - Top Header Options */
	$wp_customize->add_setting('progression_studios_top_header_hover_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_hover_color', array(
			'label'    => esc_html__('Top Header Font/Link Color', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-top-header-font',
			'priority'   => 555,
		))
	);



	/* Section - Header - Top Header Options */
	$wp_customize->add_setting('progression_studios_top_header_sub_border_top', array(
		'default' => '#06d79c',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_sub_border_top', array(
			'label'    => esc_html__('Sub Navigation Border top', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-top-header-font',
			'priority'   => 560,
		))
	);

	/* Section - Header - Top Header Options */
	$wp_customize->add_setting('progression_studios_top_header_sub_bg', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_sub_bg', array(
			'label'    => esc_html__('Sub Navigation Background', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-top-header-font',
			'priority'   => 565,
		))
	);


	/* Section - Header - Top Header Options */
	$wp_customize->add_setting('progression_studios_top_header_sub_border_clr', array(
		'default' => '#e8e8e8',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_sub_border_clr', array(
			'label'    => esc_html__('Sub Navigation Border Color', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-top-header-font',
			'priority'   => 568,
		))
	);

	/* Section - Header - Top Header Options */
	$wp_customize->add_setting('progression_studios_top_header_sub_color', array(
		'default' => '#717171',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_sub_color', array(
			'label'    => esc_html__('Sub Navigation Font Color', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-top-header-font',
			'priority'   => 570,
		))
	);

	/* Section - Header - Top Header Options */
	$wp_customize->add_setting('progression_studios_top_header_sub_hover_color', array(
		'default' => '#99b4ee',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_sub_hover_color', array(
			'label'    => esc_html__('Sub Navigation Font Hover Color', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-top-header-font',
			'priority'   => 575,
		))
	);







	/* Panel - Body */
	$wp_customize->add_panel('progression_studios_body_panel', array(
		'priority'    => 8,
		'title'       => esc_html__('Body', 'ratency-progression'),
	));



	/* Setting - Body - Body Main */
	$wp_customize->add_setting('progression_studios_default_link_color', array(
		'default'	=> '#5c39f2',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_default_link_color', array(
			'label'    => esc_html__('Default Link Color', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-body-font',
			'priority'   => 500,
		))
	);

	/* Setting - Body - Body Main */
	$wp_customize->add_setting('progression_studios_default_link_hover_color', array(
		'default'	=> '#9177ff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_default_link_hover_color', array(
			'label'    => esc_html__('Default Hover Link Color', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-body-font',
			'priority'   => 510,
		))
	);





	/* Setting - Body - Body Main */
	$wp_customize->add_setting('progression_studios_background_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_background_color', array(
			'label'    => esc_html__('Body Background Color', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-body-font',
			'priority'   => 513,
		))
	);

	/* Setting - Body - Body Main */
	$wp_customize->add_setting('progression_studios_body_bg_image', array(
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(
		new WP_Customize_Image_Control($wp_customize, 'progression_studios_body_bg_image', array(
			'label'    => esc_html__('Body Background Image', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-body-font',
			'priority'   => 525,
		))
	);

	/* Setting - Body - Body Main */
	$wp_customize->add_setting('progression_studios_body_bg_image_image_position', array(
		'default' => 'cover',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_body_bg_image_image_position', array(
			'label'    => esc_html__('Image Cover', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-body-font',
			'priority'   => 530,
			'choices'     => array(
				'cover' => esc_html__('Image Cover', 'ratency-progression'),
				'repeat-all' => esc_html__('Image Pattern', 'ratency-progression'),
			),
		))
	);


	/* Setting - Body - Body Main */
	$wp_customize->add_setting('progression_studios_boxed_background_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_boxed_background_color', array(
			'label'    => esc_html__('Boxed Content Background Color', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-body-font',
			'priority'   => 560,
		))
	);






	/* Setting - Body - Page Title */
	$wp_customize->add_setting('progression_studios_page_title_padding_top', array(
		'default' => '150',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_page_title_padding_top', array(
			'label'    => esc_html__('Page Title Top Padding', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-page-title',
			'priority'   => 501,
			'choices'     => array(
				'min'  => 0,
				'max'  => 450,
				'step' => 1
			),
		))
	);

	/* Setting - Body - Page Title */
	$wp_customize->add_setting('progression_studios_page_title_padding_bottom', array(
		'default' => '150',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_page_title_padding_bottom', array(
			'label'    => esc_html__('Page Title Bottom Padding', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-page-title',
			'priority'   => 515,
			'choices'     => array(
				'min'  => 0,
				'max'  => 450,
				'step' => 1
			),
		))
	);




	/* Setting - General - Page Title */
	$wp_customize->add_setting('progression_studios_page_title_bg_image', array(
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(
		new WP_Customize_Image_Control($wp_customize, 'progression_studios_page_title_bg_image', array(
			'label'    => esc_html__('Page Title Background Image', 'ratency-progression'),
			'section' => 'tt_font_progression-studios-page-title',
			'priority'   => 535,
		))
	);


	/* Setting - General - Page Title */
	$wp_customize->add_setting('progression_studios_page_title_image_position', array(
		'default' => 'cover',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_page_title_image_position', array(
			'section' => 'tt_font_progression-studios-page-title',
			'priority'   => 536,
			'choices'     => array(
				'cover' => esc_html__('Image Cover', 'ratency-progression'),
				'repeat-all' => esc_html__('Image Pattern', 'ratency-progression'),
			),
		))
	);



	/* Setting - Body - Page Title */
	$wp_customize->add_setting('progression_studios_page_title_bg_color', array(
		'default' => '#5847ef',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_page_title_bg_color', array(
			'label'    => esc_html__('Page Title Background Color', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-page-title',
			'priority'   => 580,
		))
	);


	/* Setting - Body - Page Title */
	$wp_customize->add_setting('progression_studios_page_title_overlay_color_top', array(
		'default' => 'rgba(0,0,0,0.25)',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_page_title_overlay_color_top', array(
			'default' => 'rgba(0,0,0,0.25)',
			'label'    => esc_html__('Page Title Gradient Overlay Top', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-page-title',
			'priority'   => 600,
		))
	);


	/* Setting - Body - Page Title */
	$wp_customize->add_setting('progression_studios_page_title_overlay_color', array(
		'default' => 'rgba(0,0,0,0.35)',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_page_title_overlay_color', array(
			'default' => 'rgba(0,0,0,0.35)',
			'label'    => esc_html__('Page Title Gradient Overlay Bottom', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-page-title',
			'priority'   => 600,
		))
	);




	/* Setting - Body - Page Title */
	$wp_customize->add_setting('progression_studios_sidebar_header_border', array(
		'default'	=> '#5c39f2',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_sidebar_header_border', array(
			'label'    => esc_html__('Sidebar Heading Border Bottom', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-sidebar-headings',
			'priority'   => 328,
		))
	);


	/* Setting - Body - Page Title */
	$wp_customize->add_setting('progression_studios_sidebar_divider', array(
		'default'	=> '#ebebeb',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_sidebar_divider', array(
			'label'    => esc_html__('Sidebar Divider Color', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-sidebar-headings',
			'priority'   => 330,
		))
	);




	/* Section - Blog - Blog Index Post Options */
	$wp_customize->add_section(
		'progression_studios_section_blog_index',
		array(
			'title'          => esc_html__('Blog Archive Options', 'ratency-progression'),
			'panel'          => 'progression_studios_blog_panel', // Not typically needed.
			'priority'       => 20,
		)
	);


	/* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting('progression_studios_blog_index_layout', array(
		'default' => 'top-image',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_index_layout', array(
			'label'    => esc_html__('Archive Post Layout', 'ratency-progression'),
			'section' => 'progression_studios_section_blog_index',
			'priority'   => 10,
			'choices' => array(
				'default' => esc_html__('Left Image', 'ratency-progression'),
				'top-image' => esc_html__('Top Image', 'ratency-progression'),
				'overlay' => esc_html__('Overlay', 'ratency-progression'),

			),
		))
	);





	/* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting('progression_studios_blog_columns', array(
		'default' => '1',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_blog_columns', array(
			'label'    => esc_html__('Archive Columns', 'ratency-progression'),
			'section' => 'progression_studios_section_blog_index',
			'priority'   => 20,
			'choices'     => array(
				'min'  => 1,
				'max'  => 6,
				'step' => 1
			),
		))
	);


	/* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting('progression_studios_blog_index_gap', array(
		'default' => '15',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_blog_index_gap', array(
			'label'    => esc_html__('Archive Margins', 'ratency-progression'),
			'section' => 'progression_studios_section_blog_index',
			'priority'   => 22,
			'choices'     => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1
			),
		))
	);




	/* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting('progression_studios_blog_pagination', array(
		'default' => 'default',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		'progression_studios_blog_pagination',
		array(
			'label'    => esc_html__('Archive Pagination', 'ratency-progression'),
			'section' => 'progression_studios_section_blog_index',
			'type' => 'select',
			'priority'   => 25,
			'choices' => array(
				'default' => esc_html__('Default', 'ratency-progression'),
				'infinite-scroll' => esc_html__('Infinite Scroll', 'ratency-progression'),
				'load-more' => esc_html__('Load More Button', 'ratency-progression'),

			),
		)
	);


	/* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting('progression_studios_blog_masonry_fit', array(
		'default' => 'fitRows',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_masonry_fit', array(
			'label'    => esc_html__('Masonry Layout', 'ratency-progression'),
			'section' => 'progression_studios_section_blog_index',
			'priority'   => 30,
			'choices' => array(
				'masonry' => esc_html__('On', 'ratency-progression'),
				'fitRows' => esc_html__('Off', 'ratency-progression'),

			),
		))
	);




	/* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting('progression_studios_blog_cat_sidebar', array(
		'default' => 'right-sidebar',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_cat_sidebar', array(
			'label'    => esc_html__('Archive/Category Sidebar', 'ratency-progression'),
			'section' => 'progression_studios_section_blog_index',
			'priority'   => 100,
			'choices' => array(
				'left-sidebar' => esc_html__('Left', 'ratency-progression'),
				'right-sidebar' => esc_html__('Right', 'ratency-progression'),
				'no-sidebar' => esc_html__('Hidden', 'ratency-progression'),

			),
		))
	);





	/* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting('progression_studios_blog_image_opacity', array(
		'default' => '1',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_blog_image_opacity', array(
			'label'    => esc_html__('Image Transparency on Hover', 'ratency-progression'),
			'section' => 'progression_studios_section_blog_index',
			'priority'   => 206,
			'choices'     => array(
				'min'  => 0,
				'max'  => 1,
				'step' => 0.05
			),
		))
	);






	/* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting('progression_studios_blog_image_bg', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_blog_image_bg', array(
			'default' => '#000000',
			'label'    => esc_html__('Post Image Background Color', 'ratency-progression'),
			'section' => 'progression_studios_section_blog_index',
			'priority'   => 207,
		))
	);


	/* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting('progression_studios_blog_review_rating_index_bg', array(
		'default' => '#2b0f4a',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_blog_review_rating_index_bg', array(
			'default' => '#2b0f4a',
			'label'    => esc_html__('Review Rating Background', 'ratency-progression'),
			'section' => 'progression_studios_section_blog_index',
			'priority'   => 210,
		))
	);





	/* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting('progression_studios_blog_index_rating_display', array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_index_rating_display', array(
			'label'    => esc_html__('Review Rating', 'ratency-progression'),
			'section' => 'progression_studios_section_blog_index',
			'priority'   => 298,
			'choices' => array(
				'true' => esc_html__('Display', 'ratency-progression'),
				'false' => esc_html__('Hide', 'ratency-progression'),

			),
		))
	);





	/* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting('progression_studios_blog_date_ago', array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_date_ago', array(
			'label'    => esc_html__('Date Format', 'ratency-progression'),
			'section' => 'progression_studios_section_blog_index',
			'priority'   => 300,
			'choices' => array(
				'true' => esc_html__('Time Ago', 'ratency-progression'),
				'traditional' => esc_html__('Traditional', 'ratency-progression'),

			),
		))
	);




	/* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting('progression_studios_blog_meta_author_display', array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_meta_author_display', array(
			'label'    => esc_html__('Author', 'ratency-progression'),
			'section' => 'progression_studios_section_blog_index',
			'priority'   => 335,
			'choices' => array(
				'true' => esc_html__('Display', 'ratency-progression'),
				'false' => esc_html__('Hide', 'ratency-progression'),

			),
		))
	);



	/* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting('progression_studios_blog_meta_date_display', array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_meta_date_display', array(
			'label'    => esc_html__('Date', 'ratency-progression'),
			'section' => 'progression_studios_section_blog_index',
			'priority'   => 340,
			'choices' => array(
				'true' => esc_html__('Display', 'ratency-progression'),
				'false' => esc_html__('Hide', 'ratency-progression'),

			),
		))
	);



	/* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting('progression_studios_blog_index_meta_category_display', array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_index_meta_category_display', array(
			'label'    => esc_html__('Category', 'ratency-progression'),
			'section' => 'progression_studios_section_blog_index',
			'priority'   => 350,
			'choices' => array(
				'true' => esc_html__('Display', 'ratency-progression'),
				'false' => esc_html__('Hide', 'ratency-progression'),

			),
		))
	);


	/* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting('progression_studios_blog_meta_comment_display', array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_meta_comment_display', array(
			'label'    => esc_html__('Comment Count', 'ratency-progression'),
			'section' => 'progression_studios_section_blog_index',
			'priority'   => 355,
			'choices' => array(
				'true' => esc_html__('Display', 'ratency-progression'),
				'false' => esc_html__('Hide', 'ratency-progression'),

			),
		))
	);



	/* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting('progression_studios_blog_excerpt', array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_excerpt', array(
			'label'    => esc_html__('Excerpt', 'ratency-progression'),
			'section' => 'progression_studios_section_blog_index',
			'priority'   => 360,
			'choices' => array(
				'true' => esc_html__('Display', 'ratency-progression'),
				'false' => esc_html__('Hide', 'ratency-progression'),

			),
		))
	);




	/* Section - Blog - Blog Post Options */
	$wp_customize->add_setting('progression_studios_blog_index_schema', array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_index_schema', array(
			'label'    => esc_html__('Add Search Rich Snippets', 'ratency-progression'),
			'section' => 'tt_font_progression-studios-blog-post-options',
			'priority'   => 10,
			'choices'     => array(
				'true' => esc_html__('Display', 'ratency-progression'),
				'false' => esc_html__('Hide', 'ratency-progression'),
			),
		))
	);

	/* Section - Blog - Blog Post Options */
	$wp_customize->add_setting('progression_studios_blog_post_rating_page_title', array(
		'default' => 'false',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_post_rating_page_title', array(
			'label'    => esc_html__('Review in Page Title', 'ratency-progression'),
			'section' => 'tt_font_progression-studios-blog-post-options',
			'priority'   => 100,
			'choices'     => array(
				'true' => esc_html__('Display', 'ratency-progression'),
				'false' => esc_html__('Hide', 'ratency-progression'),
			),
		))
	);



	/* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting('progression_studios_post_blog_excerpt', array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_post_blog_excerpt', array(
			'label'    => esc_html__('Excerpt in Page Title', 'ratency-progression'),
			'section' => 'tt_font_progression-studios-blog-post-options',
			'priority'   => 101,
			'choices' => array(
				'true' => esc_html__('Display', 'ratency-progression'),
				'false' => esc_html__('Hide', 'ratency-progression'),

			),
		))
	);

	/* Setting - Body - Page Title */
	$wp_customize->add_setting('progression_studios_page_title__postpadding_top', array(
		'default' => '130',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_page_title__postpadding_top', array(
			'label'    => esc_html__('Post Title Top Padding', 'ratency-progression'),
			'section' => 'tt_font_progression-studios-blog-post-options',
			'priority'   => 1610,
			'choices'     => array(
				'min'  => 0,
				'max'  => 450,
				'step' => 1
			),
		))
	);

	/* Setting - Body - Page Title */
	$wp_customize->add_setting('progression_studios_page_title_post_padding_bottom', array(
		'default' => '125',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_page_title_post_padding_bottom', array(
			'label'    => esc_html__('Post Title Bottom Padding', 'ratency-progression'),
			'section' => 'tt_font_progression-studios-blog-post-options',
			'priority'   => 1620,
			'choices'     => array(
				'min'  => 0,
				'max'  => 450,
				'step' => 1
			),
		))
	);



	/* Setting - Body - Page Title */
	$wp_customize->add_setting('progression_studios_review_rating_bg', array(
		'default' => '#2b0f4a',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_review_rating_bg', array(
			'default' => '#2b0f4a',
			'label'    => esc_html__('Rating Background(Review Section)', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-blog-post-options',
			'priority'   => 1622,
		))
	);

	/* Setting - Body - Page Title */
	$wp_customize->add_setting('progression_studios_review_rating_border', array(
		'default' => '#5c39f2',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_review_rating_border', array(
			'default' => '#5c39f2',
			'label'    => esc_html__('Rating Border(Review Section)', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-blog-post-options',
			'priority'   => 1623,
		))
	);


	/* Setting - Body - Page Title */
	$wp_customize->add_setting('progression_studios_review_rating_content_border', array(
		'default' => 'rgba(0,0,0,0.1)',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_review_rating_content_border', array(
			'default' => 'rgba(0,0,0,0.1)',
			'label'    => esc_html__('Rating Content Border', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-blog-post-options',
			'priority'   => 1625,
		))
	);




	/* Setting - Body - Page Title */
	$wp_customize->add_setting('progression_studios_author_info_bg', array(
		'default' => '#e51947',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_author_info_bg', array(
			'default' => '#e51947',
			'label'    => esc_html__('Author Info Social Background', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-blog-post-options',
			'priority'   => 1630,
		))
	);





	/* Section - Blog - Blog Post Options */
	$wp_customize->add_setting('progression_studios_blog_post_related', array(
		'default' => 'false',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_post_related', array(
			'label'    => esc_html__('Related Posts', 'ratency-progression'),
			'section' => 'tt_font_progression-studios-blog-post-options',
			'priority'   => 1640,
			'choices'     => array(
				'true' => esc_html__('Display', 'ratency-progression'),
				'false' => esc_html__('Hide', 'ratency-progression'),
			),
		))
	);


	/* Section - Blog - Blog Post Options */
	$wp_customize->add_setting('progression_studios_blog_post_sidebar', array(
		'default' => 'right',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_post_sidebar', array(
			'label'    => esc_html__('Blog Post Sidebar', 'ratency-progression'),
			'section' => 'tt_font_progression-studios-blog-post-options',
			'priority'   => 1650,
			'choices'     => array(
				'left' => esc_html__('Left', 'ratency-progression'),
				'right' => esc_html__('Right', 'ratency-progression'),
				'none' => esc_html__('No Sidebar', 'ratency-progression'),
			),
		))
	);


	/* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting('progression_studios_blog_post_index_meta_category_display', array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_post_index_meta_category_display', array(
			'label'    => esc_html__('Category', 'ratency-progression'),
			'section' => 'tt_font_progression-studios-blog-post-options',
			'priority'   => 1652,
			'choices' => array(
				'true' => esc_html__('Display', 'ratency-progression'),
				'false' => esc_html__('Hide', 'ratency-progression'),

			),
		))
	);



	/* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting('progression_studios_blog_post_meta_author_display', array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_post_meta_author_display', array(
			'label'    => esc_html__('Author', 'ratency-progression'),
			'section' => 'tt_font_progression-studios-blog-post-options',
			'priority'   => 2035,
			'choices' => array(
				'true' => esc_html__('Display', 'ratency-progression'),
				'false' => esc_html__('Hide', 'ratency-progression'),

			),
		))
	);



	/* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting('progression_studios_blog_post_meta_date_display', array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_post_meta_date_display', array(
			'label'    => esc_html__('Date', 'ratency-progression'),
			'section' => 'tt_font_progression-studios-blog-post-options',
			'priority'   => 2340,
			'choices' => array(
				'true' => esc_html__('Display', 'ratency-progression'),
				'false' => esc_html__('Hide', 'ratency-progression'),

			),
		))
	);



	/* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting('progression_studios_blog_post_meta_comment_display', array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_post_meta_comment_display', array(
			'label'    => esc_html__('Comment Count', 'ratency-progression'),
			'section' => 'tt_font_progression-studios-blog-post-options',
			'priority'   => 2355,
			'choices' => array(
				'true' => esc_html__('Display', 'ratency-progression'),
				'false' => esc_html__('Hide', 'ratency-progression'),

			),
		))
	);









	/* Setting - Body - Button Styles */
	$wp_customize->add_setting('progression_studios_button_font', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_button_font', array(
			'label'    => esc_html__('Button Font Color', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-button-typography',
			'priority'   => 1635,
		))
	);

	/* Setting - Body - Button Styles */
	$wp_customize->add_setting('progression_studios_button_background', array(
		'default'	=> '#5c39f2',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_button_background', array(
			'label'    => esc_html__('Button Background Color', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-button-typography',
			'priority'   => 1640,
		))
	);




	/* Setting - Body - Button Styles */
	$wp_customize->add_setting('progression_studios_button_font_hover', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_button_font_hover', array(
			'label'    => esc_html__('Button Hover Font Color', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-button-typography',
			'priority'   => 1650,
		))
	);

	/* Setting - Body - Button Styles */
	$wp_customize->add_setting('progression_studios_button_background_hover', array(
		'default'	=> '#1e023d',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_button_background_hover', array(
			'label'    => esc_html__('Button Hover Background Color', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-button-typography',
			'priority'   => 1680,
		))
	);



	/* Setting - Body - Button Styles */
	$wp_customize->add_setting('progression_studios_button_font_size', array(
		'default' => '15',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_button_font_size', array(
			'label'    => esc_html__('Button Font Size', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-button-typography',
			'priority'   => 1700,
			'choices'     => array(
				'min'  => 4,
				'max'  => 30,
				'step' => 1
			),
		))
	);

	/* Setting - Body - Button Styles */
	$wp_customize->add_setting('progression_studios_button_letter_spacing', array(
		'default' => '0.03',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_button_letter_spacing', array(
			'label'    => esc_html__('Button Letter Spacing', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-button-typography',
			'priority'   => 1710,
			'choices'     => array(
				'min'  => 0,
				'max'  => 2,
				'step' => 0.01
			),
		))
	);


	/* Setting - Body - Button Styles */
	$wp_customize->add_setting('progression_studios_button_bordr_radius', array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_button_bordr_radius', array(
			'label'    => esc_html__('Button Border Radius', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-button-typography',
			'priority'   => 1750,
			'choices'     => array(
				'min'  => 0,
				'max'  => 50,
				'step' => 1
			),
		))
	);

	/* Setting - Body - Button Styles */
	$wp_customize->add_setting('progression_studios_ionput_bordr_radius', array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_ionput_bordr_radius', array(
			'label'    => esc_html__('Input Border Radius', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-button-typography',
			'priority'   => 1750,
			'choices'     => array(
				'min'  => 0,
				'max'  => 30,
				'step' => 1
			),
		))
	);



	/* Setting - Body - Button Styles */
	$wp_customize->add_setting('progression_studios_input_background', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_input_background', array(
			'default'	=> '#ffffff',
			'label'    => esc_html__('Default Input Background Color', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-button-typography',
			'priority'   => 1790,
		))
	);

	/* Setting - Body - Button Styles */
	$wp_customize->add_setting('progression_studios_input_border', array(
		'default'	=> 'rgba(0,0,0,0.13)',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_input_border', array(
			'default'	=> 'rgba(0,0,0,0.13)',
			'label'    => esc_html__('Default Input Border Color', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-button-typography',
			'priority'   => 1790,
		))
	);




	/* Panel - Footer Top LEvel
	$wp_customize->add_panel( 'progression_studios_footer_panel', array(
		'priority'    => 11,
        'title'       => esc_html__( 'Footer', 'ratency-progression' ),
    )
 	);
	*/


	/* Section - General - General Layout */
	$wp_customize->add_section(
		'progression_studios_section_footer_section',
		array(
			'title'          => esc_html__('Footer', 'ratency-progression'),
			/* 'panel'          => 'progression_studios_footer_panel',*/  // Not typically needed.
			'priority'       => 11,
		)
	);

	/* Setting - Footer Elementor
	https://gist.github.com/ajskelton/27369df4a529ac38ec83980f244a7227
	*/
	$progression_studios_elementor_library_list =  array(
		'' => 'Choose a template',
	);
	$progression_studios_elementor_args = array('post_type' => 'elementor_library', 'posts_per_page' => 99);
	$progression_studios_elementor_posts = get_posts($progression_studios_elementor_args);
	foreach ($progression_studios_elementor_posts as $progression_studios_elementor_post) {
		$progression_studios_elementor_library_list[$progression_studios_elementor_post->ID] = $progression_studios_elementor_post->post_title;
	}

	$wp_customize->add_setting('progression_studios_footer_elementor_library', array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control('progression_studios_footer_elementor_library', array(
		'type' => 'select',
		'section' => 'progression_studios_section_footer_section',
		'priority'   => 5,
		'label'    => esc_html__('Footer Elementor Template', 'ratency-progression'),
		'description'    => esc_html__('You can add/edit your footer under ', 'ratency-progression') . '<a href="' . admin_url() . 'edit.php?post_type=elementor_library">Elementor > My Library</a>',
		'choices'  => 	   $progression_studios_elementor_library_list,
	));



	/* Setting - Footer - Footer Main */
	$wp_customize->add_setting('progression_studios_footer_background', array(
		'default'	=> '#250a43',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_footer_background', array(
			'label'    => esc_html__('Copyright Background', 'ratency-progression'),
			'section' => 'progression_studios_section_footer_section',
			'priority'   => 500,
			'active_callback' => function () use ($wp_customize) {
				return '' === $wp_customize->get_setting('progression_studios_footer_elementor_library')->value();
			},
		))
	);



	/* Setting - Footer - Copyright */
	$wp_customize->add_setting('progression_studios_footer_copyright', array(
		'default' =>  'All Rights Reserved. Developed by Progression Studios',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	));
	$wp_customize->add_control(
		'progression_studios_footer_copyright',
		array(
			'label'          => esc_html__('Copyright Text', 'ratency-progression'),
			'description'    => esc_html__('This default text will be replaced if you use a template above.', 'ratency-progression'),
			'section' => 'progression_studios_section_footer_section',
			'type' => 'textarea',
			'priority'   => 10,
			'active_callback' => function () use ($wp_customize) {
				return '' === $wp_customize->get_setting('progression_studios_footer_elementor_library')->value();
			},
		)
	);

	/* Setting - Footer - Copyright */
	$wp_customize->add_setting('progression_studios_copyright_text_color', array(
		'default' => '#a5a0ad',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_copyright_text_color', array(
			'label'    => esc_html__('Copyright Text Color', 'ratency-progression'),
			'section' => 'progression_studios_section_footer_section',
			'priority'   => 525,
			'active_callback' => function () use ($wp_customize) {
				return '' === $wp_customize->get_setting('progression_studios_footer_elementor_library')->value();
			},
		))
	);

	/* Setting - Footer - Copyright */
	$wp_customize->add_setting('progression_studios_copyright_link', array(
		'default' => '#dddddd',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_copyright_link', array(
			'label'    => esc_html__('Copyright Link Color', 'ratency-progression'),
			'section' => 'progression_studios_section_footer_section',
			'priority'   => 530,
			'active_callback' => function () use ($wp_customize) {
				return '' === $wp_customize->get_setting('progression_studios_footer_elementor_library')->value();
			},
		))
	);

	/* Setting - Footer - Copyright */
	$wp_customize->add_setting('progression_studios_copyright_link_hover', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_copyright_link_hover', array(
			'label'    => esc_html__('Copyright Link Hover Color', 'ratency-progression'),
			'section' => 'progression_studios_section_footer_section',
			'priority'   => 540,
			'active_callback' => function () use ($wp_customize) {
				return '' === $wp_customize->get_setting('progression_studios_footer_elementor_library')->value();
			},
		))
	);







	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting('progression_studios_footer_copyright_location', array(
		'default' => 'footer-copyright-align-left',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_copyright_location', array(
			'label'    => esc_html__('Copyright Text Alignment', 'ratency-progression'),
			'section' => 'progression_studios_section_footer_section',
			'priority'   => 19,
			'active_callback' => function () use ($wp_customize) {
				return '' === $wp_customize->get_setting('progression_studios_footer_elementor_library')->value();
			},
			'choices'     => array(
				'footer-copyright-align-left' => esc_html__('Left', 'ratency-progression'),
				'footer-copyright-align-center' => esc_html__('Center', 'ratency-progression'),
				'footer-copyright-align-right' => esc_html__('Right', 'ratency-progression'),
			),
		))
	);



	/* Setting - Footer - Footer Widgets */
	$wp_customize->add_setting('progression_studios_copyright_margin_top', array(
		'default' => '45',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_copyright_margin_top', array(
			'label'    => esc_html__('Copyright Padding Top', 'ratency-progression'),
			'section' => 'progression_studios_section_footer_section',
			'priority'   => 20,
			'active_callback' => function () use ($wp_customize) {
				return '' === $wp_customize->get_setting('progression_studios_footer_elementor_library')->value();
			},
			'choices'     => array(
				'min'  => 0,
				'max'  => 150,
				'step' => 1
			),
		))
	);


	/* Setting - Footer - Footer Widgets */
	$wp_customize->add_setting('progression_studios_copyright_margin_bottom', array(
		'default' => '50',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_copyright_margin_bottom', array(
			'label'    => esc_html__('Copyright Padding Bottom', 'ratency-progression'),
			'section' => 'progression_studios_section_footer_section',
			'priority'   => 22,
			'active_callback' => function () use ($wp_customize) {
				return '' === $wp_customize->get_setting('progression_studios_footer_elementor_library')->value();
			},
			'choices'     => array(
				'min'  => 0,
				'max'  => 150,
				'step' => 1
			),
		))
	);














	/* Panel - Body */
	$wp_customize->add_panel('progression_studios_blog_panel', array(
		'priority'    => 10,
		'title'       => esc_html__('Blog', 'ratency-progression'),
	));






	/* Section - Body - Blog Typography */
	$wp_customize->add_setting('progression_studios_blog_title_link', array(
		'default' => '#5c39f2',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_blog_title_link', array(
			'label'    => esc_html__('Title Color', 'ratency-progression'),
			'section' => 'tt_font_progression-studios-blog-headings',
			'priority'   => 5,
		))
	);


	/* Section - Body - Blog Typography */
	$wp_customize->add_setting('progression_studios_blog_title_link_hover', array(
		'default' => '#1e023d',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'progression_studios_blog_title_link_hover', array(
			'label'    => esc_html__('Title Hover Color', 'ratency-progression'),
			'section' => 'tt_font_progression-studios-blog-headings',
			'priority'   => 10,
		))
	);


	/* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting('progression_studios_blog_post_border_color', array(
		'default' => 'rgba(17,17,17,0.10)',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_blog_post_border_color', array(
			'default' => 'rgba(17,17,17,0.10)',
			'label'    => esc_html__('Post Border Color', 'ratency-progression'),
			'section' => 'tt_font_progression-studios-blog-headings',
			'priority'   => 225,
		))
	);






	/* Setting - Body - Page Title */
	$wp_customize->add_setting('progression_studios_overlay_min_height', array(
		'default' => '300',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_overlay_min_height', array(
			'label'    => esc_html__('Minimum Height', 'ratency-progression'),
			'section'  => 'tt_font_progression-studios-blog-overlay-headings',
			'priority'   => 5,
			'choices'     => array(
				'min'  => 0,
				'max'  => 800,
				'step' => 1
			),
		))
	);









	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_social_icons_margintop', array(
		'default' => '34',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	));
	$wp_customize->add_control(
		new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_social_icons_margintop', array(
			'label'    => esc_html__('Icon Margin Top', 'ratency-progression'),
			'section' => 'progression_studios_section_header_icons_section',
			'priority'   => 2,
			'choices'     => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1
			),
		))
	);




	/* Setting - Header - Header Options */
	$wp_customize->add_setting('progression_studios_social_icons_color', array(
		'default'	=> 'rgba(255,255,255,  0.85)',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_social_icons_color', array(
			'default'	=> 'rgba(255,255,255,  0.85)',
			'label'    => esc_html__('Icon Color', 'ratency-progression'),
			'section' => 'progression_studios_section_header_icons_section',
			'priority'   => 5,
		))
	);

	/* Setting - Header - Header Options */
	$wp_customize->add_setting('progression_studios_social_icons_bg', array(
		'default'	=> 'rgba(255,255,255,  0.12)',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_social_icons_bg', array(
			'default'	=> 'rgba(255,255,255,  0.12)',
			'label'    => esc_html__('Icon Background', 'ratency-progression'),
			'section' => 'progression_studios_section_header_icons_section',
			'priority'   => 7,
		))
	);


	/* Setting - Header - Header Options */
	$wp_customize->add_setting('progression_studios_social_icons_hover_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_social_icons_hover_color', array(
			'default'	=> '#ffffff',
			'label'    => esc_html__('Icon Hover Color', 'ratency-progression'),
			'section' => 'progression_studios_section_header_icons_section',
			'priority'   => 8,
		))
	);

	/* Setting - Header - Header Options */
	$wp_customize->add_setting('progression_studios_social_icons_hover_bg', array(
		'default'	=> 'rgba(255,255,255,  0.2)',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	));
	$wp_customize->add_control(
		new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_social_icons_hover_bg', array(
			'default'	=> 'rgba(255,255,255,  0.2)',
			'label'    => esc_html__('Icon Hover Background', 'ratency-progression'),
			'section' => 'progression_studios_section_header_icons_section',
			'priority'   => 9,
		))
	);
}
add_action('customize_register', 'progression_studios_customizer');

//HTML Text
function progression_studios_sanitize_customizer($input)
{
	return wp_kses($input, TRUE);
}

//no-HTML text
function progression_studios_sanitize_choices($input)
{
	return wp_filter_nohtml_kses($input);
}

function progression_studios_customizer_styles()
{
	global $post;

	//https://codex.wordpress.org/Function_Reference/wp_add_inline_style
	wp_enqueue_style('progression-studios-custom-style', get_template_directory_uri() . '/css/progression_studios_custom_styles.css');

	if (get_theme_mod('progression_studios_header_bg_image')) {
		$progression_studios_header_bg_image = "background-image:url(" . esc_attr(get_theme_mod('progression_studios_header_bg_image')) . ");";
	} else {
		$progression_studios_header_bg_image = "";
	}


	if (get_theme_mod('progression_studios_sub_nav_border_top')) {
		$progression_studios_sub_nav_brder_top = "ul#progression-studios-panel-login, #progression-checkout-basket, #panel-search-progression, .sf-menu ul {border-top:3px solid " .  esc_attr(get_theme_mod('progression_studios_sub_nav_border_top', '#06d79c')) . "; }";
	} else {
		$progression_studios_sub_nav_brder_top = "";
	}

	if (get_theme_mod('progression_studios_top_header_sub_border_top', '#06d79c')) {
		$progression_studios_top_header_sub_nav_brder_top = "#ratency-progression-header-top .sf-menu ul {border-top:3px solid " .  esc_attr(get_theme_mod('progression_studios_top_header_sub_border_top', '#06d79c')) . "; }";
	} else {
		$progression_studios_top_header_sub_nav_brder_top = "";
	}

	if (get_theme_mod('progression_studios_header_bg_image_image_position', 'cover') == 'cover') {
		$progression_studios_header_bg_cover = "background-repeat: no-repeat; background-position:center center; background-size: cover;";
	} else {
		$progression_studios_header_bg_cover = "background-repeat:repeat-all; ";
	}

	if (get_theme_mod('progression_studios_body_bg_image')) {
		$progression_studios_body_bg = "background-image:url(" .   esc_attr(get_theme_mod('progression_studios_body_bg_image')) . ");";
	} else {
		$progression_studios_body_bg = "";
	}

	if (get_theme_mod('progression_studios_page_title_bg_image')) {
		$progression_studios_page_title_bg = "background-image:url(" .   esc_attr(get_theme_mod('progression_studios_page_title_bg_image')) . ");";
	} else {
		$progression_studios_page_title_bg = "";
	}

	if (get_theme_mod('progression_studios_body_bg_image_image_position', 'cover') == 'cover') {
		$progression_studios_body_bg_cover = "background-repeat: no-repeat; background-position:center center; background-size: cover; background-attachment: fixed;";
	} else {
		$progression_studios_body_bg_cover = "background-repeat:repeat-all;";
	}

	if (get_theme_mod('progression_studios_page_title_image_position', 'cover') == 'cover') {
		$progression_studios_page_tite_bg_cover = "background-repeat: no-repeat; background-position:center center; background-size: cover;";
	} else {
		$progression_studios_page_tite_bg_cover = "background-repeat:repeat-all;";
	}


	if (get_theme_mod('progression_studios_post_title_bg_color')) {
		$progression_studios_post_tite_bg_color = "background-color: " . esc_attr(get_theme_mod('progression_studios_post_title_bg_color', '#000000')) . ";";
	} else {
		$progression_studios_post_tite_bg_color = "";
	}

	if (get_theme_mod('progression_studios_post_page_title_bg_image')) {
		$progression_studios_post_tite_bg_image_post = "background-image:url(" .   esc_attr(get_theme_mod('progression_studios_post_page_title_bg_image',  get_template_directory_uri() . '/images/page-title.jpg')) . ");";
	} else {
		$progression_studios_post_tite_bg_image_post = "";
	}

	if (get_theme_mod('progression_studios_blog_image_bg', '#000000')) {
		$progression_studios_post_tite_bg_featuredimg_bg = ".progression-studios-feaured-video-overlay, .progression-studios-default-blog-overlay .progression-studios-feaured-image {background:" . esc_attr(get_theme_mod('progression_studios_blog_image_bg', '#000000')) . ";}";
	} else {
		$progression_studios_post_tite_bg_featuredimg_bg = "";
	}

	if (get_theme_mod('progression_studios_page_post_title_image_position', 'cover') == 'cover') {
		$progression_studios_post_tite_bg_cover = "background-repeat: no-repeat; background-position:center center; background-size: cover;";
	} else {
		$progression_studios_post_tite_bg_cover = "background-repeat:repeat-all;";
	}

	if (get_theme_mod('progression_studios_page_title_overlay_color', 'rgba(0,0,0,0.35)')) {
		$progression_studios_page_tite_overlay_image_cover = "#progression-studios-post-page-title:before, #page-title-pro:before {
			background: -moz-linear-gradient(top, " .  esc_attr(get_theme_mod('progression_studios_page_title_overlay_color_top', 'rgba(0,0,0,0.25)')) . " 0%, " .  esc_attr(get_theme_mod('progression_studios_page_title_overlay_color', 'rgba(0,0,0,0.35)')) . " 100%);
			background: -webkit-linear-gradient(top, " .  esc_attr(get_theme_mod('progression_studios_page_title_overlay_color_top', 'rgba(0,0,0,0.25)')) . " 0%," .  esc_attr(get_theme_mod('progression_studios_page_title_overlay_color', 'rgba(0,0,0,0.35)')) . " 100%);
			background: linear-gradient(to bottom, " .  esc_attr(get_theme_mod('progression_studios_page_title_overlay_color_top', 'rgba(0,0,0,0.25)')) . " 0%, " .  esc_attr(get_theme_mod('progression_studios_page_title_overlay_color', 'rgba(0,0,0,0.35)')) . " 100%);
		}";
	} else {
		$progression_studios_page_tite_overlay_image_cover = "";
	}

	if (get_theme_mod('progression_studios_post_title_overlay_color')) {
		$progression_studios_post_tite_overlay_image_cover = "#page-title-pro.page-title-pro-post-page:before {background:" .  esc_attr(get_theme_mod('progression_studios_post_title_overlay_color')) . "; }";
	} else {
		$progression_studios_post_tite_overlay_image_cover = "";
	}

	if (get_theme_mod('progression_studios_sticky_logo_width', '0') != '0') {
		$progression_studios_sticky_logo_width = "width:" .  esc_attr(get_theme_mod('progression_studios_sticky_logo_width', '70')) . "px;";
	} else {
		$progression_studios_sticky_logo_width = "";
	}

	if (get_theme_mod('progression_studios_sticky_logo_margin_top', '0') != '0') {
		$progression_studios_sticky_logo_top = "padding-top:" .  esc_attr(get_theme_mod('progression_studios_sticky_logo_margin_top', '31')) . "px;";
	} else {
		$progression_studios_sticky_logo_top = "";
	}

	if (get_theme_mod('progression_studios_sticky_logo_margin_bottom', '0') != '0') {
		$progression_studios_sticky_logo_bottom = "padding-bottom:" .  esc_attr(get_theme_mod('progression_studios_sticky_logo_margin_bottom', '31')) . "px;";
	} else {
		$progression_studios_sticky_logo_bottom = "";
	}

	if (get_theme_mod('progression_studios_sticky_nav_padding', '0') != '0') {
		$progression_studios_sticky_nav_padding = "
		.progression-sticky-scrolled .progression-mini-banner-icon {
			top:" . esc_attr((get_theme_mod('progression_studios_sticky_nav_padding') - get_theme_mod('progression_studios_nav_font_size', '15')) - 4) . "px;
		}
		.progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a {
			padding-top:" . esc_attr(get_theme_mod('progression_studios_sticky_nav_padding') - 3) . "px;
			padding-bottom:" . esc_attr(get_theme_mod('progression_studios_sticky_nav_padding') - 3) . "px;
		}
		.progression-sticky-scrolled #progression-shopping-cart-count span.progression-cart-count { top:" . esc_attr(get_theme_mod('progression_studios_sticky_nav_padding')) . "px; }
		.progression-sticky-scrolled #progression-studios-header-login-container a.progresion-studios-login-icon {
			padding-top:" . esc_attr(get_theme_mod('progression_studios_sticky_nav_padding') - 4) . "px;
			padding-bottom:" . esc_attr(get_theme_mod('progression_studios_sticky_nav_padding') - 4) . "px;
		}
		.progression-sticky-scrolled #progression-studios-header-search-icon i.pe-7s-search {
			padding-top:" . esc_attr(get_theme_mod('progression_studios_sticky_nav_padding') - 4) . "px;
			padding-bottom:" . esc_attr(get_theme_mod('progression_studios_sticky_nav_padding') - 4) . "px;
		}
		.progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon {
					padding-top:" . esc_attr(get_theme_mod('progression_studios_sticky_nav_padding') - 5) . "px;
					padding-bottom:" . esc_attr(get_theme_mod('progression_studios_sticky_nav_padding') - 5) . "px;
		}
		.progression-sticky-scrolled .sf-menu a {
			padding-top:" . esc_attr(get_theme_mod('progression_studios_sticky_nav_padding')) . "px;
			padding-bottom:" . esc_attr(get_theme_mod('progression_studios_sticky_nav_padding')) . "px;
		}
			";
	} else {
		$progression_studios_sticky_nav_padding = "";
	}

	if (get_theme_mod('progression_studios_sticky_nav_underline')) {
		$progression_studios_sticky_nav_underline = "
		.progression-sticky-scrolled .sf-menu a:before {
			background:" . esc_attr(get_theme_mod('progression_studios_sticky_nav_underline')) . ";
		}
		.progression-sticky-scrolled .sf-menu a:hover:before, .progression-sticky-scrolled .sf-menu li.sfHover a:before, .progression-sticky-scrolled .sf-menu li.current-menu-item a:before {
			opacity:1;
			background:" . esc_attr(get_theme_mod('progression_studios_sticky_nav_underline')) . ";
		}
			";
	} else {
		$progression_studios_sticky_nav_underline = "";
	}

	if (get_theme_mod('progression_studios_sticky_nav_font_color')) {
		$progression_studios_sticky_nav_option_font_color = "
			.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon,
			.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon,
			.progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon,
			.progression-sticky-scrolled .active-mobile-icon-pro .mobile-menu-icon-pro, .progression-sticky-scrolled .mobile-menu-icon-pro,  .progression-sticky-scrolled .mobile-menu-icon-pro:hover,
			.progression-sticky-scrolled  #progression-studios-header-login-container a.progresion-studios-login-icon,
	.progression-sticky-scrolled #progression-studios-header-search-icon i.pe-7s-search,
	.progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a, .progression-sticky-scrolled .sf-menu a {
		color:" . esc_attr(get_theme_mod('progression_studios_sticky_nav_font_color')) . ";
	}";
	} else {
		$progression_studios_sticky_nav_option_font_color = "";
	}

	if (get_theme_mod('progression_studios_sticky_nav_font_color_hover')) {
		$progression_studios_optional_sticky_nav_font_hover = "
			.progression_studios_force_light_navigation_color .progression-sticky-scrolled  #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon:hover,
			.progression_studios_force_light_navigation_color .progression-sticky-scrolled  .activated-class #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon,
			.progression_studios_force_dark_navigation_color .progression-sticky-scrolled  #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon:hover,
			.progression_studios_force_dark_navigation_color .progression-sticky-scrolled  .activated-class #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon,
		.progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon:hover,
		.progression-sticky-scrolled .activated-class #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon,
		.progression-sticky-scrolled #progression-studios-header-search-icon:hover i.pe-7s-search, .progression-sticky-scrolled #progression-studios-header-search-icon.active-search-icon-pro i.pe-7s-search, .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover, .progression-sticky-scrolled .sf-menu a:hover, .progression-sticky-scrolled .sf-menu li.sfHover a, .progression-sticky-scrolled .sf-menu li.current-menu-item a {
		color:" . esc_attr(get_theme_mod('progression_studios_sticky_nav_font_color_hover')) . ";
	}";
	} else {
		$progression_studios_optional_sticky_nav_font_hover = "";
	}

	if (get_theme_mod('progression_studios_nav_bg')) {
		$progression_studios_optional_nav_bg = "background:" . esc_attr(get_theme_mod('progression_studios_nav_bg')) . ";";
	} else {
		$progression_studios_optional_nav_bg = "";
	}

	if (get_theme_mod('progression_studios_nav_underline', 'rgba(255,255,255,  0.3)')) {
		$progression_studios_sticky_nav_underline_default = "
		.sf-menu a:before {
			background:" . esc_attr(get_theme_mod('progression_studios_nav_underline', 'rgba(255,255,255,  0.3)')) . ";
			margin-top:" . esc_attr(get_theme_mod('progression_studios_nav_font_size', '15') + 6) . "px;
		}
		.sf-menu a:hover:before, .sf-menu li.sfHover a:before, .sf-menu li.current-menu-item a:before {
			opacity:1;
			background:" . esc_attr(get_theme_mod('progression_studios_nav_underline', 'rgba(255,255,255,  0.3)')) . ";
		}
		.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a:before,
		.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a:hover:before,
		.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a:before,
		.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a:before,

		.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a:before,
		.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a:hover:before,
		.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a:before,
		.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a:before {
			background:" . esc_attr(get_theme_mod('progression_studios_nav_underline', 'rgba(255,255,255,  0.3)')) . ";
		}
			";
	} else {
		$progression_studios_sticky_nav_underline_default = "";
	}

	if (get_theme_mod('progression_studios_top_header_onoff', 'off-pro') == 'off-pro') {
		$progression_studios_top_header_off_on_display = "display:none;";
	} else {
		$progression_studios_top_header_off_on_display = "";
	}

	if (get_theme_mod('progression_studios_pro_scroll_top', 'scroll-on-pro') == "scroll-off-pro") {
		$progression_studios_scroll_top_disable = "display:none;";
	} else {
		$progression_studios_scroll_top_disable = "";
	}


	if (get_theme_mod('progression_studios_nav_bg_hover')) {
		$progression_studios_optiona_nav_bg_hover = ".sf-menu a:hover, .sf-menu li.sfHover a, .sf-menu li.current-menu-item a { background:" .  esc_attr(get_theme_mod('progression_studios_nav_bg_hover')) . "; }";
	} else {
		$progression_studios_optiona_nav_bg_hover = "";
	}

	if (get_theme_mod('progression_studios_sticky_nav_font_bg')) {
		$progression_studios_optiona_sticky_nav_font_bg = ".progression-sticky-scrolled .sf-menu a { background:" .  esc_attr(get_theme_mod('progression_studios_sticky_nav_font_bg')) . "; }";
	} else {
		$progression_studios_optiona_sticky_nav_font_bg = "";
	}

	if (get_theme_mod('progression_studios_sticky_nav_font_hover_bg')) {
		$progression_studios_optiona_sticky_nav_hover_bg = ".progression-sticky-scrolled .sf-menu a:hover, .progression-sticky-scrolled .sf-menu li.sfHover a, .progression-sticky-scrolled .sf-menu li.current-menu-item a { background:" .  esc_attr(get_theme_mod('progression_studios_sticky_nav_font_hover_bg')) . "; }";
	} else {
		$progression_studios_optiona_sticky_nav_hover_bg = "";
	}

	if (get_theme_mod('progression_studios_sticky_nav_font_color')) {
		$progression_studios_option_sticky_nav_font_color = ".progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon i.pe-7s-search, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-login-container a.progresion-studios-login-icon, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon i.pe-7s-search, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-login-container a.progresion-studios-login-icon, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a {
		color:" . esc_attr(get_theme_mod('progression_studios_sticky_nav_font_color')) . ";
	}";
	} else {
		$progression_studios_option_sticky_nav_font_color = "";
	}

	if (get_theme_mod('progression_studios_sticky_nav_font_color_hover')) {
		$progression_studios_option_stickY_nav_font_hover_color = ".progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon:hover i.pe-7s-search, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon.active-search-icon-pro i.pe-7s-search, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover,  .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon:hover i.pe-7s-search, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon.active-search-icon-pro i.pe-7s-search, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover,  .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a {
		color:" . esc_attr(get_theme_mod('progression_studios_sticky_nav_font_color_hover')) . ";
	}";
	} else {
		$progression_studios_option_stickY_nav_font_hover_color = "";
	}




	if (get_theme_mod('progression_studios_sticky_nav_highlight_font')) {
		$progression_studios_option_sticky_hightlight_font_color = "body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:before, body .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:before, .progression-sticky-scrolled .sf-menu li.sfHover.highlight-button a, .progression-sticky-scrolled .sf-menu li.current-menu-item.highlight-button a, .progression-sticky-scrolled .sf-menu li.highlight-button a, .progression-sticky-scrolled .sf-menu li.highlight-button a:hover { color:" .  esc_attr(get_theme_mod('progression_studios_sticky_nav_highlight_font')) . "; }";
	} else {
		$progression_studios_option_sticky_hightlight_font_color = "";
	}

	if (get_theme_mod('progression_studios_sticky_nav_highlight_button')) {
		$progression_studios_option_sticky_hightlight_bg_color = "body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover, body .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover, body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:before, body  .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:before, .progression-sticky-scrolled .sf-menu li.current-menu-item.highlight-button a:before, .progression-sticky-scrolled .sf-menu li.highlight-button a:before { background:" .  esc_attr(get_theme_mod('progression_studios_sticky_nav_highlight_button')) . "; }";
	} else {
		$progression_studios_option_sticky_hightlight_bg_color = "";
	}

	if (get_theme_mod('progression_studios_sticky_nav_highlight_button_hover')) {
		$progression_studios_option_sticky_hightlight_bg_color_hover = "body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before,  body .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before,
	body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item.highlight-button a:hover:before, body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before, .progression-sticky-scrolled .sf-menu li.current-menu-item.highlight-button a:hover:before, .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before { background:" .  esc_attr(get_theme_mod('progression_studios_sticky_nav_highlight_button_hover')) . "; }";
	} else {
		$progression_studios_option_sticky_hightlight_bg_color_hover = "";
	}

	if (get_theme_mod('progression_studios_mobile_header_bg')) {
		$progression_studios_mobile_header_bg_color = ".progression-studios-transparent-header header#masthead-pro, header#masthead-pro {background:" . esc_attr(get_theme_mod('progression_studios_mobile_header_bg')) . ";  }";
	} else {
		$progression_studios_mobile_header_bg_color = "";
	}

	if (get_theme_mod('progression_studios_nav_background_color', '#1e023d')) {
		$progression_studios_nav_bg_optional = "
		 #progression-studios-nav-bg { background-color:" . esc_attr(get_theme_mod('progression_studios_nav_background_color', '#5c39f2')) . ";
	}";
	} else {
		$progression_studios_nav_bg_optional = "";
	}

	if (get_theme_mod('progression_studios_header_background_color', '#1e023d')) {
		$progression_studios_header_bg_optional = "
		 body.progression-studios-header-sidebar-before #progression-inline-icons .progression-studios-social-icons, body.progression-studios-header-sidebar-before:before, header#masthead-pro { background-color:" . esc_attr(get_theme_mod('progression_studios_header_background_color', '#1e023d')) . ";
	}";
	} else {
		$progression_studios_header_bg_optional = "";
	}


	if (get_theme_mod('progression_studios_mobile_header_nav_padding')) {
		$progression_studios_mobile_header_nav_padding_top = "		body header#masthead-pro #progression-shopping-cart-count span.progression-cart-count {top:" . esc_attr(get_theme_mod('progression_studios_mobile_header_nav_padding')) . "px;}
		body header#masthead-pro .mobile-menu-icon-pro {padding-top:" . esc_attr(get_theme_mod('progression_studios_mobile_header_nav_padding') - 3) . "px; padding-bottom:" . esc_attr(get_theme_mod('progression_studios_mobile_header_nav_padding') - 5) . "px; }
		body header#masthead-pro #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon {
			padding-top:" . esc_attr(get_theme_mod('progression_studios_mobile_header_nav_padding') - 5) . "px;
			padding-bottom:" . esc_attr(get_theme_mod('progression_studios_mobile_header_nav_padding') - 5) . "px;
		}";
	} else {
		$progression_studios_mobile_header_nav_padding_top = "";
	}




	if (function_exists('z_taxonomy_image_url') && z_taxonomy_image_url()) {
		$progression_studios_custom_tax_page_title_img = "body #page-title-pro {background-image:url('" . esc_url(z_taxonomy_image_url()) . "'); }";
	} else {
		$progression_studios_custom_tax_page_title_img = "";
	}

	if (is_page() && get_post_meta($post->ID, 'progression_studios_header_image', true)) {
		$progression_studios_custom_page_title_img = "body #page-title-pro {background-image:url('" . esc_url(get_post_meta($post->ID, 'progression_studios_header_image', true)) . "'); }";
	} else {
		$progression_studios_custom_page_title_img = "";
	}
	if (get_option('page_for_posts')) {
		$cover_page = get_page(get_option('page_for_posts'));
		if (is_home() && get_post_meta($cover_page->ID, 'progression_studios_header_image', true) || is_singular('post') && get_post_meta($cover_page->ID, 'progression_studios_header_image', true) || is_category() && get_post_meta($cover_page->ID, 'progression_studios_header_image', true)) {
			$progression_studios_blog_header_img = "body #page-title-pro {background-image:url('" .  esc_url(get_post_meta($cover_page->ID, 'progression_studios_header_image', true)) . "'); }";
		} else {
			$progression_studios_blog_header_img = "";
		}
	} else {
		$progression_studios_blog_header_img = "";
	}


	if (get_theme_mod('progression_studios_header_icon_bg_color')) {
		$progression_studios_top_header_icon_bg = "background:" . esc_attr(get_theme_mod('progression_studios_header_icon_bg_color'))  . ";";
	} else {
		$progression_studios_top_header_icon_bg = "";
	}

	if (get_theme_mod('progression_studios_top_header_background', '#1e023d')) {
		$progression_studios_top_header_background_option = "background:" . esc_attr(get_theme_mod('progression_studios_top_header_background', '#1e023d'))  . ";";
	} else {
		$progression_studios_top_header_background_option = "";
	}

	if (get_theme_mod('progression_studios_top_header_border_bottom', 'rgba(255,255,255, 0.11)')) {
		$progression_studios_top_header_border_bottom_option = "border-bottom:1px solid " . esc_attr(get_theme_mod('progression_studios_top_header_border_bottom', 'rgba(255,255,255, 0.11)'))  . ";";
	} else {
		$progression_studios_top_header_border_bottom_option = "";
	}




	if (get_theme_mod('progression_studios_shop_post_rating', 'false') == 'false') {
		$progression_studios_shop_rating_index = "ul.products li.product .progression-studios-shop-index-content .star-rating {display:none;}	";
	} else {
		$progression_studios_shop_rating_index = "";
	}

	if (get_theme_mod('progression_studios_site_boxed') == 'boxed-pro') {
		$progression_studios_boxed_layout = "
	 	@media only screen and (min-width: 959px) {

		#boxed-layout-pro.progression-studios-preloader {margin-top:90px;}
		#boxed-layout-pro.progression-studios-preloader.progression-preloader-completed {animation-name: ProMoveUpPageLoaderBoxed; animation-delay:200ms;}
 	 	#boxed-layout-pro { margin-top:50px; margin-bottom:50px;}
	 	}
		#boxed-layout-pro #content-pro {
			overflow:hidden;
		}
	 	#boxed-layout-pro {
	 		position:relative;
	 		width:" . esc_attr(get_theme_mod('progression_studios_site_width', '1200')) . "px;
	 		margin-left:auto; margin-right:auto;
	 		background-color:" . esc_attr(get_theme_mod('progression_studios_boxed_background_color', '#ffffff')) . ";
	 		box-shadow: 0px 0px 50px rgba(0, 0, 0, 0.15);
	 	}
 	#boxed-layout-pro .l-container { width:90%; }

 	@media only screen and (min-width: 960px) and (max-width: " . esc_attr(get_theme_mod('progression_studios_site_width', '1200') + 100) . "px) {
		body #boxed-layout-pro{width:92%;}
	}

	";
	} else {
		$progression_studios_boxed_layout = "";
	}

	$progression_studios_custom_css = "
	$progression_studios_custom_page_title_img
	$progression_studios_custom_tax_page_title_img
	$progression_studios_blog_header_img
	#logo-footer img {width:" .  esc_attr(get_theme_mod('progression_studios_theme_logo_width', '160')) . "px;}
	.woocommerce-shop-single .summary .star-rating:before, .woocommerce-shop-single .woocommerce-product-rating .star-rating:before, #boxed-layout-pro #content-pro p.stars, #boxed-layout-pro #content-pro p.stars a, #boxed-layout-pro #content-pro p.stars a:hover, #boxed-layout-pro #content-pro .star-rating, #boxed-layout-pro ul.products li.product .star-rating, #boxed-layout-pro ul.products li.product .star-rating:before {
		color:" .  esc_attr(get_theme_mod('progression_studios_shopratign_color', '#06d79c')) . ";
	}
	a, .woocommerce-shop-single .product_meta a:hover, .woocommerce-shop-single .woocommerce-product-rating a.woocommerce-review-link:hover {
		color:" .  esc_attr(get_theme_mod('progression_studios_default_link_color', '#5c39f2')) . ";
	}
	a:hover {
		color:" .  esc_attr(get_theme_mod('progression_studios_default_link_hover_color', '#9177ff')) . ";
	}
	#ratency-progression-header-top .sf-mega, header ul .sf-mega {
		width:100%;
		left:0px;
		margin-left:0;
	}
	body .elementor-section.elementor-section-boxed > .elementor-container {max-width:" .  esc_attr(get_theme_mod('progression_studios_site_width', '1200')) . "px;}
	.l-container {  width:" .  esc_attr(get_theme_mod('progression_studios_site_width', '1200')) . "px; }
	$progression_studios_header_bg_optional
	$progression_studios_nav_bg_optional
	body.progression-studios-header-sidebar-before #progression-inline-icons .progression-studios-social-icons, body.progression-studios-header-sidebar-before:before, header#masthead-pro {
		$progression_studios_header_bg_image
		$progression_studios_header_bg_cover
	}
	body {
		background-color:" .   esc_attr(get_theme_mod('progression_studios_background_color', '#ffffff')) . ";
		$progression_studios_body_bg
		$progression_studios_body_bg_cover
	}
	#page-title-pro {
		background-color:" .   esc_attr(get_theme_mod('progression_studios_page_title_bg_color', '#5847ef')) . ";
		padding-top:" . esc_attr(get_theme_mod('progression_studios_page_title_padding_top', '150')) . "px;
		padding-bottom:" .  esc_attr(get_theme_mod('progression_studios_page_title_padding_bottom', '150')) . "px;
		$progression_studios_page_title_bg
		$progression_studios_page_tite_bg_cover
	}
	#progression-studios-post-page-title {
		background-color:" .   esc_attr(get_theme_mod('progression_studios_page_title_bg_color', '#5847ef')) . ";
		$progression_studios_page_title_bg
		$progression_studios_page_tite_bg_cover
		padding-top:" . esc_attr(get_theme_mod('progression_studios_page_title__postpadding_top', '130')) . "px;
		padding-bottom:" .  esc_attr(get_theme_mod('progression_studios_page_title_post_padding_bottom', '125')) . "px;
	}
	$progression_studios_page_tite_overlay_image_cover

	.sidebar h4.widget-title:before { background-color:" .   esc_attr(get_theme_mod('progression_studios_sidebar_header_border', '#5c39f2')) . "; }
	.sidebar ul ul, .sidebar ul li, .widget .widget_shopping_cart_content p.buttons { border-color:" .   esc_attr(get_theme_mod('progression_studios_sidebar_divider', '#ebebeb')) . "; }
	/* START BLOG STYLES */
	ul.progression-author-icons {background:" . esc_attr(get_theme_mod('progression_studios_author_info_bg', '#e51947')) . ";}
	.progression-blog-review-content {border-color:" . esc_attr(get_theme_mod('progression_studios_review_rating_content_border', 'rgba(0,0,0,0.1)')) . ";}
	.progression-studios-hexagon-border { background-color: " . esc_attr(get_theme_mod('progression_studios_review_rating_border', '#5c39f2')) . ";   }
	.progression-studios-hexagon-border:before { border-bottom-color: " . esc_attr(get_theme_mod('progression_studios_review_rating_border', '#5c39f2')) . "; }
	.progression-studios-hexagon-border:after { border-top-color:" . esc_attr(get_theme_mod('progression_studios_review_rating_border', '#5c39f2')) . "; }

	.progression-blog-review-content .progression-blog-review-total { background-color: " . esc_attr(get_theme_mod('progression_studios_review_rating_bg', '#2b0f4a')) . ";  }
	.progression-blog-review-content .progression-blog-review-total:before {border-bottom-color: " . esc_attr(get_theme_mod('progression_studios_review_rating_bg', '#2b0f4a')) . "; }
	.progression-blog-review-content .progression-blog-review-total:after {border-top-color:" . esc_attr(get_theme_mod('progression_studios_review_rating_bg', '#2b0f4a')) . "; }
	#page-title-pro.page-title-pro-post-page {
		$progression_studios_post_tite_bg_color
		$progression_studios_post_tite_bg_image_post
		$progression_studios_post_tite_bg_cover
	}
	.progression-studios-default-blog-top .blog-post-vertical-content-layout,
	.progression-blog-content {
		border-color:" . esc_attr(get_theme_mod('progression_studios_blog_post_border_color', 'rgba(17,17,17,0.10)')) . ";
	}
	.progression-studios-default-blog-overlay, .overlay-progression-blog-content {
		min-height:" . esc_attr(get_theme_mod('progression_studios_overlay_min_height', '300')) . "px;
	}
	$progression_studios_post_tite_overlay_image_cover
	$progression_studios_post_tite_bg_featuredimg_bg
	.progression-ratency-slider-review-total { background-color: " . esc_attr(get_theme_mod('progression_studios_blog_review_rating_index_bg', '#2b0f4a')) . ";}
	.progression-ratency-slider-review-total:before {border-bottom-color: " . esc_attr(get_theme_mod('progression_studios_blog_review_rating_index_bg', '#2b0f4a')) . "; }
	.progression-ratency-slider-review-total:after {border-top-color:" . esc_attr(get_theme_mod('progression_studios_blog_review_rating_index_bg', '#2b0f4a')) . "; }
	.progression-studios-default-blog-overlay:hover .overlay-progression-studios-blog-image,.progression-studios-default-blog-overlay:hover a img, .progression-studios-feaured-image:hover a img { opacity:" . esc_attr(get_theme_mod('progression_studios_blog_image_opacity', '1')) . ";}
	h2.progression-blog-title a {color:" . esc_attr(get_theme_mod('progression_studios_blog_title_link', '#5c39f2')) . ";}
	h2.progression-blog-title a:hover {color:" . esc_attr(get_theme_mod('progression_studios_blog_title_link_hover', '#1e023d')) . ";}
	/* END BLOG STYLES */

	/* START SHOP STYLES */
	.progression-studios-shop-index-content {
		background: " . esc_attr(get_theme_mod('progression_studios_shop_post_background', '#ffffff')) . ";
		border-color:" . esc_attr(get_theme_mod('progression_studios_shop_post_border_color', 'rgba(0,0,0,0.09)')) . ";
	}

	$progression_studios_shop_rating_index
	/* END SHOP STYLES */

	/* START BUTTON STYLES */
	.infinite-nav-pro a:hover {
		color:" . esc_attr(get_theme_mod('progression_studios_button_font', '#ffffff')) . ";
		background:" . esc_attr(get_theme_mod('progression_studios_button_background', '#5c39f2')) . ";
		border-color:" . esc_attr(get_theme_mod('progression_studios_button_background', '#5c39f2')) . ";
	}
	.wpneo-fields input[type='number'], .wpneo-fields input[type='text'], .wpneo-fields input[type='email'], .wpneo-fields input[type='password'],  .wpneo-fields textarea, .campaign_update_field_copy  input, .campaign_update_field_copy  textarea, #campaign_update_addon_field input, #campaign_update_addon_field textarea,
	.woocommerce input, #content-pro .woocommerce table.shop_table .coupon input#coupon_code, #content-pro .woocommerce table.shop_table input, form.checkout.woocommerce-checkout textarea.input-text, form.checkout.woocommerce-checkout input.input-text,
	.post-password-form input, .search-form input.search-field, .wpcf7 select, #respond textarea, #respond input, .wpcf7-form input, .wpcf7-form textarea {
		background-color:" . esc_attr(get_theme_mod('progression_studios_input_background', '#ffffff')) . ";
		border-color:" . esc_attr(get_theme_mod('progression_studios_input_border', 'rgba(0,0,0,0.13)')) . ";
	}
	.wpneo-fields input[type='text'], .wpneo-fields input[type='email'], .wpneo-fields input[type='password'],  .wpneo-fields textarea {
		border-color:" . esc_attr(get_theme_mod('progression_studios_input_border', 'rgba(0,0,0,0.13)')) . " !important;
	}
	.wp-block-button a.wp-block-button__link,
	#reward_options input.button,
	.helpmeout-registration-page .wpneo-user-registration-wrap #wpneo-registration .wpneo-single input#user-registration-btn,
	.woocommerce form input.button,
	.woocommerce form input.woocommerce-Button,
	button.wpneo_donate_button,
	#boxed-layout-pro .progression-woocommerce-product-short-summary button.button,
	#boxed-layout-pro .progression-woocommerce-product-short-summary a.button,
	.post-password-form input[type=submit], #respond input.submit, .wpcf7-form input.wpcf7-submit {
		font-size:" . esc_attr(get_theme_mod('progression_studios_button_font_size', '15')) . "px;
	}
	.helpmeout-rewards-select_button button.select_rewards_button,
	#boxed-layout-pro .woocommerce .shop_table input.button, #boxed-layout-pro .form-submit input#submit, #boxed-layout-pro #customer_login input.button, #boxed-layout-pro .woocommerce-checkout-payment input.button, #boxed-layout-pro button.button, #boxed-layout-pro a.button  {
		font-size:" . esc_attr(get_theme_mod('progression_studios_button_font_size', '15')) . "px;
	}
	.wp-block-button a.wp-block-button__link,
	.progression-page-nav span, .progression-page-nav a, #content-pro ul.page-numbers li span.current, #content-pro ul.page-numbers li a {
		border-radius:" . esc_attr(get_theme_mod('progression_studios_button_bordr_radius', '0')) . "px;
	}
	#reward_options input.button,
	#wpneo-registration input#user-registration-btn,
	#campaign_update_addon_field input.removecampaignupdate, button#wpneo-update-save, input#addcampaignupdate,
	button#cc-image-upload-file-button,
	input.wpneo-submit-campaign, input#wpneo_active_edit_form, .wpneo-buttons-group button#wpneo-edit, .wpneo-buttons-group button#wpneo-dashboard-btn-cancel, .wpneo-buttons-group button#wpneo-password-save, .wpneo-buttons-group button#wpneo-dashboard-save, .wpneo-buttons-group button#wpneo-contact-save, .wpneo-buttons-group button#wpneo-profile-save, button.wpneo_donate_button,
	.woocommerce input, #content-pro .woocommerce table.shop_table .coupon input#coupon_code, #content-pro .woocommerce table.shop_table input, form.checkout.woocommerce-checkout textarea.input-text, form.checkout.woocommerce-checkout input.input-text,
	#progression-checkout-basket a.cart-button-header-cart, .search-form input.search-field, .wpcf7 select, .post-password-form input, #respond textarea, #respond input, .wpcf7-form input, .wpcf7-form textarea {
		border-radius:" . esc_attr(get_theme_mod('progression_studios_ionput_bordr_radius', '0')) . "px;
	}
	#helpmeeout-login-form:before {
		border-bottom: 8px solid " . esc_attr(get_theme_mod('progression_studios_button_background', '#5c39f2')) . ";
	}
	#helpmeeout-login-form,
	.product #campaign_loved_html,
	ul.wpneo-crowdfunding-update li:hover span.round-circle,
	.tags-progression a:hover,
	.progression-page-nav a:hover, .progression-page-nav span, #content-pro ul.page-numbers li a:hover, #content-pro ul.page-numbers li span.current {
		color:" . esc_attr(get_theme_mod('progression_studios_button_font', '#ffffff')) . ";
		background:" . esc_attr(get_theme_mod('progression_studios_button_background', '#5c39f2')) . ";
	}
	#progression-checkout-basket a.cart-button-header-cart, .flex-direction-nav a:hover, #boxed-layout-pro .woocommerce-shop-single .summary button.button,
	#boxed-layout-pro .woocommerce-shop-single .summary a.button,
	.mc4wp-form input[type='submit'] {
		color:" . esc_attr(get_theme_mod('progression_studios_button_font', '#ffffff')) . ";
		background:" . esc_attr(get_theme_mod('progression_studios_button_background', '#5c39f2')) . ";
	}
	.wp-block-button a.wp-block-button__link,
	.helpmeout-registration-page .wpneo-user-registration-wrap #wpneo-registration .wpneo-single input#user-registration-btn,
	input.wpneo-submit-campaign,
	#wpneo-registration input#user-registration-btn,
	.woocommerce form input.button,
	.woocommerce form input.woocommerce-Button,
	.helpmeout-rewards-select_button button.select_rewards_button,
	button.wpneo_donate_button,
	.sidebar ul.progression-studios-social-widget li a,
	footer#site-footer .tagcloud a, .tagcloud a, body .woocommerce nav.woocommerce-MyAccount-navigation li.is-active a,
	.post-password-form input[type=submit], #respond input.submit, .wpcf7-form input.wpcf7-submit,
	#boxed-layout-pro .woocommerce .shop_table input.button, #boxed-layout-pro .form-submit input#submit, #boxed-layout-pro #customer_login input.button, #boxed-layout-pro .woocommerce-checkout-payment input.button, #boxed-layout-pro button.button, #boxed-layout-pro a.button {
		color:" . esc_attr(get_theme_mod('progression_studios_button_font', '#ffffff')) . ";
		background:" . esc_attr(get_theme_mod('progression_studios_button_background', '#5c39f2')) . ";
		border-radius:" . esc_attr(get_theme_mod('progression_studios_button_bordr_radius', '0')) . "px;
		letter-spacing:" . esc_attr(get_theme_mod('progression_studios_button_letter_spacing', '0.03')) . "em;
	}
	.mobile-menu-icon-pro span.progression-mobile-menu-text,
	#boxed-layout-pro .woocommerce-shop-single .summary button.button,
	#boxed-layout-pro .woocommerce-shop-single .summary a.button {
		letter-spacing:" . esc_attr(get_theme_mod('progression_studios_button_letter_spacing', '0.03')) . "em;
	}
	body .woocommerce nav.woocommerce-MyAccount-navigation li.is-active a {
	border-radius:0px;
	}
	.wpneo-fields input[type='number']:focus, #wpneofrontenddata .wpneo-fields select:focus, .campaign_update_field_copy  input:focus, .campaign_update_field_copy  textarea:focus, #campaign_update_addon_field input:focus, #campaign_update_addon_field textarea:focus, .wpneo-fields input[type='text']:focus, .wpneo-fields input[type='email']:focus, .wpneo-fields input[type='password']:focus,  .wpneo-fields textarea:focus {
		border-color:" . esc_attr(get_theme_mod('progression_studios_button_background', '#5c39f2')) . " !important;
	}
	.dashboard-head-date input[type='text']:focus,
	#panel-search-progression .search-form input.search-field:focus, blockquote.alignleft, blockquote.alignright, body .woocommerce-shop-single table.variations td.value select:focus, .woocommerce input:focus, #content-pro .woocommerce table.shop_table .coupon input#coupon_code:focus, body #content-pro .woocommerce table.shop_table input:focus, body #content-pro .woocommerce form.checkout.woocommerce-checkout input.input-text:focus, body #content-pro .woocommerce form.checkout.woocommerce-checkout textarea.input-text:focus, form.checkout.woocommerce-checkout input.input-text:focus, form#mc-embedded-subscribe-form  .mc-field-group input:focus, .wpcf7-form select:focus, blockquote, .post-password-form input:focus, .search-form input.search-field:focus, #respond textarea:focus, #respond input:focus, .wpcf7-form input:focus, .wpcf7-form textarea:focus,
	.widget.widget_price_filter form .price_slider_wrapper .price_slider .ui-slider-handle {
		border-color:" . esc_attr(get_theme_mod('progression_studios_button_background', '#5c39f2')) . ";
		outline:none;
	}
	body .woocommerce .woocommerce-MyAccount-content {
		border-left-color:" . esc_attr(get_theme_mod('progression_studios_button_background', '#5c39f2')) . ";
	}
	.widget.widget_price_filter form .price_slider_wrapper .price_slider .ui-slider-range {
		background:" . esc_attr(get_theme_mod('progression_studios_button_background', '#5c39f2')) . ";
	}
	.wp-block-button a.wp-block-button__link:hover,
	.woocommerce form input.button:hover,
	.woocommerce form input.woocommerce-Button:hover,
	body #progression-checkout-basket a.cart-button-header-cart:hover, #boxed-layout-pro .woocommerce-shop-single .summary button.button:hover,
	#boxed-layout-pro .woocommerce-shop-single .summary a.button:hover, .mc4wp-form input[type='submit']:hover, .progression-studios-blog-cat-overlay a, .progression-studios-blog-cat-overlay a:hover,
	.sidebar ul.progression-studios-social-widget li a:hover,
	footer#site-footer .tagcloud a:hover, .tagcloud a:hover, #boxed-layout-pro .woocommerce .shop_table input.button:hover, #boxed-layout-pro .form-submit input#submit:hover, #boxed-layout-pro #customer_login input.button:hover, #boxed-layout-pro .woocommerce-checkout-payment input.button:hover, #boxed-layout-pro button.button:hover, #boxed-layout-pro a.button:hover, .post-password-form input[type=submit]:hover, #respond input.submit:hover, .wpcf7-form input.wpcf7-submit:hover {
		color:" . esc_attr(get_theme_mod('progression_studios_button_font_hover', '#ffffff')) . ";
		background:" . esc_attr(get_theme_mod('progression_studios_button_background_hover', '#1e023d')) . ";
	}
	/* END BUTTON STYLES */

	/* START Sticky Nav Styles */
	.progression-sticky-scrolled #progression-studios-nav-bg,
	.progression-studios-transparent-header .progression-sticky-scrolled #progression-studios-nav-bg,
	.progression-studios-transparent-header .progression-sticky-scrolled header#masthead-pro, .progression-sticky-scrolled header#masthead-pro, #progression-sticky-header.progression-sticky-scrolled { background-color:" .   esc_attr(get_theme_mod('progression_studios_sticky_header_background_color', 'rgba(38,85,193,0.7)')) . "; }
	body .progression-sticky-scrolled #logo-pro img {
		$progression_studios_sticky_logo_width
		$progression_studios_sticky_logo_top
		$progression_studios_sticky_logo_bottom
	}
	$progression_studios_sticky_nav_padding
	$progression_studios_sticky_nav_option_font_color
	$progression_studios_optional_sticky_nav_font_hover
	$progression_studios_sticky_nav_underline
	/* END Sticky Nav Styles */
	/* START Main Navigation Customizer Styles */
	#progression-shopping-cart-count a.progression-count-icon-nav, nav#site-navigation { letter-spacing: " . esc_attr(get_theme_mod('progression_studios_nav_letterspacing', '0.07')) . "em; }

	.sf-menu li:after {
		background-color:" .   esc_attr(get_theme_mod('progression_studios_nav_divider_vertical', 'rgba(255,255,255,  0.08)')) . ";
		top:" . esc_attr((get_theme_mod('progression_studios_nav_padding', '28') / 2) + 7) . "px;
		height:calc(" . esc_attr(get_theme_mod('progression_studios_nav_padding', '28') / 2 + get_theme_mod('progression_studios_nav_font_size', '15')) . "px);
	}
	#progression-inline-icons .progression-studios-social-icons a {
		color:" . esc_attr(get_theme_mod('progression_studios_nav_font_color', '#ffffff')) . ";
		padding-top:" . esc_attr(get_theme_mod('progression_studios_nav_padding', '28') - 3) . "px;
		padding-bottom:" . esc_attr(get_theme_mod('progression_studios_nav_padding', '28') - 3) . "px;
		font-size:" . esc_attr(get_theme_mod('progression_studios_nav_font_size', '15') + 3) . "px;
	}
	.mobile-menu-icon-pro {
		min-width:" . esc_attr(get_theme_mod('progression_studios_nav_font_size', '15') + 6) . "px;
		color:" . esc_attr(get_theme_mod('progression_studios_nav_font_color', '#ffffff')) . ";
		padding-top:" . esc_attr(get_theme_mod('progression_studios_nav_padding', '28') - 3) . "px;
		padding-bottom:" . esc_attr(get_theme_mod('progression_studios_nav_padding', '28') - 5) . "px;
		font-size:" . esc_attr(get_theme_mod('progression_studios_nav_font_size', '15') + 6) . "px;
	}
	.mobile-menu-icon-pro:hover, .active-mobile-icon-pro .mobile-menu-icon-pro {
		color:" . esc_attr(get_theme_mod('progression_studios_nav_font_color_hover', '#ffffff')) . ";
	}
	.mobile-menu-icon-pro span.progression-mobile-menu-text {
		font-size:" . esc_attr(get_theme_mod('progression_studios_nav_font_size', '15')) . "px;
	}
	#progression-shopping-cart-count span.progression-cart-count {
		top:" . esc_attr(get_theme_mod('progression_studios_nav_padding', '28') - 1) . "px;
	}
	#progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon {
		color:" . esc_attr(get_theme_mod('progression_studios_nav_font_color', '#ffffff')) . ";
		padding-top:" . esc_attr(get_theme_mod('progression_studios_nav_padding', '28') - 5) . "px;
		padding-bottom:" . esc_attr(get_theme_mod('progression_studios_nav_padding', '28') - 5) . "px;
		font-size:" . esc_attr(get_theme_mod('progression_studios_nav_font_size', '15') + 10) . "px;
	}
	.progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon {
		color:" . esc_attr(get_theme_mod('progression_studios_nav_font_color', '#ffffff')) . ";
	}
	.progression-sticky-scrolled  #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon:hover,
	.progression-sticky-scrolled  .activated-class #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon,
	#progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon:hover,
	.activated-class #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon {
		color:" . esc_attr(get_theme_mod('progression_studios_nav_font_color_hover', '#ffffff')) . ";
	}
	#progression-studios-header-login-container a.progresion-studios-login-icon {
		color:" . esc_attr(get_theme_mod('progression_studios_nav_font_color', '#ffffff')) . ";
		padding-top:" . esc_attr(get_theme_mod('progression_studios_nav_padding', '28') - 13) . "px;
		padding-bottom:" . esc_attr(get_theme_mod('progression_studios_nav_padding', '28') - 13) . "px;
		font-size:" . esc_attr(get_theme_mod('progression_studios_nav_font_size', '15') + 8) . "px;
	}
	#progression-studios-header-search-icon i.pe-7s-search span, #progression-studios-header-login-container a.progresion-studios-login-icon span {
		font-size:" . esc_attr(get_theme_mod('progression_studios_nav_font_size', '15')) . "px;
	}
	#progression-studios-header-login-container a.progresion-studios-login-icon i.fa-sign-in {
		font-size:" . esc_attr(get_theme_mod('progression_studios_nav_font_size', '15') + 6) . "px;
	}

	#progression-studios-header-search-icon i.pe-7s-search {
		color:" . esc_attr(get_theme_mod('progression_studios_nav_font_color', '#ffffff')) . ";
		padding-top:" . esc_attr(get_theme_mod('progression_studios_nav_padding', '28') - 4) . "px;
		padding-bottom:" . esc_attr(get_theme_mod('progression_studios_nav_padding', '28') - 4) . "px;
		font-size:" . esc_attr(get_theme_mod('progression_studios_nav_font_size', '15') + 8) . "px;
	}
	.sf-menu a {
		color:" . esc_attr(get_theme_mod('progression_studios_nav_font_color', '#ffffff')) . ";
		padding-top:" . esc_attr(get_theme_mod('progression_studios_nav_padding', '28')) . "px;
		padding-bottom:" . esc_attr(get_theme_mod('progression_studios_nav_padding', '28')) . "px;
		font-size:" . esc_attr(get_theme_mod('progression_studios_nav_font_size', '15')) . "px;
		$progression_studios_optional_nav_bg
	}
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled  #progression-inline-icons .progression-studios-social-icons a,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled  #progression-inline-icons .progression-studios-social-icons a,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon i.pe-7s-search,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-login-container a.progresion-studios-login-icon,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon i.pe-7s-search,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-login-container a.progresion-studios-login-icon,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a  {
		color:" . esc_attr(get_theme_mod('progression_studios_nav_font_color', '#ffffff')) . ";
	}
	$progression_studios_sticky_nav_underline_default
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled  #progression-inline-icons .progression-studios-social-icons a:hover,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled  #progression-inline-icons .progression-studios-social-icons a:hover,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon:hover i.pe-7s-search,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon.active-search-icon-pro i.pe-7s-search,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-login-container:hover a.progresion-studios-login-icon,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-login-container.helpmeout-activated-class a.progresion-studios-login-icon,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav:hover,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a:hover,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon:hover i.pe-7s-search,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon.active-search-icon-pro i.pe-7s-search,


	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-login-container:hover a.progresion-studios-login-icon,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-login-container.helpmeout-activated-class a.progresion-studios-login-icon,

	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav:hover,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a:hover,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a,

	#progression-studios-header-login-container:hover a.progresion-studios-login-icon, #progression-studios-header-login-container.helpmeout-activated-class a.progresion-studios-login-icon,

	#progression-studios-header-search-icon:hover i.pe-7s-search, #progression-studios-header-search-icon.active-search-icon-pro i.pe-7s-search, #progression-inline-icons .progression-studios-social-icons a:hover, #progression-shopping-cart-count a.progression-count-icon-nav:hover, .sf-menu a:hover, .sf-menu li.sfHover a, .sf-menu li.current-menu-item a {
		color:" . esc_attr(get_theme_mod('progression_studios_nav_font_color_hover', '#ffffff')) . ";
	}
	ul#progression-studios-panel-login, #progression-checkout-basket, #panel-search-progression, .sf-menu ul {
		background:" .  esc_attr(get_theme_mod('progression_studios_sub_nav_bg', 'rgba(17,0,35,  0.86)')) . ";
	}
	$progression_studios_top_header_sub_nav_brder_top
	$progression_studios_sub_nav_brder_top
	#main-nav-mobile { background:" .  esc_attr(get_theme_mod('progression_studios_sub_nav_bg', 'rgba(17,0,35,  0.86)')) . "; }
	ul.mobile-menu-pro li a { color:" . esc_attr(get_theme_mod('progression_studios_sub_nav_hover_font_color', '#ffffff')) . "; }
	ul.mobile-menu-pro li a {
		letter-spacing:" .  esc_attr(get_theme_mod('progression_studios_sub_nav_letterspacing', '0.07')) . "em;
	}
	.sf-mega h2.mega-menu-heading:after {
		background:" .  esc_attr(get_theme_mod('progression_studios_sub_nav_h2_border_color', '#5c39f2')) . ";
	}
	ul#progression-studios-panel-login li a, .sf-menu li li a {
		letter-spacing:" .  esc_attr(get_theme_mod('progression_studios_sub_nav_letterspacing', '0.07')) . "em;
		font-size:" .  esc_attr(get_theme_mod('progression_studios_sub_nav_font_size', '14')) . "px;
	}
	#progression-checkout-basket .progression-sub-total {
		font-size:" .  esc_attr(get_theme_mod('progression_studios_sub_nav_font_size', '14')) . "px;
	}
	ul#progression-studios-panel-login, #panel-search-progression input, #progression-checkout-basket ul#progression-cart-small li.empty {
		font-size:" .  esc_attr(get_theme_mod('progression_studios_sub_nav_font_size', '14')) . "px;
	}
	ul#progression-studios-panel-login a,
	.progression-sticky-scrolled #progression-checkout-basket, .progression-sticky-scrolled #progression-checkout-basket a, .progression-sticky-scrolled .sf-menu li.sfHover li a, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li a, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, #panel-search-progression .search-form input.search-field, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover.highlight-button li a, .sf-menu li.current-menu-item.highlight-button li a, .progression-sticky-scrolled #progression-checkout-basket a.checkout-button-header-cart:hover, #progression-checkout-basket a.checkout-button-header-cart:hover, #progression-checkout-basket, #progression-checkout-basket a, .sf-menu li.sfHover li a, .sf-menu li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a {
		color:" . esc_attr(get_theme_mod('progression_studios_sub_nav_font_color', 'rgba(255,255,255,  0.82)')) . ";
	}

	.progression-sticky-scrolled ul#progression-studios-panel-login li a:hover, .progression-sticky-scrolled .sf-menu li li a:hover,  .progression-sticky-scrolled .sf-menu li.sfHover li a, .progression-sticky-scrolled .sf-menu li.current-menu-item li a, .sf-menu li.sfHover li a, .sf-menu li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a {
		background:none;
	}
	ul#progression-studios-panel-login a:hover,
	.progression-sticky-scrolled #progression-checkout-basket a:hover, .progression-sticky-scrolled #progression-checkout-basket ul#progression-cart-small li h6, .progression-sticky-scrolled #progression-checkout-basket .progression-sub-total span.total-number-add, .progression-sticky-scrolled .sf-menu li.sfHover li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover a, .progression-sticky-scrolled .sf-menu li.sfHover li li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a, .progression-sticky-scrolled .sf-menu li.sfHover li li li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression-sticky-scrolled .sf-menu li.sfHover li li li li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression-sticky-scrolled .sf-menu li.sfHover li li li li li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li li li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li li li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .sf-menu li.sfHover.highlight-button li a:hover, .sf-menu li.current-menu-item.highlight-button li a:hover, #progression-checkout-basket a.checkout-button-header-cart, #progression-checkout-basket a:hover, #progression-checkout-basket ul#progression-cart-small li h6, #progression-checkout-basket .progression-sub-total span.total-number-add, .sf-menu li.sfHover li a:hover, .sf-menu li.sfHover li.sfHover a, .sf-menu li.sfHover li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover a, .sf-menu li.sfHover li li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .sf-menu li.sfHover li li li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .sf-menu li.sfHover li li li li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a {
		color:" . esc_attr(get_theme_mod('progression_studios_sub_nav_hover_font_color', '#ffffff')) . ";
	}

	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count span.progression-cart-count,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count span.progression-cart-count,
	#progression-shopping-cart-count span.progression-cart-count {
		background:" . esc_attr(get_theme_mod('progression_studios_nav_cart_background', '#ffffff')) . ";
		color:" . esc_attr(get_theme_mod('progression_studios_nav_cart_color', '#0a0715')) . ";
	}
	.progression-sticky-scrolled .sf-menu .progression-mini-banner-icon,
	.progression-mini-banner-icon {
		background:" . esc_attr(get_theme_mod('progression_studios_nav_highlight_font_color', '#ffffff')) . ";
		color:#000000;
	}
	.progression-mini-banner-icon {
		top:" . esc_attr((get_theme_mod('progression_studios_nav_padding', '28') - get_theme_mod('progression_studios_nav_font_size', '15')) - 4) . "px;
		right:" . esc_attr(get_theme_mod('progression_studios_nav_left_right', '42') / 2) . "px;
	}
	.sf-menu ul {
		margin-left:" . esc_attr(get_theme_mod('progression_studios_nav_left_right', '42') / 3) . "px;
	}
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before,  .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before {
		background:" . esc_attr(get_theme_mod('progression_studios_nav_highlight_hover_background', 'rgba(255,255,255,0)')) . ";
	}
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover, .sf-menu li.sfHover.highlight-button a, .sf-menu li.current-menu-item.highlight-button a, .sf-menu li.highlight-button a, .sf-menu li.highlight-button a:hover {
		color:" . esc_attr(get_theme_mod('progression_studios_nav_highlight_font_color', '#ffffff')) . ";
	}
	.sf-menu li.highlight-button a:hover {
		color:" . esc_attr(get_theme_mod('progression_studios_nav_highlight_hover_color', '#ffffff')) . ";
	}
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:before,  .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:before, .sf-menu li.current-menu-item.highlight-button a:before, .sf-menu li.highlight-button a:before {
		color:" . esc_attr(get_theme_mod('progression_studios_nav_highlight_font_color', '#ffffff')) . ";
		background:" . esc_attr(get_theme_mod('progression_studios_nav_highlight_background', 'rgba(255,255,255,0)')) . ";
		opacity:1;
		width: 100%;
		width: calc(100% - 12px);
	}
	span.progression-studios-nav-cat-count {
		color:" . esc_attr(get_theme_mod('progression_studios_nav_cart_count_color', '#ffffff')) . ";
		background:" . esc_attr(get_theme_mod('progression_studios_nav_cart_count_background', 'rgba(255,255,255,  0.11)')) . ";
	}
	.sf-menu ul span.progression-studios-nav-cat-count {
		color:" . esc_attr(get_theme_mod('progression_studios_sub_nav_cart_count_color', '#ffffff')) . ";
		background:" . esc_attr(get_theme_mod('progression_studios_sub_nav_cart_count_background', 'rgba(255,255,255,  0.16)')) . ";
	}
	.sf-menu li.highlight-button a:before {
		border-color:" . esc_attr(get_theme_mod('progression_studios_nav_highlight_border', 'rgba(255,255,255,0.3)')) . ";
	}
	.sf-menu li.highlight-button a:hover:before {
		border-color:" . esc_attr(get_theme_mod('progression_studios_nav_highlight_border_hover', 'rgba(255,255,255,0.7)')) . ";
	}
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item.highlight-button a:hover:before, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before, .sf-menu li.current-menu-item.highlight-button a:hover:before, .sf-menu li.highlight-button a:hover:before {
		background:" . esc_attr(get_theme_mod('progression_studios_nav_highlight_hover_background', 'rgba(255,255,255,0)')) . ";
		width: 100%;
		width: calc(100% - 12px);
	}
	ul#progression-studios-panel-login li a, #progression-checkout-basket ul#progression-cart-small li, #progression-checkout-basket .progression-sub-total, #panel-search-progression .search-form input.search-field, .sf-mega li:last-child li a, body header .sf-mega li:last-child li a, .sf-menu li li a, .sf-mega h2.mega-menu-heading, .sf-mega ul, body .sf-mega ul, #progression-checkout-basket .progression-sub-total, #progression-checkout-basket ul#progression-cart-small li {
		border-color:" . esc_attr(get_theme_mod('progression_studios_sub_nav_border_color', 'rgba(255,255,255,  0)')) . ";
	}
	.sf-menu a:before {
		margin-left:" . esc_attr(get_theme_mod('progression_studios_nav_left_right', '42')) . "px;
	}
	.sf-menu a:hover:before, .sf-menu li.sfHover a:before, .sf-menu li.current-menu-item a:before {
	   width: calc(100% - " . esc_attr(get_theme_mod('progression_studios_nav_left_right', '42') * 2) . "px);
	}
	#progression-inline-icons .progression-studios-social-icons a {
		padding-left:" . esc_attr(get_theme_mod('progression_studios_nav_left_right', '42') -  7) . "px;
		padding-right:" . esc_attr(get_theme_mod('progression_studios_nav_left_right', '42') - 7) . "px;
	}
	#progression-inline-icons .progression-studios-social-icons {
		padding-right:" . esc_attr(get_theme_mod('progression_studios_nav_left_right', '42') - 7) . "px;
	}
	.sf-menu a {
		padding-left:" . esc_attr(get_theme_mod('progression_studios_nav_left_right', '42')) . "px;
		padding-right:" . esc_attr(get_theme_mod('progression_studios_nav_left_right', '42')) . "px;
	}

	.sf-menu li.highlight-button {
		margin-right:" . esc_attr(get_theme_mod('progression_studios_nav_left_right', '42') - 7) . "px;
		margin-left:" . esc_attr(get_theme_mod('progression_studios_nav_left_right', '42') - 7) . "px;
	}
	.sf-arrows .sf-with-ul {
		padding-right:" . esc_attr(get_theme_mod('progression_studios_nav_left_right', '42') + 15) . "px;
	}
	.sf-arrows .sf-with-ul:after {
		right:" . esc_attr(get_theme_mod('progression_studios_nav_left_right', '42') + 9) . "px;
	}

	.rtl .sf-arrows .sf-with-ul {
		padding-right:" . esc_attr(get_theme_mod('progression_studios_nav_left_right', '42')) . "px;
		padding-left:" . esc_attr(get_theme_mod('progression_studios_nav_left_right', '42') + 15) . "px;
	}
	.rtl  .sf-arrows .sf-with-ul:after {
		right:auto;
		left:" . esc_attr(get_theme_mod('progression_studios_nav_left_right', '42') + 9) . "px;
	}

	@media only screen and (min-width: 960px) and (max-width: 1300px) {
		#page-title-pro {
			padding-top:" . esc_attr(get_theme_mod('progression_studios_page_title_padding_top', '150') - 15) . "px;
			padding-bottom:" . esc_attr(get_theme_mod('progression_studios_page_title_padding_bottom', '150') - 15) . "px;
		}

		#progression-studios-post-page-title {
			padding-top:" . esc_attr(get_theme_mod('progression_studios_page_title__postpadding_top', '130') - 15) . "px;
			padding-bottom:" .  esc_attr(get_theme_mod('progression_studios_page_title_post_padding_bottom', '125') - 15) . "px;
		}

		.sf-menu ul {
			margin-left:" . esc_attr((get_theme_mod('progression_studios_nav_left_right', '42') / 3) - 4) . "px;
		}
		.sf-menu a:before {
			margin-left:" . esc_attr(get_theme_mod('progression_studios_nav_left_right', '42') - 8) . "px;
		}
		.sf-menu a:before, .sf-menu a:hover:before, .sf-menu li.sfHover a:before, .sf-menu li.current-menu-item a:before {
		   width: calc(100% - " . esc_attr((get_theme_mod('progression_studios_nav_left_right', '42') * 2) - 10) . "px);
		}
		.sf-menu a {
			padding-left:" . esc_attr(get_theme_mod('progression_studios_nav_left_right', '42') - 8) . "px;
			padding-right:" . esc_attr(get_theme_mod('progression_studios_nav_left_right', '42') - 8) . "px;
		}
		.sf-arrows .sf-with-ul {
			padding-right:" . esc_attr(get_theme_mod('progression_studios_nav_left_right', '42') + 10) . "px;
		}
		.sf-arrows .sf-with-ul:after {
			right:" . esc_attr(get_theme_mod('progression_studios_nav_left_right', '42') + 4) . "px;
		}
	}
	$progression_studios_optiona_nav_bg_hover
	$progression_studios_optiona_sticky_nav_font_bg
	$progression_studios_optiona_sticky_nav_hover_bg
	$progression_studios_option_sticky_nav_font_color
	$progression_studios_option_stickY_nav_font_hover_color
	$progression_studios_option_sticky_hightlight_bg_color
	$progression_studios_option_sticky_hightlight_font_color
	$progression_studios_option_sticky_hightlight_bg_color_hover
	/* END Main Navigation Customizer Styles */
	/* START Top Header Top Styles */
	#ratency-progression-header-top {
		font-size:" . esc_attr(get_theme_mod('progression_studios_top_header_font_size', '13')) . "px;
		$progression_studios_top_header_off_on_display
	}
	#ratency-progression-header-top .sf-menu a {
		font-size:" . esc_attr(get_theme_mod('progression_studios_top_header_font_size', '13')) . "px;
	}
	.progression-studios-header-left .widget, .progression-studios-header-right .widget {
		padding-top:" . esc_attr(get_theme_mod('progression_studios_top_header_padding', '13') + 2) . "px;
		padding-bottom:" . esc_attr(get_theme_mod('progression_studios_top_header_padding', '13') + 1) . "px;
	}
	#ratency-progression-header-top .sf-menu a {
		padding-top:" . esc_attr(get_theme_mod('progression_studios_top_header_padding', '13') + 2) . "px;
		padding-bottom:" . esc_attr(get_theme_mod('progression_studios_top_header_padding', '13') + 2) . "px;
	}
	#ratency-progression-header-top  .progression-studios-social-icons a {
		font-size:" . esc_attr(get_theme_mod('progression_studios_top_header_font_size', '13')) . "px;
		min-width:" . esc_attr(get_theme_mod('progression_studios_top_header_font_size', '13') + 1) . "px;
		padding:" . esc_attr(get_theme_mod('progression_studios_top_header_padding', '13') + 1) . "px " . esc_attr(get_theme_mod('progression_studios_top_header_padding', '13') - 1) . "px;
		$progression_studios_top_header_icon_bg
		color:" . esc_attr(get_theme_mod('progression_studios_header_icon_color', '#bbbbbb')) . ";
		border-right:1px solid " . esc_attr(get_theme_mod('progression_studios_header_icon_border_color', '#585752')) . ";
	}
	#ratency-progression-header-top .progression-studios-social-icons a:hover {
		color:" . esc_attr(get_theme_mod('progression_studios_top_header_icon_hover_color', '#ffffff')) . ";
	}
	#ratency-progression-header-top  .progression-studios-social-icons a:nth-child(1) {
		border-left:1px solid " . esc_attr(get_theme_mod('progression_studios_header_icon_border_color', '#585752')) . ";
	}
	#main-nav-mobile .progression-studios-social-icons a {
		background:" . esc_attr(get_theme_mod('progression_studios_header_icon_bg_color', '#444444')) . ";
		color:" . esc_attr(get_theme_mod('progression_studios_header_icon_color', '#bbbbbb')) . ";
	}
	#ratency-progression-header-top a, #ratency-progression-header-top .sf-menu a, #ratency-progression-header-top {
		color:" . esc_attr(get_theme_mod('progression_studios_top_header_color', '#dddddd')) . ";
	}
	#ratency-progression-header-top a:hover, #ratency-progression-header-top .sf-menu a:hover, #ratency-progression-header-top .sf-menu li.sfHover a {
		color:" . esc_attr(get_theme_mod('progression_studios_top_header_hover_color', '#ffffff')) . ";
	}

	#ratency-progression-header-top .sf-menu ul {
		background:" . esc_attr(get_theme_mod('progression_studios_top_header_sub_bg', '#ffffff')) . ";
	}
	#ratency-progression-header-top .sf-menu ul li a {
		border-color:" . esc_attr(get_theme_mod('progression_studios_top_header_sub_border_clr', '#e8e8e8')) . ";
	}

	.progression_studios_force_dark_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li a, .progression_studios_force_dark_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_dark_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li a, .progression_studios_force_light_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_light_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, #ratency-progression-header-top .sf-menu li.sfHover li a, #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li a, #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li a, #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a {
		color:" . esc_attr(get_theme_mod('progression_studios_top_header_sub_color', '#717171')) . "; }
	.progression_studios_force_light_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li a:hover, .progression_studios_force_light_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li.sfHover a, .progression_studios_force_light_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li li a:hover, .progression_studios_force_light_top_header_color #ratency-progression-header-top  .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li li li a:hover, .progression_studios_force_light_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_light_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_light_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li a:hover, .progression_studios_force_dark_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li.sfHover a, .progression_studios_force_dark_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li li a:hover, .progression_studios_force_dark_top_header_color #ratency-progression-header-top  .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li li li a:hover, .progression_studios_force_dark_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_dark_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_dark_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_top_header_color #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, #ratency-progression-header-top .sf-menu li.sfHover li a:hover, #ratency-progression-header-top .sf-menu li.sfHover li.sfHover a, #ratency-progression-header-top .sf-menu li.sfHover li li a:hover, #ratency-progression-header-top  .sf-menu li.sfHover li.sfHover li.sfHover a, #ratency-progression-header-top .sf-menu li.sfHover li li li a:hover, #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover a:hover, #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, #ratency-progression-header-top .sf-menu li.sfHover li li li li a:hover, #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, #ratency-progression-header-top .sf-menu li.sfHover li li li li li a:hover, #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, #ratency-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a {
		color:" . esc_attr(get_theme_mod('progression_studios_top_header_sub_hover_color', '#99b4ee')) . ";
	}
	#ratency-progression-header-top {
		$progression_studios_top_header_background_option
	}
	#ratency-progression-header-top .l-container {
		$progression_studios_top_header_border_bottom_option
	}
	/* END Top Header Top Styles */
	/* START FOOTER STYLES */
	footer#site-footer {
		background: " . esc_attr(get_theme_mod('progression_studios_footer_background', '#250a43')) . ";
	}
	#pro-scroll-top:hover {   color: " . esc_attr(get_theme_mod('progression_studios_scroll_hvr_color', '#ffffff')) . ";    background: " . esc_attr(get_theme_mod('progression_studios_scroll_hvr_bg_color', '#5c39f2')) . ";  }
	footer#site-footer #copyright-text {  color: " . esc_attr(get_theme_mod('progression_studios_copyright_text_color', '#a5a0ad')) . ";}
	footer#site-footer #progression-studios-copyright a {  color: " . esc_attr(get_theme_mod('progression_studios_copyright_link', '#dddddd')) . ";}
	footer#site-footer #progression-studios-copyright a:hover { color: " . esc_attr(get_theme_mod('progression_studios_copyright_link_hover', '#ffffff')) . "; }
	#pro-scroll-top { $progression_studios_scroll_top_disable color:" . esc_attr(get_theme_mod('progression_studios_scroll_color', '#ffffff')) . ";  background: " . esc_attr(get_theme_mod('progression_studios_scroll_bg_color', 'rgba(100,100,100,  0.65)')) . ";  }
	#copyright-text { padding:" . esc_attr(get_theme_mod('progression_studios_copyright_margin_top', '45')) . "px 0px " . esc_attr(get_theme_mod('progression_studios_copyright_margin_bottom', '50')) . "px 0px; }
	#progression-studios-footer-logo { max-width:" . esc_attr(get_theme_mod('progression_studios_footer_logo_width', '250')) . "px; padding-top:" . esc_attr(get_theme_mod('progression_studios_footer_logo_margin_top', '45')) . "px; padding-bottom:" . esc_attr(get_theme_mod('progression_studios_footer_logo_margin_bottom', '0')) . "px; padding-right:" . esc_attr(get_theme_mod('progression_studios_footer_logo_margin_right', '0')) . "px; padding-left:" . esc_attr(get_theme_mod('progression_studios_footer_logo_margin_left', '0')) . "px; }
	/* END FOOTER STYLES */
	@media only screen and (max-width: 767px) {
		#masthead-pro .search-form {
			display:" . esc_attr(get_theme_mod('progression_studios_header_search_mobile', 'none')) . ";
		}
	}
	@media only screen and (max-width: 959px) {
		#page-title-pro {
			padding-top:" . esc_attr(get_theme_mod('progression_studios_page_title_padding_top', '150') - 25) . "px;
			padding-bottom:" . esc_attr(get_theme_mod('progression_studios_page_title_padding_bottom', '150') - 25) . "px;
		}
		#progression-studios-post-page-title {
			padding-top:" . esc_attr(get_theme_mod('progression_studios_page_title__postpadding_top', '130') - 25) . "px;
			padding-bottom:" .  esc_attr(get_theme_mod('progression_studios_page_title_post_padding_bottom', '125') - 25) . "px;
		}
		$progression_studios_header_bg_optional
		.progression-studios-transparent-header header#masthead-pro {
			$progression_studios_header_bg_image
			$progression_studios_header_bg_cover
		}
		$progression_studios_mobile_header_bg_color
		$progression_studios_mobile_header_logo_width
		$progression_studios_mobile_header_logo_margin_top
		$progression_studios_mobile_header_nav_padding_top
	}
	@media only screen and (min-width: 960px) and (max-width: " . esc_attr(get_theme_mod('progression_studios_site_width', '1200') + 100) . "px) {
		#progression-shopping-cart-count a.progression-count-icon-nav {
			margin-left:4px;
		}
		.l-container {
			width:94%;
			padding:0px;
		}
		footer#site-footer.progression-studios-footer-full-width .l-container,
		.progression-studios-page-title-full-width #page-title-pro .l-container,
		.progression-studios-header-full-width #ratency-progression-header-top .l-container {
			width:94%;
			padding:0px;
		}
		.progression-studios-header-full-width-no-gap.progression-studios-header-cart-width-adjustment header#masthead-pro .l-container,
		.progression-studios-header-full-width.progression-studios-header-cart-width-adjustment header#masthead-pro .l-container {
			width:98%;
			margin-left:2%;
			padding-right:0;
		}
		#ratency-progression-header-top ul .sf-mega,
		header ul .sf-mega {
			margin-right:0%;
			width:100%;
			left:0px;
			margin-left:auto;
		}
	}
	.progression-studios-spinner { border-left-color:" . esc_attr(get_theme_mod('progression_studios_page_loader_secondary_color', '#ededed')) . ";  border-right-color:" . esc_attr(get_theme_mod('progression_studios_page_loader_secondary_color', '#ededed')) . "; border-bottom-color: " . esc_attr(get_theme_mod('progression_studios_page_loader_secondary_color', '#ededed')) . ";  border-top-color: " . esc_attr(get_theme_mod('progression_studios_page_loader_text', '#cccccc')) . "; }
	.sk-folding-cube .sk-cube:before, .sk-circle .sk-child:before, .sk-rotating-plane, .sk-double-bounce .sk-child, .sk-wave .sk-rect, .sk-wandering-cubes .sk-cube, .sk-spinner-pulse, .sk-chasing-dots .sk-child, .sk-three-bounce .sk-child, .sk-fading-circle .sk-circle:before, .sk-cube-grid .sk-cube{
		background-color:" . esc_attr(get_theme_mod('progression_studios_page_loader_text', '#cccccc')) . ";
	}
	#page-loader-pro {
		background:" . esc_attr(get_theme_mod('progression_studios_page_loader_bg', '#ffffff')) . ";
		color:" . esc_attr(get_theme_mod('progression_studios_page_loader_text', '#cccccc')) . ";
	}
	$progression_studios_boxed_layout
	::-moz-selection {color:" . esc_attr(get_theme_mod('progression_studios_select_color', '#ffffff')) . ";background:" . esc_attr(get_theme_mod('progression_studios_select_bg', '#5c39f2')) . ";}
	::selection {color:" . esc_attr(get_theme_mod('progression_studios_select_color', '#ffffff')) . ";background:" . esc_attr(get_theme_mod('progression_studios_select_bg', '#5c39f2')) . ";}
	";
	wp_add_inline_style('progression-studios-custom-style', $progression_studios_custom_css);
}
add_action('wp_enqueue_scripts', 'progression_studios_customizer_styles');