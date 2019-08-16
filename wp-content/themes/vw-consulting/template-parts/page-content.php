<?php
/**
 * The template part for displaying page content
 *
 * @package VW Consulting
 * @subpackage vw-consulting
 * @since vw-consulting 1.0
 */
?>

<div id="content-vw">
  <?php the_post_thumbnail(); ?>
  <h1><?php the_title();?></h1>
  <?php the_content();?>
  <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
       comments_template();
    endif;
  ?>
  <div class="clearfix"></div>
</div>