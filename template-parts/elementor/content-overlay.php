<?php
$imageThumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'progression-studios-blog-background');
$image = $imageThumbnail[0];
$cats = get_the_category();
$cat = $cats[0];
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <a href="<?php the_permalink(); ?>" class="l-postImageOverlay">
    <?php if ('post' == get_post_type() && $settings['progression_elements_post_display_category'] == 'yes') : ?>
      <div class="u-relative u-z-20">
      <div class="c-category c-category__small"><?php echo $cat->cat_name; ?></div>
      </div>
    <?php endif; ?>
    <?php if (has_post_thumbnail()) : ?>
      <div class="l-postImageOverlay__image" style="background-image:url('<?php echo esc_attr($image); ?>')"></div>
    <?php endif; ?>

    <?php if ($settings['progression_elements_post_show_review'] == 'yes' && get_post_meta($post->ID, 'review_score', true)) : ?>
      <div class="u-z-20 u-absolute u-right-1-5 u-top-1-5">
      <span class="c-score">
          <span class="c-score__count">
            <?php echo esc_attr(get_post_meta($post->ID, 'review_score', true)); ?>
          </span>
        </span>
      </div>
    <?php endif; ?>
    <div class="l-postImageOverlay__content">
      <h3 class="c-heading__post"><?php the_title(); ?></h3>
    </div>
  </a>
</div><!-- #post-## -->
