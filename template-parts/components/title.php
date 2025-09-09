<?php
['post_id' => $post_id, 'headingText' => $headingText, 'is_post' => $is_post] = $args;
$imageThumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'background');
$image = $imageThumbnail[0];
$parent_class = $is_post ? 'u-mb-50px l-title' : 'u-bg-cover u-mb-50px l-title';
?>

<hgroup style="<?php if (has_post_thumbnail()) : ?>background-image:url('<?php echo esc_attr($image); ?>') <?php endif; ?>"
  class="<?php echo $parent_class; ?>">
  <?php if ($is_post) : ?>
    <h1 class="page-title c-heading__title">
      <span class="u-block u-mb-6"><?php get_template_part('template-parts/components/category') ?></span>
      <span class="u-block u-px-20 is-shadow"><?php echo the_title() ?></span>
    </h1>
  <?php else : ?>
    <h1 class="page-title c-heading__title">
      <?php echo !!$headingText ? $headingText : single_cat_title() ?>
    </h1>
  <?php endif; ?>
</hgroup>