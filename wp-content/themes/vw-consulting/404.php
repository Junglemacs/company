<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package VW Consulting
 */

get_header(); ?>

<div class="container">
	<main id="maincontent">
    	<h1><?php printf( '<strong>%s</strong> %s', esc_html__( '404','vw-consulting' ), esc_html__( 'Not Found', 'vw-consulting' ) ) ?></h1>
		<p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn&hellip', 'vw-consulting' ); ?></p>
		<p class="text-404"><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'vw-consulting' ); ?></p>
		<div class="more-btn">
			<a href="<?php echo esc_url(home_url() ); ?>"><?php esc_html_e( 'Go Back', 'vw-consulting' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Go Back', 'vw-consulting' ); ?></span></a>
		</div>
		<div class="clearfix"></div>
	</main>
</div>

<?php get_footer(); ?>