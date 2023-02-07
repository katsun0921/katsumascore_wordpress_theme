<?php

/**
 * @package pro
 */
?>
<li class="noselect">
	<div class="progression-ratency-slider-thumb-container">

		<?php if ($settings['progression_elements_thumbs_image'] == 'yes') : ?>
			<div class="progression-ratency-slider-thumb-image">
				<?php if (has_post_thumbnail()) : ?><?php the_post_thumbnail('progression-studios-slider-thumb'); ?><?php endif; ?>
				<div class="progression-ratency-slider-thumb-review">

					<?php if ($settings['progression_elements_thumbs_review'] == 'yes') : ?>
						<?php if (get_post_meta($post->ID, 'review_score', true)) : ?>
							<div class="progression-ratency-slider-thumb-hexagon-border">
								<div class="progression-ratency-slider-thumb-review-total"><?php echo esc_attr(get_post_meta($post->ID, 'review_score', true)); ?></div>
							</div>
						<?php endif; ?>
					<?php endif; ?>

				</div>
			</div>
		<?php endif; ?>

		<div class="progression-ratency-slider-thumb-caption">

			<h2><?php echo the_title(); ?></h2>

			<ul class="progression-ratency-slider-thumb-meta">
				<?php if ($settings['progression_elements_thumbs_author'] == 'yes') : ?><li class="blog-meta-author-display"><?php esc_html_e('By', 'ratency-progression'); ?> <?php the_author(); ?></li><?php endif; ?>

				<?php if ($settings['progression_elements_thumbs_date'] == 'yes') : ?>
					<?php if (get_theme_mod('progression_studios_blog_date_ago', 'true') == 'true') : ?>
						<li class="blog-meta-date-list"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')); ?> <?php esc_html_e('ago', 'ratency-progression'); ?></li>
					<?php else : ?>
						<li class="blog-meta-date-list"><?php the_time(get_option('date_format')); ?></li>
					<?php endif; ?>
				<?php endif; ?>

				<?php if ($settings['progression_elements_thumbs_comments'] == 'yes') : ?>
					<li class="blog-meta-comments">
						<?php comments_number(esc_html__('0 comments', 'ratency-progression'), '1 ' . esc_html__('comment', 'ratency-progression'),   '% ' . esc_html__('comments', 'ratency-progression')); ?></li>
				<?php endif; ?>

			</ul><!-- close .overlay-progression-blog-title -->
			<div class="clearfix-pro"></div>

		</div>

		<div class="progression-ratency-slider-thumb-gradient"></div>

		<div class="clearfix-pro"></div>
	</div>
</li>
