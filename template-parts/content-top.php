<?php

/**
 * @description
 */
$post_id = $post->ID;
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if (has_post_thumbnail()) : ?>
  <a href="<?php the_permalink(); ?>">
    <?php the_post_thumbnail('index'); ?>
    <?php if (get_post_meta($post_id, 'review_score', true)) : ?>
    <?php get_template_part('template-parts/components/Score', null, array('post_id' => $post_id)); ?>
    <?php endif; ?>
  </a>
  <?php else : ?>

  <?php if (has_post_format('video') && get_post_meta($post_id, 'video_code', true) || has_post_format('audio') && get_post_meta($post->ID, 'video_code', true)) : ?>

  <div class="video-progression-studios-format">
    <?php echo apply_filters('the_content', get_post_meta($post_id, 'video_code', true)); ?>
  </div>


  <?php endif; ?>
  <!-- close gallery -->

  <?php endif; ?>
  <!-- close video -->

  <div class="l-post__vertical">
    <?php if ('post' == get_post_type() && get_theme_mod('progression_studios_blog_index_meta_category_display', 'true') == 'true') : ?>
    <div class="u-mb-6 c-category c-category__small"><?php the_category(' '); ?></div>
    <?php endif; ?>
    <h3 class="c-heading__post"><a href="<? the_permalink() ?>"><?php the_title(); ?></a></h3>
    <?php if (has_excerpt()) : ?>
    <div class="c-excerpt">
      <?php the_excerpt(); ?>
    </div>
    <?php endif; ?>
  </div>
</div>