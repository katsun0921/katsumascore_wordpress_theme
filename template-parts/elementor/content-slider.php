<?php

/**
 * @description メインカルーセルのヒーロー画像
 */

$imageThumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'background');
$image = $imageThumbnail[0];
$cats = get_the_category();
$cat = $cats[0];
$post_id = $post->ID;
?>
<li class="<?php echo esc_attr($settings['progression_elements_slider_css3_animation']); ?>">
  <div class="progression-elements-slider-background" <?php if (has_post_thumbnail()) : ?> style="background-image:url('<?php echo esc_attr($image); ?>')" <?php endif; ?>>
    <div class="progression-ratency-slider-elements-display-table">
      <div class="progression-ratency-slider-text-floating-container">
        <div class="progression-ratency-slider-container-max-width">
          <div class="progression-ratency-slider-content-max-width">
            <div class="progression-ratency-slider-content-margins">
              <div class="progression-ratency-slider-content-alignment">
                <div class="progression-ratency-slider-container">
                  <?php if ($settings['progression_elements_post_review'] == 'yes' && get_post_meta($post_id, 'review_score', true)) : ?>
                    <div class="u-absolute u-top-1-5 u-right-1-5">
                      <?php get_template_part('template-parts/components/Score', null, array('post_id' => $post_id)); ?>
                    </div>
                  <?php endif; ?>
                  <?php if ($settings['progression_elements_post_category'] == 'yes') : ?>
                    <div class="c-category c-category__small"><?php echo $cat->name; ?></div>
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
                </div>
              </div><!-- close .progression-ratency-slider-content-alignment -->
            </div>
          </div><!-- close .progression-ratency-slider-content-max-width -->
        </div><!-- close .progression-ratency-slider-container-max-width -->
      </div><!-- close .progression-ratency-slider-text-floating-container -->
    </div><!-- close .progression-ratency-slider-elements-display-table -->
  </div>
</li>