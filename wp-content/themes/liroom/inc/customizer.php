<?php
/**
 * liroom Lite Theme Customizer.
 *
 * @package liroom
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function liroom_customize_register( $wp_customize ) {

	// Load custom controls
	//require_once get_template_directory() . '/inc/customizer-controls.php';


	// Remove default sections
	$wp_customize->remove_section('colors');
	$wp_customize->remove_section('background_image');

	// Remove default control.

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/*------------------------------------------------------------------------*/
    /*  Site Identity apply_filters('the_title', '  My Custom Title (tm)  ');
    /*------------------------------------------------------------------------*/

    	$wp_customize->add_setting( 'liroom_site_logo',
			array(
				'sanitize_callback' => 'liroom_sanitize_file_url',
			)
		);
    	$wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'liroom_site_logo',
				array(
					'label' 		=> __('Site Logo', 'liroom-lite'),
					'section' 		=> 'title_tagline',
					'description'   => esc_html__('Your site logo', 'liroom-lite'),
				)
			)
		);
		
		$wp_customize->add_setting(
			'Copyright'
		);
		$wp_customize->add_control(
			'Copyright',
			array(
				'label' => 'Copyright',
				'section' => 'title_tagline',
				'type' => 'text',
			)
		);
		
		$wp_customize->add_setting(
			'liroom_fb'
		);
		$wp_customize->add_control(
			'liroom_fb',
			array(
				'label' => 'Ссылка на FB',
				'section' => 'title_tagline',
				'type' => 'text',
			)
		);
		
		$wp_customize->add_setting(
			'liroom_tw'
		);
		$wp_customize->add_control(
			'liroom_tw',
			array(
				'label' => 'Ссылка на TWITTER',
				'section' => 'title_tagline',
				'type' => 'text',
			)
		);
		
		$wp_customize->add_setting(
			'liroom_sc'
		);
		$wp_customize->add_control(
			'liroom_sc',
			array(
				'label' => 'Ссылка на SOUNDCLOUD',
				'section' => 'title_tagline',
				'type' => 'text',
			)
		);
		
		$wp_customize->add_setting(
			'liroom_vk'
		);
		$wp_customize->add_control(
			'liroom_vk',
			array(
				'label' => 'Ссылка на Telegram',
				'section' => 'title_tagline',
				'type' => 'text',
			)
		);
	
		$wp_customize->add_setting(
			'liroom_ytb'
		);
		$wp_customize->add_control(
			'liroom_ytb',
			array(
				'label' => 'Ссылка на Ютуб',
				'section' => 'title_tagline',
				'type' => 'text',
			)
		);
		$wp_customize->add_setting(
			'liroom_inst'
		);
		$wp_customize->add_control(
			'liroom_inst',
			array(
				'label' => 'Ссылка на Инстаграмм',
				'section' => 'title_tagline',
				'type' => 'text',
			)
		);

	/*------------------------------------------------------------------------*/
    /*  Layout
    /*------------------------------------------------------------------------*/
	$wp_customize->add_section( 'liroom_layout' ,
		array(
			'priority'    => 23,
			'title'       => __( 'Site Layout', 'liroom-lite' ),
			'description' => '',
		)
	);

		$wp_customize->add_setting( 'layout_sidebar', array(
			'sanitize_callback' => 'liroom_sanitize_select',
			'default'           => 'right',
		) );
		$wp_customize->add_control( 'layout_sidebar', array(
			'label'      => esc_html__( 'Default Sidebar Position', 'liroom-lite' ),
			'section'    => 'liroom_layout',
			'type'       => 'radio',
			'choices'    => array(
				'left'   => __( 'Left Sidebar', 'liroom-lite' ),
				'right'  => __( 'Right Sidebar', 'liroom-lite' )
			),
		) );

		$wp_customize->add_setting( 'layout_frontpage_posts', array(
			'sanitize_callback' => 'liroom_sanitize_select',
			'default'           => 'grid',
		) );
		$wp_customize->add_control( 'layout_frontpage_posts', array(
			'label'      => esc_html__( 'Front Page Posts Layout', 'liroom-lite' ),
			'section'    => 'liroom_layout',
			'type'       => 'radio',
			'choices'    => array(
				'list'   => __( 'List', 'liroom-lite' ),
				'grid'   => __( 'Grid', 'liroom-lite' ),
			),
		) );

		$wp_customize->add_setting( 'layout_archive_posts', array(
			'sanitize_callback' => 'liroom_sanitize_select',
			'default'           => 'grid',
		) );
		$wp_customize->add_control( 'layout_archive_posts', array(
			'label'      => esc_html__( 'Archive Page Posts Layout', 'liroom-lite' ),
			'section'    => 'liroom_layout',
			'type'       => 'radio',
			'choices'    => array(
				'list'   => __( 'List', 'liroom-lite' ),
				'grid'   => __( 'Grid', 'liroom-lite' ),
			),
			'description' => esc_html__( 'Category, Tag, Author, Archive Page&hellip;', 'liroom-lite' ),
		) );

}
add_action( 'customize_register', 'liroom_customize_register' );

/*------------------------------------------------------------------------*/
/*  Sanitize Functions.
/*------------------------------------------------------------------------*/

function liroom_sanitize_file_url( $file_url ) {
	$output = '';
	$filetype = wp_check_filetype( $file_url );
	if ( $filetype["ext"] ) {
		$output = esc_url( $file_url );
	}
	return $output;
}

function liroom_sanitize_number( $input ) {
    return force_balance_tags( $input );
}

function liroom_sanitize_select( $input, $setting ) {
	$input = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function liroom_sanitize_hex_color( $color ) {
	if ( $color === '' ) {
		return '';
	}
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
		return $color;
	}
	return null;
}

function liroom_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
		return 1;
    } else {
		return 0;
    }
}

function liroom_sanitize_text( $string ) {
	return wp_kses_post( force_balance_tags( $string ) );
}

function liroom_sanitize_html_input( $string ) {
	return wp_kses_allowed_html( $string );
}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function liroom_customize_preview_js() {
	//wp_enqueue_script( 'liroom_customizer_preview', get_template_directory_uri() . '/assets/js/customizer-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'liroom_customize_preview_js' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function liroom_customize_js() {
	//wp_enqueue_script( 'liroom_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-controls' ), '20130508', true );
}
add_action( 'customize_controls_print_scripts', 'liroom_customize_js' );
