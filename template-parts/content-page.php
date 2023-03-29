<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package pro
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php the_content(); ?>
  <?php wp_link_pages( array(
					'before' => '<div class="progression-page-nav">' . esc_html__( 'Pages:', 'ratency-progression' ),
					'after'  => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			?>
</div>