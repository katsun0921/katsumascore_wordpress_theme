<?php
$imageThumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'progression-studios-blog-background');
$image = $imageThumbnail[0];
?>
<li class="<?php echo esc_attr($settings['progression_elements_slider_css3_animation']); ?>">
  <div class="progression-elements-slider-background" <?php if (has_post_thumbnail()) : ?>
    style="background-image:url('<?php echo esc_attr($image); ?>')" <?php endif; ?>>
    <div class="progression-ratency-slider-elements-display-table">
      <div class="progression-ratency-slider-text-floating-container">
        <div class="progression-ratency-slider-container-max-width">
          <div class="progression-ratency-slider-content-floating-container">
            <div class="progression-ratency-slider-content-max-width">
              <div class="progression-ratency-slider-content-margins">
                <div class="progression-ratency-slider-content-alignment">
                  <div class="progression-ratency-slider-progression-crowd-index-content">
                    <?php if ($settings['progression_elements_post_review'] == 'yes') : ?>
                    <?php if (get_post_meta($post->ID, 'review_score', true)) : ?>
                    <div class="progression-ratency-slider-hexagon-container">
                      <div class="progression-ratency-slider-hexagon-border">
                        <div class="progression-ratency-slider-review-total">
                          <?php echo esc_attr(get_post_meta($post->ID, 'review_score', true)); ?></div>
                      </div>
                    </div>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php if ($settings['progression_elements_post_category'] == 'yes') : ?><div
                      class="progression-ratency-slider-categories"><?php the_category(' '); ?></div><?php endif; ?>

                    <?php progression_studios_blog_post_title(); ?>
                    <h2 class="progression-ratency-progression-slider-title"><?php echo the_title(); ?></h2>


                    <?php if ($settings['progression_elements_post_author'] == 'yes' || $settings['progression_elements_post_date'] == 'yes' || $settings['progression_elements_post_comments'] == 'yes') : ?>
                    <ul class="progression-ratency-slider-meta">
                      <?php if ($settings['progression_elements_post_author'] == 'yes') : ?><li
                        class="blog-meta-author-display"><?php esc_html_e('By', 'ratency-progression'); ?>
                        <?php the_author(); ?></li><?php endif; ?>

                      <?php if ($settings['progression_elements_post_date'] == 'yes') : ?>
                      <?php if (get_theme_mod('progression_studios_blog_date_ago', 'true') == 'true') : ?>
                      <li class="blog-meta-date-list">
                        <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')); ?>
                        <?php esc_html_e('ago', 'ratency-progression'); ?></li>
                      <?php else : ?>
                      <li class="blog-meta-date-list"><?php the_time(get_option('date_format')); ?></li>
                      <?php endif; ?>
                      <?php endif; ?>

                      <?php if ($settings['progression_elements_post_comments'] == 'yes') : ?><li
                        class="blog-meta-comments">
                        <?php comments_number(esc_html__('0 comments', 'ratency-progression'), '1 ' . esc_html__('comment', 'ratency-progression'),   '% ' . esc_html__('comments', 'ratency-progression')); ?>
                      </li><?php endif; ?>

                    </ul><!-- close .overlay-progression-blog-title -->
                    <div class="clearfix-pro"></div>
                    <?php endif; ?>

                    <?php if ($settings['progression_elements_post_excerpt'] == 'yes') : ?>
                    <div class="progression-ratency-slider-excerpt">
                      <?php if (has_excerpt()) : ?><?php the_excerpt(); ?><?php else : ?>
                      <?php if ('post' == get_post_type()) : ?><?php the_content(sprintf(wp_kses(__('Continue Reading <i class="fa fa-chevron-right" aria-hidden="true"></i>', 'ratency-progression'), array('i' => array('id' => array(),  'class' => array(),  'style' => array(),), 'span' => array('class' => array()))), the_title('<span class="screen-reader-text">"', '"</span>', false))); ?><?php endif; ?>
                      <?php endif; ?>
                    </div><!-- close .overlay-progression-studios-excerpt -->
                    <?php endif; ?>
                    </a>
                    <div class="clearfix-pro"></div>
                  </div><!-- close .progression-ratency-slider-progression-crowd-index-content -->
                </div><!-- close .progression-ratency-slider-content-alignment -->
                <div class="clearfix-pro"></div>
              </div>
            </div><!-- close .progression-ratency-slider-content-max-width -->
          </div><!-- close .progression-ratency-slider-content-floating-container -->
        </div><!-- close .progression-ratency-slider-container-max-width -->
      </div><!-- close .progression-ratency-slider-text-floating-container -->
    </div><!-- close .progression-ratency-slider-elements-display-table -->
    <div class="slider-background-overlay-color"></div>
    <div class="clearfix-pro"></div>
  </div><!-- close .progression-elements-slider-background -->
</li>