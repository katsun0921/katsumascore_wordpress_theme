<?php

/**
 * @description Elementor 使用時のTOPページ
 */
$post_id = $post->ID;
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if ($settings['progression_elements_post_show_image'] == 'yes') : ?>

  <?php if (has_post_thumbnail()) : ?>
  <a href="<?php the_permalink(); ?>" class="u-block u-relative">
    <div class="u-absolute u-top-1-5 u-right-1-5">
      <?php get_template_part('template-parts/components/Score', null, array('post_id' => $post_id)); ?>
    </div>
    <?php the_post_thumbnail('index'); ?>
  </a>
  <?php else : ?>

  <?php if (has_post_format('video') && get_post_meta($post_id, 'video_code', true) || has_post_format('audio') && get_post_meta($post_id, 'video_code', true)) : ?>

  <div class="video-progression-studios-format">
    <?php echo apply_filters('the_content', get_post_meta($post_id, 'video_code', true)); ?>
  </div>

  <?php endif; ?>
  <!-- close gallery -->

  <?php endif; ?>
  <!-- close video -->

  <?php endif; ?>

  <div class="l-post__vertical">
    <?php if ('post' == get_post_type()) : ?>
    <?php if ($settings['progression_elements_post_display_category'] == 'yes') : ?>
    <div class="u-mb-6 c-category c-category__small"><?php the_category(' '); ?></div>
    <?php endif; ?>
    <?php endif; ?>
    <h2 class="c-heading__post"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
    <?php if ($settings['progression_elements_post_display_excerpt'] == 'yes' && has_excerpt()) : ?>
    <div class="c-excerpt">
      <?php the_excerpt(); ?>
    </div>
    <?php endif; ?>
  </div>
</div>