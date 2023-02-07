		<?php if ( 'post' == get_post_type() ) : ?>
		<?php // You might need to use wp_reset_postdata(); 
		global $post;
		$categories = get_the_category($post->ID);
		$category_ids = array();
		foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
		$args=array(
		'category__in' => $category_ids,
		'post__not_in' => array($post->ID),
		'posts_per_page'=> 3, // Number of related posts that will be displayed.
		'orderby'=>'rand' // Randomize the posts
		);
		$rel_query = new WP_Query( $args ); if( $rel_query->have_posts() ) : 
		?>
		<div id="progression-studios-related-posts">
				<h4 class="progression-studios-related-heading"><?php esc_html_e( 'You Might also like', 'ratency-progression' ); ?></h4>
				<ul class="progression-studios-related-list">
				<?php  while ( $rel_query->have_posts() ) : $rel_query->the_post(); ?>
				<li class="progression-studios-related-list-item">
					
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php get_template_part( 'template-parts/content', 'related' ); ?>
					</div><!-- #post-## -->
					
				</li>
				<?php endwhile; ?>
			</ul>
		  <div class="clearfix-pro"></div>
		</div><!-- #progression-related-posts -->
		<?php endif;			wp_reset_postdata();  ?>
		<?php endif; ?>