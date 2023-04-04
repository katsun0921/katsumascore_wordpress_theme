<?php
$imageThumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'progression-studios-blog-background');
$image = $imageThumbnail[0];
?>

<a id="post-related-<?php the_ID(); ?>" href="<?php the_permalink(); ?>" class="l-postImageOverlay"
  style="<?php echo 'background-image: url(' . esc_url($image) . ')'; ?>">
  <?php if (get_post_meta($post->ID, 'review_score', true)) : ?> <div class="u-absolute u-right-1-5 u-top-1-5 u-z-20">
    <span class="c-score">
      <span class="c-score__count">
        <?php echo esc_attr(get_post_meta($post->ID, 'review_score', true)); ?>
      </span>
    </span>
  </div>
  <?php endif; ?>
  <div class="c-category">
    <?php foreach ((get_the_category()) as $category) {
          echo '<span>' . $category->cat_name . '</span>';
        } ?>
  </div>
  <div class="l-postImageOverlay__content">
    <h3 class="c-heading__post"><?php the_title(); ?></h3>
  </div>
</a>