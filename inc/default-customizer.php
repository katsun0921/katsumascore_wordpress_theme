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
			'priority'    => 4,
			'title'       => esc_html__('General', 'ratency-progression'),
		)
	);

	/* Section - General - General Layout */
	$wp_customize->add_section(
		'progression_studios_section_general_sns_link',
		array(
			'title'          => esc_html__('SNS Links', 'ratency-progression'),
			'panel'          => 'progression_studios_general_panel', // Not typically needed.
			'priority'       => 10,
		)
	);

	/* Section - General - SNS - Link */
	$wp_customize->add_section(
		'progression_studios_section_general_sns_link',
		array(
			'title'          => esc_html__('SNS Link', 'ratency-progression'),
			'panel'          => 'progression_studios_general_panel', // Not typically needed.
			'priority'       => 10,
		)
	);
	/* Setting - General - SNS Link */
	$wp_customize->add_setting('progression_studios_general_rss', array(
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(
		'progression_studios_general_rss',
		array(
			'label'          => esc_html__('RSS Link', 'progression-elements-ratency'),
			'section' => 'progression_studios_section_general_sns_link',
			'type' => 'text',
			'priority'   => 10,
		)
	);

	/* Setting - General - SNS Link */
	$wp_customize->add_setting( 'progression_studios_general_facebook' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_general_facebook', array(
		'label'          => esc_html__( 'Facebook Link', 'progression-elements-ratency' ),
		'section' => 'progression_studios_section_general_sns_link',
		'type' => 'text',
		'priority'   => 10,
		)
	);

	/* Setting - General - SNS Link */
	$wp_customize->add_setting( 'progression_studios_general_twitter' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_general_twitter', array(
		'label'          => esc_html__( 'Twitter Link', 'progression-elements-ratency' ),
		'section' => 'progression_studios_section_general_sns_link',
		'type' => 'text',
		'priority'   => 15,
		)
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
