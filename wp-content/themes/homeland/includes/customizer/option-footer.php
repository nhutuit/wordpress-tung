<?php
  // Footer Section
	$wp_customize->add_section('homeland_footer_section', array(
		'title' => esc_html__('Footer W…P…L…O…C…K…E…R….…C…O…M', 'homeland'),
		'priority' => 127
	));

		// Hide Widgets
		$wp_customize->add_setting( 'homeland_hide_widgets', array(
			'type' => 'option',
			'default' => '',
			'sanitize_callback' => 'homeland_option_yes_no',
		) );
		$wp_customize->add_control( 'homeland_hide_widgets', array(
			'label' => esc_html__( 'Hide Footer Widgets?', 'homeland' ),
			'type' => 'radio',
			'section' => 'homeland_footer_section',
			'choices' => array(
				'true' => esc_html__( 'Yes', 'homeland' ),
				'' => esc_html__( 'No', 'homeland' ),
			)
		) );

		// Layout
		$wp_customize->add_setting( 'homeland_footer_layout', array(
			'type' => 'option',
			'default' => 'Default',
			'sanitize_callback' => 'homeland_option_footer_layout',
		) );
		$wp_customize->add_control( 'homeland_footer_layout', array(
			'label' => esc_html__( 'Footer Layout', 'homeland' ),
			'type' => 'select',
			'section' => 'homeland_footer_section',
			'choices' => array(
				'Default' => esc_html__( 'Default', 'homeland' ),
				'Layout 2' => esc_html__( 'Layout 2', 'homeland' ),
				'Layout 3' => esc_html__( 'Layout 3', 'homeland' ),
				'Layout 4' => esc_html__( 'Layout 4', 'homeland' ),
				'Layout 5' => esc_html__( 'Layout 5', 'homeland' ),
				'Layout 6' => esc_html__( 'Layout 6', 'homeland' ),
			)
		) );

		// Copyright text
		$wp_customize->add_setting('homeland_copyright_text', array(
			'type' => 'option',
			'sanitize_callback' => 'homeland_with_html',
		));

		$wp_customize->add_control('homeland_copyright_text', array(
		 	'label' => esc_html__('Copyright Text', 'homeland'),
		 	'section' => 'homeland_footer_section',
		 	'type' => 'text',
		));

		// Google Analytics
		$wp_customize->add_setting('homeland_ga_code', array(
			'type' => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control('homeland_ga_code', array(
		 	'label' => esc_html__('Google Analytics Code', 'homeland'),
		 	'section' => 'homeland_footer_section',
		 	'description' => esc_html__('Paste your google analytics code here from google', 'homeland'),
		 	'type' => 'textarea',
		));
?>