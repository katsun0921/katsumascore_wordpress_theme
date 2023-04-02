<?php
$imageThumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'progression-studios-blog-background');
$image = $imageThumbnail[0];
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="l-postOverlay">
    <a href="<?php the_permalink(); ?>" class="u-relative">
      <?php if ('post' == get_post_type()) : ?>
        <div class="c-category c-category__small u-z-20"><?php the_category(' '); ?></div>
      <?php endif; ?>
      <?php if (has_post_thumbnail()) : ?>
        <div class="l-postOverlay__image" style="background-image:url('<?php echo esc_attr($image); ?>')"></div>
      <?php endif; ?>

      <?php if (get_post_meta($post->ID, 'review_score', true)) : ?>
        <span class="c-score u-z-20 u-absolute u-right-1-5 u-top-1-5">
          <span class="c-score__count">
            <?php echo esc_attr(get_post_meta($post->ID, 'review_score', true)); ?>
          </span>
        </span>
      <?php endif; ?>
      <h3 class="c-heading__post"><?php the_title(); ?></h3>
    </a>
  </div>
</div><!-- #post-## -->