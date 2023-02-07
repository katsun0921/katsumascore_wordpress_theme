<?php
/**
 * The template for displaying search results pages.
 *
 * @package pro
 */

get_header(); ?>
	
	
	<div id="page-title-pro">
		<div class="width-container-pro">
			<div id="progression-studios-page-title-container">
				<h1 class="page-title"><?php printf( esc_html__( 'Search for: %s', 'ratency-progression' ), '<span>' . get_search_query() . '</span>' ); ?>
				<?php if(function_exists('bcn_display')) { echo '<ul id="breadcrumbs-progression-studios"><li><a href="'; echo esc_url( home_url( '/' ) ); echo '"><i class="fa fa-home"></i> </a></li>'; bcn_display_list(); echo '</ul>'; }?>
			</div><!-- #progression-studios-page-title-container -->
			<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #page-title-pro -->
	

		<div id="content-pro" class="site-content">
			<div class="width-container-pro <?php if ( get_theme_mod( 'progression_studios_blog_cat_sidebar' ) == 'left-sidebar' ) : ?> left-sidebar-pro<?php endif; ?>">
				
					<?php if(get_theme_mod( 'progression_studios_blog_cat_sidebar' ) == 'left-sidebar' || get_theme_mod( 'progression_studios_blog_cat_sidebar', 'right-sidebar' ) == 'right-sidebar' ) : ?><div id="main-container-pro"><?php endif; ?>
				
				
					<?php if ( have_posts() ) : ?>
						<div class="progression-studios-blog-index">
					
						<div class="progression-masonry-margins" style="margin-top:-<?php echo esc_attr(get_theme_mod('progression_studios_blog_index_gap', '15')); ?>px; margin-left:-<?php echo esc_attr(get_theme_mod('progression_studios_blog_index_gap', '15')); ?>px; margin-right:-<?php echo esc_attr(get_theme_mod('progression_studios_blog_index_gap', '15')); ?>px;">
							<div class="progression-blog-index-masonry">
									<?php while ( have_posts() ) : the_post(); ?>
										<div class="progression-masonry-item progression-masonry-col-<?php echo esc_attr(get_theme_mod( 'progression_studios_blog_columns', '1')); ?>">
											<div class="progression-masonry-padding-blog" style="padding:<?php echo esc_attr(get_theme_mod('progression_studios_blog_index_gap', '15')); ?>px;">
												<div class="progression-studios-isotope-animation">
													<?php if (get_theme_mod( 'progression_studios_blog_index_layout') == 'default') : ?>
														<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
													<?php endif; ?>
													<?php if (get_theme_mod( 'progression_studios_blog_index_layout') == 'overlay') : ?>
														<?php get_template_part( 'template-parts/content', 'overlay' ); ?>
													<?php endif; ?>
													<?php if (get_theme_mod( 'progression_studios_blog_index_layout', 'top-image') == 'top-image') : ?>
														<?php get_template_part( 'template-parts/content', 'top' ); ?>
													<?php endif; ?>
												</div>
											</div>
										</div>
									<?php endwhile; ?>		
								</div><!-- close .progression-blog-index-masonry -->
							</div><!-- close .progression-masonry-margins -->
						</div><!-- close .progression-studios-blog-index -->
				
					<div class="clearfix-pro"></div>
				
						<?php if (get_theme_mod( 'progression_studios_blog_pagination', 'default' ) == 'default') : ?>
							<?php progression_studios_show_pagination_links_pro(); ?>
						<?php endif; ?>
				
						<?php if (get_theme_mod( 'progression_studios_blog_pagination') == 'load-more') : ?>
							<div id="progression-load-more-manual"><?php progression_studios_infinite_content_nav_pro( 'nav-below' ); ?></div>
						<?php endif; ?>
				
						<?php if (get_theme_mod( 'progression_studios_blog_pagination') == 'infinite-scroll') : ?>
							<?php progression_studios_infinite_content_nav_pro( 'nav-below' ); ?>
						<?php endif; ?>
				
						<div class="clearfix-pro"></div>
				
					<?php else : ?>
					
						<div class="progression-studios-blog-index">
							<?php get_template_part( 'template-parts/content', 'none' ); ?>
						</div><!-- close .progression-masonry-margins -->
					
					<?php endif; ?>
			
				
					<?php if(get_theme_mod( 'progression_studios_blog_cat_sidebar' ) == 'left-sidebar' || get_theme_mod( 'progression_studios_blog_cat_sidebar', 'right-sidebar' ) == 'right-sidebar' ) : ?></div><!-- close #main-container-pro --><?php get_sidebar(); ?><?php endif; ?>
				
			<div class="clearfix-pro"></div>
			</div><!-- close .width-container-pro -->
		</div><!-- #content-pro -->
<?php get_footer(); ?>