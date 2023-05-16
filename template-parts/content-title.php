<?php
['post_id' => $post_id, 'headingText' => $headingText, 'is_post' => $is_post] = $args;
$imageThumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'background');
$image = $imageThumbnail[0];
$parent_class = $is_post ? 'u-mb-50px l-title' : 'u-bg-cover u-mb-50px l-title';
?>

<div style="<?php if (has_post_thumbnail()) : ?>background-image:url('<?php echo esc_attr($image); ?>') <?php endif; ?>"
  class="<?php echo $parent_class; ?>">
  <?php if ($is_post) : ?>
  <h1 class="page-title c-heading__title">
    <span class="u-block u-mb-6"><?php get_template_part('template-parts/content-category') ?></span>
    <?php if( pll_current_language() === 'en' ) : ?>
    <span class="u-block is-shadow"><?php echo $headingText ?><br>Synopsis, Impressions and Ratings</span>
    <?php else: ?>
    <span class="u-block is-shadow"><?php echo $headingText ?>の<br>あらすじ、感想、評価まとめ</span>
    <?php endif; ?>
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