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
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting('progression_studios_general_rss', array(
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(
		'progression_studios_general_rss',
		array(
			'label'          => esc_html__('RSS Icon', 'progression-elements-ratency'),
			'section' => 'progression_studios_section_general_sns_link',
			'type' => 'text',
			'priority'   => 10,
		)
	);

	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_general_facebook' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_general_facebook', array(
		'label'          => esc_html__( 'Facebook Icon', 'progression-elements-ratency' ),
		'section' => 'progression_studios_section_general_sns_link',
		'type' => 'text',
		'priority'   => 10,
		)
	);

	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_general_twitter' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_general_twitter', array(
		'label'          => esc_html__( 'Twitter Icon', 'progression-elements-ratency' ),
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