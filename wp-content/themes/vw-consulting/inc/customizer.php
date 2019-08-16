<?php
/**
 * VW Consulting Theme Customizer
 *
 * @package VW Consulting
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function vw_consulting_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_consulting_custom_controls' );

function vw_consulting_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_consulting_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-consulting' ),
	) );

	// Layout
	$wp_customize->add_section( 'vw_consulting_left_right', array(
    	'title'      => __( 'General Settings', 'vw-consulting' ),
		'panel' => 'vw_consulting_panel_id'
	) );

	$wp_customize->add_setting('vw_consulting_theme_options',array(
        'default' => __('Right Sidebar','vw-consulting'),
        'sanitize_callback' => 'vw_consulting_sanitize_choices'
	));
	$wp_customize->add_control('vw_consulting_theme_options',array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-consulting'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-consulting'),
        'section' => 'vw_consulting_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-consulting'),
            'Right Sidebar' => __('Right Sidebar','vw-consulting'),
            'One Column' => __('One Column','vw-consulting'),
            'Three Columns' => __('Three Columns','vw-consulting'),
            'Four Columns' => __('Four Columns','vw-consulting'),
            'Grid Layout' => __('Grid Layout','vw-consulting')
        ),
	) );

	$wp_customize->add_setting('vw_consulting_page_layout',array(
        'default' => __('One Column','vw-consulting'),
        'sanitize_callback' => 'vw_consulting_sanitize_choices'
	));
	$wp_customize->add_control('vw_consulting_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-consulting'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-consulting'),
        'section' => 'vw_consulting_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-consulting'),
            'Right Sidebar' => __('Right Sidebar','vw-consulting'),
            'One Column' => __('One Column','vw-consulting')
        ),
	) );

	//Contact Info
	$wp_customize->add_section( 'vw_consulting_topbar', array(
    	'title'      => __( 'Contact Info Settings', 'vw-consulting' ),
		'panel' => 'vw_consulting_panel_id'
	) );

	$wp_customize->add_setting('vw_consulting_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_consulting_call',array(
		'label'	=> __('Add Phone Number','vw-consulting'),
		'input_attrs' => array(
            'placeholder' => __( '+00 1234 567 890', 'vw-consulting' ),
        ),
		'section'=> 'vw_consulting_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_consulting_email',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_consulting_email',array(
		'label'	=> __('Add Email Address','vw-consulting'),
		'input_attrs' => array(
            'placeholder' => __( 'example@gmail.com', 'vw-consulting' ),
        ),
		'section'=> 'vw_consulting_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_consulting_time',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_consulting_time',array(
		'label'	=> __('Add Opening Time','vw-consulting'),
		'input_attrs' => array(
            'placeholder' => __( 'Mon to Sat 11:00 am - 5:30pm Sunday: Closed', 'vw-consulting' ),
        ),
		'section'=> 'vw_consulting_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_consulting_search_enable',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_consulting_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Consulting_Toggle_Switch_Custom_Control( $wp_customize, 'vw_consulting_search_enable',array(
      	'label' => esc_html__( 'Show / Hide Search','vw-consulting' ),
      	'section' => 'vw_consulting_topbar'
    )));
   
	//Slider
	$wp_customize->add_section( 'vw_consulting_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-consulting' ),
		'panel' => 'vw_consulting_panel_id'
	) );

	$wp_customize->add_setting( 'vw_consulting_slider_arrows',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_consulting_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Consulting_Toggle_Switch_Custom_Control( $wp_customize, 'vw_consulting_slider_arrows',array(
      	'label' => esc_html__( 'Show / Hide Slider','vw-consulting' ),
      	'section' => 'vw_consulting_slidersettings'
    )));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'vw_consulting_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_consulting_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_consulting_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'vw-consulting' ),
			'description' => __('Slider image size (1600 x 800)','vw-consulting'),
			'section'  => 'vw_consulting_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}
 
	//About Section
	$wp_customize->add_section( 'vw_consulting_services_section' , array(
    	'title'      => __( 'Services Settings', 'vw-consulting' ),
		'priority'   => null,
		'panel' => 'vw_consulting_panel_id'
	) );

	$wp_customize->add_setting('vw_consulting_section_sub_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_consulting_section_sub_title',array(
		'label'	=> __('Add Section Text','vw-consulting'),
		'input_attrs' => array(
            'placeholder' => __( 'INDUSTRIES', 'vw-consulting' ),
        ),
		'section'=> 'vw_consulting_services_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_consulting_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_consulting_section_title',array(
		'label'	=> __('Add Section Title','vw-consulting'),
		'input_attrs' => array(
            'placeholder' => __( 'OUR SERVICES', 'vw-consulting' ),
        ),
		'section'=> 'vw_consulting_services_section',
		'type'=> 'text'
	));

	$categories = get_categories();
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';	
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_consulting_services',array(
		'default'	=> 'select',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('vw_consulting_services',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Category to display Services','vw-consulting'),
		'description'=> __('Size of image should be 370 x 270 ','vw-consulting'),
		'section' => 'vw_consulting_services_section',
	));
	
	//Content Craetion
	$wp_customize->add_section( 'vw_consulting_content_section' , array(
    	'title' => __( 'Customize Home Page Settings', 'vw-consulting' ),
		'priority' => null,
		'panel' => 'vw_consulting_panel_id'
	) );

	$wp_customize->add_setting('vw_consulting_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new VW_Consulting_Content_Creation( $wp_customize, 'vw_consulting_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','vw-consulting' ),
		),
		'section' => 'vw_consulting_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'vw-consulting' ),
	) ) );

	//Footer Text
	$wp_customize->add_section('vw_consulting_footer',array(
		'title'	=> __('Footer Settings','vw-consulting'),
		'panel' => 'vw_consulting_panel_id',
	));	
	
	$wp_customize->add_setting('vw_consulting_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_consulting_footer_text',array(
		'label'	=> __('Copyright Text','vw-consulting'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2019, .....', 'vw-consulting' ),
        ),
		'section'=> 'vw_consulting_footer',
		'type'=> 'text'
	));	

	$wp_customize->add_setting( 'vw_consulting_scroll_enable',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_consulting_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Consulting_Toggle_Switch_Custom_Control( $wp_customize, 'vw_consulting_scroll_enable',array(
      	'label' => esc_html__( 'Show / Hide Scroll Top','vw-consulting' ),
      	'section' => 'vw_consulting_footer'
    )));
}

add_action( 'customize_register', 'vw_consulting_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Consulting_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Consulting_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new VW_Consulting_Customize_Section_Pro( $manager,'example_1', array(
			'priority'   => 9,
			'title'    => esc_html__( 'VW Consulting PRO', 'vw-consulting' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-consulting' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/consulting-wordpress-theme/'),
		) )	);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-consulting-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-consulting-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Consulting_Customize::get_instance();