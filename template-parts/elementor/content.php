<?php

/**
 * @package pro
 */
?>

<div <?php post_class(); ?>>
  <div
    class="progression-studios-default-blog-index progression-studios-default-blog-left <?php echo esc_attr(get_theme_mod('progression_studios_blog_transition')); ?>">
    <div class="progression-blog-content">


      <?php if (has_post_thumbnail()  || $settings['progression_elements_post_show_image'] == 'yes' || has_post_format('video') && get_post_meta($post->ID, 'video_code', true) || has_post_format('audio') && get_post_meta($post->ID, 'video_code', true) || has_post_format('gallery') && get_post_meta($post->ID, 'progression_studios_gallery', true)) : ?>
      <div class="progression-studios-image-float-left">
        <?php endif; ?>

        <?php if (has_post_thumbnail()) : ?>
        <div class="progression-studios-feaured-image">
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('progression-studios-blog-left-align'); ?>
            <?php if ($settings['progression_elements_post_show_review'] == 'yes') : ?>
            <?php if (get_post_meta($post->ID, 'review_score', true)) : ?>
            <div class="progression-studios-hexagon-index-container">
              <div class="progression-studios-index-hexagon-border">
                <div class="progression-ratency-slider-review-total">
                  <?php echo esc_attr(get_post_meta($post->ID, 'review_score', true)); ?></div>
              </div>
            </div>
            <?php endif; ?>
            <?php endif; ?>

          </a>
        </div><!-- close .progression-studios-feaured-image -->
        <?php else : ?>

        <?php if (has_post_format('video') && get_post_meta($post->ID, 'video_code', true) || has_post_format('audio') && get_post_meta($post->ID, 'video_code', true)) : ?>

        <div class="progression-studios-feaured-image video-progression-studios-format">
          <?php echo apply_filters('the_content', get_post_meta($post->ID, 'video_code', true)); ?>
        </div>
        <?php endif; ?>
        <!-- close gallery -->

        <?php endif; ?>
        <!-- close video -->

        <?php if (has_post_thumbnail() || $settings['progression_elements_post_show_image'] == 'yes' || has_post_format('video') && get_post_meta($post->ID, 'video_code', true) || has_post_format('audio') && get_post_meta($post->ID, 'video_code', true) || has_post_format('gallery') && get_post_meta($post->ID, 'progression_studios_gallery', true)) : ?>
      </div><!-- close .progression-studios-image-float-left -->
      <?php endif; ?>



      <?php if (has_post_thumbnail() || $settings['progression_elements_post_show_image'] == 'yes' || has_post_format('video') && get_post_meta($post->ID, 'video_code', true) || has_post_format('audio') && get_post_meta($post->ID, 'video_code', true) || has_post_format('gallery') && get_post_meta($post->ID, 'progression_studios_gallery', true)) : ?>
      <div class="progression-studios-content-float-right">
        <?php endif; ?>

        <div class="progression-studios-float-blog-content-padding">
          <?php if ('post' == get_post_type()) : ?>
          <?php if ($settings['progression_elements_post_display_category'] == 'yes') : ?>
          <div class="blog-meta-category-list"><?php the_category(' '); ?></div>
          <?php endif; ?>
          <?php endif; ?>

          <h2 class="progression-blog-title"><?php the_title(); ?></a>
          </h2>

          <?php if ('post' == get_post_type()) : ?>
          <ul class="progression-post-meta">

            <?php if ($settings['progression_elements_post_display_author'] == 'yes') : ?><li
              class="blog-meta-author-display"><?php esc_html_e('By', 'ratency-progression'); ?> <a
                href="<?php echo get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')); ?>"><?php the_author(); ?></a>
            </li><?php endif; ?>


            <?php if ($settings['progression_elements_post_display_date'] == 'yes') : ?>
            <?php if (get_theme_mod('progression_studios_blog_date_ago', 'true') == 'true') : ?>
            <li class="blog-meta-date-list"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')); ?>
              <?php esc_html_e('ago', 'ratency-progression'); ?></li>
            <?php else : ?>
            <li class="blog-meta-date-list"><?php the_time(get_option('date_format')); ?></li>
            <?php endif; ?>
            <?php endif; ?>



            <?php if ($settings['progression_elements_post_display_comments'] == 'yes') : ?><li
              class="blog-meta-comments">
              <?php comments_popup_link(esc_html__('0 comments', 'ratency-progression'), '1 ' . esc_html__('comment', 'ratency-progression'),   '% ' . esc_html__('comments', 'ratency-progression')); ?>
            </li><?php endif; ?>
          </ul>
          <div class="clearfix-pro"></div>
          <?php endif; ?>

          <?php if ($settings['progression_elements_post_display_excerpt'] == 'yes') : ?>
          <div class="progression-studios-blog-excerpt">
            <?php if (has_excerpt()) : ?><?php the_excerpt(); ?><?php else : ?>
            <?php if ('post' == get_post_type()) : ?><?php the_content(sprintf(wp_kses(__('Continue Reading <i class="fa fa-chevron-right" aria-hidden="true"></i>', 'ratency-progression'), array('i' => array('id' => array(),  'class' => array(),  'style' => array(),), 'span' => array('class' => array()))), the_title('<span class="screen-reader-text">"', '"</span>', false))); ?><?php endif; ?>
            <?php endif; ?>

            <?php if (!get_the_title()) : ?>
            <p><a href="<?php the_permalink(); ?>"
                class="more-link"><?php echo wp_kses(__('Continue Reading <i class="fa fa-chevron-right" aria-hidden="true"></i>', 'ratency-progression'), true) ?></a>
            </p>
            <?php endif; ?>
            <div class="clearfix-pro"></div>
            <?php wp_link_pages(array(
							'before' => '<div class="progression-page-nav">' . esc_html__('Pages:', 'ratency-progression'),
							'after'  => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
						));
						?>

            <div class="clearfix-pro"></div>

          </div>
          <?php endif; ?>

        </div>



        <?php if (has_post_thumbnail() || $settings['progression_elements_post_show_image'] == 'yes' || has_post_format('video') && get_post_meta($post->ID, 'video_code', true) || has_post_format('audio') && get_post_meta($post->ID, 'video_code', true) || has_post_format('gallery') && get_post_meta($post->ID, 'progression_studios_gallery', true)) : ?>
      </div><!-- close .progression-studios-content-float-right -->
      <?php endif; ?>

      <?php if (is_sticky() && is_home() && !is_paged()) {
				printf('<div class="progression-studios-sticky-post">%s</div>', esc_html__('FEATURED', 'ratency-progression'));
			} ?>
      <div class="clearfix-pro"></div>

    </div><!-- close .progression-blog-content -->





    <div class="clearfix-pro"></div>
  </div><!-- close .progression-studios-default-blog-index -->
</div><!-- #post-## -->