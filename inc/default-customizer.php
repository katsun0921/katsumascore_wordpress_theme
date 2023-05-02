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
