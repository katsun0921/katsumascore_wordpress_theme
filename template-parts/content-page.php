<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package pro
 */
?>
<?php if(get_post_meta($post->ID, 'progression_studios_page_sidebar', true) == 'right-sidebar' || get_post_meta($post->ID, 'progression_studios_page_sidebar', true) ==  'left-sidebar' ) : ?><div id="main-container-pro" class="l-content"><?php endif; ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="page-content-pro">

			<?php the_content(); ?>

			<div class="clearfix-pro"></div>
			<?php wp_link_pages( array(
					'before' => '<div class="progression-page-nav">' . esc_html__( 'Pages:', 'ratency-progression' ),
					'after'  => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			?>
		</div><!-- .entry-content -->

	</div><!-- #post-## -->

	<?php if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>

<?php if(get_post_meta($post->ID, 'progression_studios_page_sidebar', true) == 'right-sidebar' || get_post_meta($post->ID, 'progression_studios_page_sidebar', true) ==  'left-sidebar' ) : ?></div><!-- close #main-container-pro --><?php get_sidebar(); ?><div class="clearfix-pro"></div><?php endif; ?>
