<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package pro
 * @since pro 1.0
 */
?>
	
	<?php if (get_theme_mod( 'progression_studios_footer_elementor_library') && !is_singular( 'elementor_library') ) : ?>
		<div id="progression-studios-footer-page-builder">
			<?php if(is_page() && get_post_meta($post->ID, 'progression_studios_disable_footer_per_page', true)): ?><?php else: ?>
			<?php
			if( function_exists( 'elementor_load_plugin_textdomain' ) ) {
			$progression_studios_elementor_footer_instance = Elementor\Plugin::instance();
			echo  $progression_studios_elementor_footer_instance->frontend->get_builder_content_for_display( get_theme_mod( 'progression_studios_footer_elementor_library') );
			}
			?><?php endif; ?>
		</div>
	<?php else: ?>
		<footer id="site-footer" class="progression-studios-footer-normal-width <?php echo esc_attr( get_theme_mod('progression_studios_footer_copyright_location', 'footer-copyright-align-left') ); ?>">
			<div id="progression-studios-copyright">
				<div id="copyright-divider-top"></div>				
					<div class="width-container-pro">
						<div id="copyright-text">
								<?php echo wp_kses(get_theme_mod( 'progression_studios_footer_copyright', 'All Rights Reserved. Developed by Progression Studios' ), true); ?>
						</div>
					</div> <!-- close .width-container-pro -->			
				<div class="clearfix-pro"></div>
			</div><!-- close #progression-studios-copyright -->
		</footer>
	<?php endif; ?>

	</div><!-- close #boxed-layout-pro -->
	<a href="#0" id="pro-scroll-top"><?php esc_html_e( 'Scroll to top', 'ratency-progression' ); ?></a>
	
<?php wp_footer(); ?>
</body>
</html>