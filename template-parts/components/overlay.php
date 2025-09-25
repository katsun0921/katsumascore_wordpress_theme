<?php
$post_id = $post->ID;
$imageThumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'background');
$image = $imageThumbnail[0];
$cats = get_the_category();
$cat = $cats[0];
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <a href="<?php the_permalink(); ?>"  <?php if (has_post_thumbnail()) : ?> style="background-image:url('<?php echo esc_attr($image); ?>')" <?php endif; ?>>
    <?php if ('post' == get_post_type()) : ?>
      <div class="u-z-20 u-relative">
        <div class="c-category c-category__small u-z-20"><?php echo $cat->cat_name; ?></div>
      </div>
    <?php endif; ?>

    <?php if (get_post_meta($post->ID, 'review_score', true)) : ?>
      <div class="u-absolute u-right-1-5 u-top-1-5">
        <?php get_template_part('template-parts/components/score', null, array('post_id' => $post_id)); ?>
      </div>
    <?php endif; ?>
    <div>
      <div class="u-p-3">
        <h3 class="c-heading__post"><?php the_title(); ?></h3>
      </div>
    </div>
  </a>
</div>
