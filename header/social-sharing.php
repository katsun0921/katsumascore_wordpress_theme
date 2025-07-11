<?php if (is_page() || is_single()) : ?>
<meta
  property="og:title"
  content="<?php the_title(); ?>"
/>
<meta
  property="og:site_name"
  content="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
/>
<?php if (has_post_thumbnail($post->ID)) : ?>
<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'index'); ?>
<meta
  name="twitter:image"
  content="<?php echo esc_attr($image[0]); ?>"
/>
<meta
  property="og:image"
  content="<?php echo esc_attr($image[0]); ?>"
/>
<meta
  property="og:image:secure_url"
  content="<?php echo esc_attr($image[0]); ?>"
/>
<?php endif; ?>
<?php endif; ?>
