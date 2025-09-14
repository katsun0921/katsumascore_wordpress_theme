<?php

/**
 * The Component for Post Top Image
 */
$id = $args['id'] ?? get_the_ID();
$title = get_the_title($id);
$permalink = get_permalink($id);
$imageThumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'background');
$image = $imageThumbnail[0];
?>

<a id="post-<?php echo esc_attr($id); ?>" class="p-postImageOverlay" href="<?php echo esc_url($permalink); ?>"
  style='background-image: url("<?php echo esc_url($image); ?>");'>
  <div class="u-z-20 u-absolute u-right-1-5 u-top-1-5">
    <?php get_template_part('template-parts/components/score', null, array('post_id' => $id)); ?>
  </div>
  <div class="u-z-20 u-relative">
    <?php get_template_part('template-parts/components/category', null, array('size' => 'large', 'id' => $id)); ?>
  </div>
  <div class="p-postImageOverlay__content">
    <div class="u-p-3">
      <h3 class="c-heading__post">
        <?php echo esc_html($title); ?>
      </h3>
    </div>
  </div>
</a>
