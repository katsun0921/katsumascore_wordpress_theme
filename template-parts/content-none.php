<?php
/**
 * @package pro
 */
?>
<section class="no-results-pro not-found-pro">
	
	<h2 class="page-title-pro"><?php esc_html_e( 'Nothing Found', 'ratency-progression' ); ?></h2>

	<div class="page-content-pro">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'ratency-progression' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ratency-progression' ); ?></p>
			<div id="no-results-pro"><?php get_search_form(); ?></div>

		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ratency-progression' ); ?></p>
			<div id="no-results-pro"><?php get_search_form(); ?></div>
			
		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->