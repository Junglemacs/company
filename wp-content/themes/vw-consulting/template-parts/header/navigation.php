<?php
/**
 * The template part for header
 *
 * @package VW Consulting 
 * @subpackage vw-consulting
 * @since vw-consulting 1.0
 */
?>

<button class="toggleMenu toggle"><?php esc_html_e('Menu','vw-consulting'); ?></button>
<div class="container">
	<div id="header" class="menubar">
		<nav class="nav">
			<?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
		</nav>
	</div>
</div>