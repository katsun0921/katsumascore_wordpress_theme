<?php

/**
 * @package pro
 */
?>

<div <?php post_class(); ?>>
  <div
    class="progression-studios-default-blog-index progression-studios-default-blog-left <?php echo esc_attr(get_theme_mod('progression_studios_blog_transition')); ?>">
    <div class="progression-blog-content">
      <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('progression-studios-blog-left-align'); ?>
        <?php if ($settings['progression_elements_post_show_review'] == 'yes' && get_post_meta($post->ID, 'review_score', true)) : ?>
        <span class="c-score">
          <span class="c-score__count">
            <?php echo esc_attr(get_post_meta($post->ID, 'review_score', true)); ?>
          </span>
        </span>
        <?php endif; ?>
      </a>

      <?php if (has_post_format('video') && get_post_meta($post->ID, 'video_code', true) || has_post_format('audio') && get_post_meta($post->ID, 'video_code', true)) : ?>

      <div class="video-progression-studios-format">
        <?php echo apply_filters('the_content', get_post_meta($post->ID, 'video_code', true)); ?>
      </div>
      <?php endif; ?>



      <div class="progression-studios-float-blog-content-padding">
        <?php if ('post' == get_post_type()) : ?>
        <?php if ($settings['progression_elements_post_display_category'] == 'yes') : ?>
        <div class="blog-meta-category-list"><?php the_category(' '); ?></div>
        <?php endif; ?>
        <?php endif; ?>

        <h3 class="c-heading__post"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>

        <?php if ($settings['progression_elements_post_display_excerpt'] == 'yes' && has_excerpt()) : ?>
        <div class="c-excerpt">
          <?php the_excerpt(); ?>
        </div>
        <?php endif; ?>
      </div>
    </div><!-- close .progression-blog-content -->
  </div><!-- close .progression-studios-default-blog-index -->
</div><!-- #post-## -->