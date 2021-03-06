<?php
	/**
	 * Class for custom post templates
	 */
	class Raratheme_Companion_Templates
	{
		function init()
		{
			add_filter( 'template_include', array( $this, 'rrtc_include_template_function' ) );
			add_action( 'wp_loaded', array( $this, 'rrtc_add_portfolio_templates' ) );
		}
	    /**
	     * Portfolio template.
	    */
	    function rrtc_get_portfolio_template( $template ) {
		    $post = get_post();
		    $page_template = get_post_meta( $post->ID, '_wp_page_template', true );
		    if( $page_template == 'templates/portfolio.php' ){
		        if ( $theme_file = locate_template( 'templates/portfolio.php' ) ) {
	                return $theme_file;
	            } else {
	                return RARATC_BASE_PATH . '/includes/templates/portfolio.php';
	            }
		    }
		    return $template;
		}

		/**
		 * Template over-ride for single portfolio.
		 *
		 * @since    1.0.0
		 */
		function rrtc_include_template_function( $template_path ) {
		    if ( get_post_type() == 'rara-portfolio' ) {
		        if ( is_single() ) {
		            if ( $theme_file = locate_template( 'single-rara-portfolio.php' ) ) {
		                $template_path = $theme_file;
		            } else {
		                $template_path = RARATC_BASE_PATH . '/includes/templates/single-rara-portfolio.php';
		            }
		        }
		    }
		    return $template_path;
		}


		/**
	     * Portfolio template returned.
	    */
		function rrtc_filter_admin_page_templates( $templates ) {
		    $templates['templates/portfolio.php'] = __( 'Portfolio Template', 'raratheme-companion' );
		    return $templates;
		}

		/**
	     * Portfolio template added.
	    */
		function rrtc_add_portfolio_templates() {
		    if( is_admin() ) {
		        add_filter( 'theme_page_templates', array($this, 'rrtc_filter_admin_page_templates' ) );
		    }
		    else {
		        add_filter( 'page_template', array( $this, 'rrtc_get_portfolio_template' ) );
		    }
		}
	}
	$obj = new Raratheme_Companion_Templates;
	$obj->init();