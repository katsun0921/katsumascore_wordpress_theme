<?php
/**
 * The Component for Post Top Image
 */
$post_id = $post->ID;
$imageThumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post), 'background');
$image = $imageThumbnail[0];
?>

<a class="p-postTopImage" href="<?php the_permalink(); ?>">
  <div class="p-postTopImage__image">
    <img src="<?php echo esc_url($image); ?>" alt="" width="540" />
    <div class="u-absolute u-right-2 u-top-2">
      <?php get_template_part('template-parts/components/Score', null, array('post_id' => $post_id)); ?>
    </div>
  </div>
  <div class="p-postTopImage__content">
    <div>
      <div class="u-mb-4">
        <?php get_template_part('template-parts/components/category', null, array('size' => 'small')); ?>
      </div>
      <h3 class="c-heading__post">
        <?php the_title(); ?>
      </h3>
      <div class="p-postTopImage__excerpt">
        <?php the_excerpt() ?>
      </div>
    </div>
  </div>
</a>
