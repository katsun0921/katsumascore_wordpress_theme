<?php
$post_id = $args['post_id'] ?? null;
$headingText = $args['headingText'] ?? null;
$is_post = (get_post_type() === 'post');
$imageThumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'background');
$image = ($imageThumbnail && is_array($imageThumbnail)) ? $imageThumbnail[0] : '';
$parent_class = $is_post ? 'u-mb-50px l-title' : 'u-bg-cover u-mb-50px l-title';
?>

<hgroup style="<?php if (has_post_thumbnail()) : ?>background-image:url('<?php echo esc_attr($image); ?>') <?php endif; ?>"
  class="<?php echo $parent_class; ?>">
  <?php if (is_category()) : ?>
    <h1 class="page-title c-heading__title">
      <?php echo single_cat_title('', false); ?>
    </h1>
  <?php elseif (is_tax()) : ?>
    <h1 class="page-title c-heading__title">
      <div class="u-block u-mb-6 c-category c-category__title">
        <?php
        $tax = get_queried_object();
        if ($tax && isset($tax->taxonomy)) {
          $tax_obj = get_taxonomy($tax->taxonomy);
          echo esc_html($tax_obj->labels->singular_name);
        }
        ?>
      </div>
      <?php echo single_term_title('', false); ?>
    </h1>
  <?php elseif ($is_post) : ?>
    <h1 class="page-title c-heading__title">
      <div class="u-block u-mb-6"><?php get_template_part('template-parts/components/category') ?></div>
      <span class="u-block u-px-20 is-shadow"><?php echo the_title() ?></span>
    </h1>
  <?php else : ?>
    <h1 class="page-title c-heading__title">
      <?php echo !!$headingText ? $headingText : ''; ?>
    </h1>
  <?php endif; ?>
</hgroup>
