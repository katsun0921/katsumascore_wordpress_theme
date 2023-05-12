<?php
['post_id' => $post_id, 'headingText' => $headingText, 'is_post' => $is_post] = $args;
$imageThumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'background');
$image = $imageThumbnail[0];
?>

<div style="<?php if (has_post_thumbnail()) : ?>background-image:url('<?php echo esc_attr($image); ?>') <?php endif; ?>"
  class=" u-mb-50px l-title">
  <?php if ($is_post) : ?>
  <h1 class="page-title c-heading__title">
    <span class="u-block u-mb-6"><?php get_template_part('template-parts/content-category') ?></span>
    <span class="u-block is-shadow"><?php echo $headingText ?>の<br>あらすじ、感想、評価まとめ</span>
  </h1>
  <p class="u-text-white">
    <?php if (get_theme_mod('progression_studios_blog_post_meta_date_display', 'true') == 'true' && get_theme_mod('progression_studios_blog_date_ago', 'true') == 'true') : ?>
    <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')); ?>
    <?php esc_html_e('ago', 'ratency-progression'); ?>
    <?php else : ?>
    <li class="blog-meta-date-list"><?php the_time(get_option('date_format')); ?></li>
    <?php endif; ?>
  </p>
  <?php else : ?>
  <h1 class="page-title c-heading__title">
    <?php echo $headingText ?></h1>
  <?php endif; ?>
</div>