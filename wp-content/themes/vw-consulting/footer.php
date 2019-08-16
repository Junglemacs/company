<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package VW Consulting
 */
?>
    <footer>

        <aside id="footer" class="copyright-wrapper" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'vw-consulting' ); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <?php dynamic_sidebar('footer-1');?>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <?php dynamic_sidebar('footer-2');?>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <?php dynamic_sidebar('footer-3');?>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <?php dynamic_sidebar('footer-4');?>
                    </div>
                </div>
            </div>
        </aside>

        <div id="footer-2">
          	<div class="copyright container">
                <p><?php echo esc_html(get_theme_mod('vw_consulting_footer_text',__('&copy; Copyright 2019 -','vw-consulting'))); ?> <?php vw_consulting_credit(); ?></p>
                <?php if( get_theme_mod( 'vw_consulting_scroll_enable') != '' ) { ?>
                    <a href="#" class="scrollup"><i class="fas fa-long-arrow-alt-up"></i><span class="screen-reader-text"><?php esc_html_e( 'Scroll Up', 'vw-consulting' ); ?></span></a>
                <?php }?>
          	</div>
          	<div class="clear"></div>
        </div>

    </footer>

        <?php wp_footer(); ?>

    </body>
</html>