<?php

/**
 * @package pro
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div
    class="progression-studios-default-blog-index <?php echo esc_attr(get_theme_mod('progression_studios_blog_transition')); ?>">
    <div class="progression-blog-content">
      <?php if (has_post_thumbnail()) : ?>
      <div class="content">
        <a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail('progression-studios-blog-left-align'); ?>
          <?php if (get_post_meta($post->ID, 'review_score', true)) : ?>
          <span class="c-score">
            <span class="c-score__count">
              <?php echo esc_attr(get_post_meta($post->ID, 'review_score', true)); ?>
            </span>
          </span>
          <?php endif; ?>
        </a>
      </div>
      <?php else : ?>

      <?php if (has_post_format('video') && get_post_meta($post->ID, 'video_code', true) || has_post_format('audio') && get_post_meta($post->ID, 'video_code', true)) : ?>

      <div class="video-progression-studios-format">
        <?php echo apply_filters('the_content', get_post_meta($post->ID, 'video_code', true)); ?>
      </div>

      <?php endif; ?>
      <!-- close gallery -->

      <?php endif; ?>
      <!-- close video -->

      <?php if ('post' == get_post_type() && get_theme_mod('progression_studios_blog_index_meta_category_display', 'true') == 'true') : ?>
      <div class="blog-meta-category-list"><?php the_category(' '); ?></div>
      <?php endif; ?>
      <h3 class="c-heading__post"><a href="<? the_permalink() ?>"><?php the_title(); ?></a></h3>
      <?php if (has_excerpt()) : ?>
      <div class="c-excerpt">
        <?php the_excerpt(); ?>
      </div>
      <?php endif; ?>


    </div><!-- close .progression-studios-content-float-right -->
  </div>

</div>

<!-- #post-## -
->