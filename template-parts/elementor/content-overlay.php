<?php

/**
 * @package pro
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="progression-studios-default-blog-overlay <?php if (has_post_thumbnail()) : ?><?php else : ?><?php if (has_post_format('video') && get_post_meta($post->ID, 'video_code', true) || has_post_format('audio') && get_post_meta($post->ID, 'video_code', true)) : ?> progression-studios-overlay-video-index<?php endif; ?><?php endif; ?> <?php echo esc_attr(get_theme_mod('progression_studios_blog_transition')); ?>">

    <?php if ('post' == get_post_type()) : ?>
      <?php if ($settings['progression_elements_post_display_category'] == 'yes') : ?><div class="overlay-blog-meta-category-list"><?php the_category(' '); ?></div><?php endif; ?>
    <?php endif; ?>

    <?php if (has_post_thumbnail()) : ?>
    <?php else : ?>
      <?php if (has_post_format('video') && get_post_meta($post->ID, 'video_code', true) || has_post_format('audio') && get_post_meta($post->ID, 'video_code', true)) : ?>

        <div class="progression-studios-feaured-video-overlay">
          <?php echo apply_filters('the_content', get_post_meta($post->ID, 'video_code', true)); ?>
        </div>
      <?php endif; ?>
    <?php endif; ?>

    <?php progression_studios_blog_link(); ?>

    <?php if (has_post_thumbnail() || get_post_meta($post->ID, 'progression_studios_gallery-image-url', true)) : ?>
      <div class="overlay-progression-studios-blog-image" <?php
                                                          $imageThumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'progression-studios-blog-background');
                                                          $imageUrl = get_post_meta($post->ID, 'progression_studios_gallery-image-url', true);
                                                          $image = $imageUrl ? $imageUrl : $imageThumbnail[0];
                                                          ?> style="background-image:url('<?php echo esc_attr($image); ?>')">
      </div>
    <?php endif; ?>

    <div class="overlay-progression-blog-content">
      <div class="overlay-progression-blog-content-table-cell">
        <div class="overlay-progression-blog-content-padding">


          <?php if ($settings['progression_elements_post_show_review'] == 'yes') : ?>
            <?php if (get_post_meta($post->ID, 'review_score', true)) : ?>
              <div class="progression-studios-hexagon-index-container">
                <div class="progression-studios-index-hexagon-border">
                  <div class="progression-ratency-slider-review-total"><?php echo esc_attr(get_post_meta($post->ID, 'review_score', true)); ?></div>
                </div>
              </div>
            <?php endif; ?>
          <?php endif; ?>

          <h2 class="overlay-progression-blog-title"><?php the_title(); ?></h2>

          <?php if ('post' == get_post_type()) : ?>
            <ul class="progression-studio-overlay-post-meta">
              <?php if ($settings['progression_elements_post_display_author'] == 'yes') : ?><li class="blog-meta-author-display"><?php esc_html_e('By', 'ratency-progression'); ?> <?php the_author(); ?></li><?php endif; ?>

              <?php if ($settings['progression_elements_post_display_date'] == 'yes') : ?>
                <?php if (get_theme_mod('progression_studios_blog_date_ago', 'true') == 'true') : ?>
                  <li class="blog-meta-date-list"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')); ?> <?php esc_html_e('ago', 'ratency-progression'); ?></li>
                <?php else : ?>
                  <li class="blog-meta-date-list"><?php the_time(get_option('date_format')); ?></li>
                <?php endif; ?>
              <?php endif; ?>

              <?php if ($settings['progression_elements_post_display_comments'] == 'yes') : ?><li class="blog-meta-comments">
                  <?php comments_number(esc_html__('0 comments', 'ratency-progression'), '1 ' . esc_html__('comment', 'ratency-progression'),   '% ' . esc_html__('comments', 'ratency-progression')); ?></li><?php endif; ?>

            </ul><!-- close .overlay-progression-blog-title -->
            <div class="clearfix-pro"></div>
          <?php endif; ?>

          <?php if ($settings['progression_elements_post_display_excerpt'] == 'yes') : ?>
            <div class="overlay-progression-studios-excerpt">
              <?php if (has_excerpt()) : ?><?php the_excerpt(); ?><?php else : ?>
              <?php if ('post' == get_post_type()) : ?><?php the_content(sprintf(wp_kses(__('Continue Reading <i class="fa fa-chevron-right" aria-hidden="true"></i>', 'ratency-progression'), array('i' => array('id' => array(),  'class' => array(),  'style' => array(),), 'span' => array('class' => array()))), the_title('<span class="screen-reader-text">"', '"</span>', false))); ?><?php endif; ?>
            <?php endif; ?>
            </div><!-- close .overlay-progression-studios-excerpt -->
          <?php endif; ?>

        </div><!-- close .overlay-progression-blog-content-padding -->

      </div><!-- close .overlay-progression-blog-content-table-cell -->
    </div><!-- close .overlay-progression-blog-content -->

    <div class="overlay-blog-gradient"></div>
    </a>

    <div class="clearfix-pro"></div>
  </div><!-- close .progression-studios-default-blog-overlay -->
</div><!-- #post-## -->
