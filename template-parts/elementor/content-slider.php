<?php
/**
 * @description メインカルーセルのヒーロー画像
 */

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
                    <?php if ($settings['progression_elements_post_review'] == 'yes' && get_post_meta($post->ID, 'review_score', true)) : ?>
                    <span class="c-score">
                      <span class="c-score__count">
                        <?php echo esc_attr(get_post_meta($post->ID, 'review_score', true)); ?></span>
                    </span>
                    <?php endif; ?>
                    <?php if ($settings['progression_elements_post_category'] == 'yes') : ?>
                    <div><?php the_category(' '); ?></div>
                    <?php endif; ?>
                    <a href="<?php echo get_permalink() ?>">
                      <h2 class="progression-ratency-progression-slider-title"><?php echo the_title(); ?></h2>
                      <?php if ($settings['progression_elements_post_excerpt'] == 'yes') : ?>
                      <div class="progression-ratency-slider-excerpt">
                        <?php if (has_excerpt()) : ?>
                        <div class="c-excerpt">
                          <?php the_excerpt(); ?>
                        </div>
                        <?php endif; ?>
                      </div>
                      <?php endif; ?>
                    </a>
                  </div><!-- close .progression-ratency-slider-progression-crowd-index-content -->
                </div><!-- close .progression-ratency-slider-content-alignment -->
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
