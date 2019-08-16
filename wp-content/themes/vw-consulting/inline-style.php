<?php
	
	/*---------------------------First highlight color-------------------*/

	$vw_consulting_first_color = get_theme_mod('vw_consulting_first_color');

	$custom_css = ''; 

	if($vw_consulting_first_color != false){
		$custom_css .='#footer .textwidget a{';
			$custom_css .='color: '.esc_html($vw_consulting_first_color).';';
		$custom_css .='}';
	}

	/*---------------------------Second highlight color-------------------*/

	$vw_consulting_second_color = get_theme_mod('vw_consulting_second_color');

	if($vw_consulting_second_color != false){
		$custom_css .='#header .menu a::after, #header .menu a::before, .scrollup{';
			$custom_css .='background-color: '.esc_html($vw_consulting_second_color).';';
		$custom_css .='}';
	}
	if($vw_consulting_second_color != false){
		$custom_css .='#contact_info .custom-social-icons a i:hover, .page-template-custom-home-page #header .nav ul li a:hover, #footer li a:hover, #footer caption, .post-main-box:hover h3, #sidebar ul li a:hover, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .post-navigation a:hover, .post-navigation a:focus{';
			$custom_css .='color: '.esc_html($vw_consulting_second_color).';';
		$custom_css .='}';
	}
	if($vw_consulting_first_color != false || $vw_consulting_second_color != false){
		$custom_css .='input[type="submit"], .page-template-custom-home-page .logo-bg, .home-page-header, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, .more-btn a:hover, #slider .more-btn a:hover, .box-content:hover, #footer .tagcloud a:hover, #footer h3:after, #footer-2, #comments input[type="submit"], #sidebar .custom-social-icons i:hover, #footer .custom-social-icons i:hover, #sidebar h3, #sidebar .tagcloud a:hover, .pagination a:hover, .pagination .current, .widget_product_search button, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, nav.woocommerce-MyAccount-navigation ul li, #header .nav ul.sub-menu li a:hover, #header .nav ul.children li a:hover{
		background-image: linear-gradient(to right, '.esc_html($vw_consulting_first_color).', '.esc_html($vw_consulting_second_color).');
		}';
	}
	if($vw_consulting_first_color != false || $vw_consulting_second_color != false){
		$custom_css .='.heading{
		border-image: linear-gradient(to right, '.esc_html($vw_consulting_first_color).', '.esc_html($vw_consulting_second_color).') 1 100%;
		}';
	}