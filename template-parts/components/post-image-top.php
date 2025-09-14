<?php

/**
 * The Component for Post Top Image
 */
$id = $args['id'] ?? get_the_ID();
$title = get_the_title($id);
$excerpt = get_the_excerpt($id);
$permalink = get_permalink($id);
$imageThumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'background');
$image = $imageThumbnail[0];
?>

<a class="p-postTopImage" href="<?php the_permalink(); ?>">
  <div class="p-postTopImage__image">
    <img src="<?php echo esc_url($image); ?>" alt="" width="540" loading="lazy" />
    <div class="u-absolute u-right-2 u-top-2">
      <?php get_template_part('template-parts/components/score', null, array('post_id' => $id)); ?>
    </div>
  </div>
  <div class="p-postTopImage__content">
    <div>
      <div class="u-mb-4">
        <?php get_template_part('template-parts/components/category', null, array('size' => 'small', 'id' => $id)); ?>
      </div>
      <h3 class="c-heading__post">
        <?php echo esc_html($title); ?>
      </h3>
      <div class="p-postTopImage__excerpt">
        <?php echo esc_html($excerpt); ?>
      </div>
    </div>
  </div>
</a>
