<?php
/**
 * The Component for Post Top Image
 */
$post_id = $post->ID;
$imageThumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post), 'background');
$image = $imageThumbnail[0];
?>

<a id="post-<?php the_ID(); ?>" class="p-postImageOverlay" href="<?php the_permalink() ?>"
  style='background-image: url("<?php echo esc_url($image); ?>");'>
  <div class="u-z-20 u-absolute u-right-1-5 u-top-1-5">
    <?php get_template_part('template-parts/component/score', null, array('post_id' => $post_id)); ?>
  </div>
  <div class="u-z-20 u-relative">
    <?php get_template_part('template-parts/component/category', null, array('size' => 'large')); ?>
  </div>
  <div class="p-postImageOverlay__content">
    <div class="u-p-3">
      <h3 class="c-heading__post">
        <?php the_title(); ?>
      </h3>
    </div>
  </div>
</a>
