	<?php if (is_page() || is_single()) : ?>
	<meta property="og:title" content="<?php the_title(); ?>" />
	<meta property="og:site_name" content="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" />
	<?php if (has_post_thumbnail($post->ID)) : ?><?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'progression-studios-blog-index'); ?>
	<meta name="twitter:image" content="<?php echo esc_attr($image[0]); ?>" />
	<meta property="og:image" content="<?php echo esc_attr($image[0]); ?>" />
	<meta property="og:image:secure_url" content="<?php echo esc_attr($image[0]); ?>" />
	<?php endif; ?>
	<?php endif; ?>
	<?php if (is_single() && get_theme_mod('progression_studios_blog_index_schema', 'true') == 'true') : ?>
	<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Product",
  "name": "<?php echo esc_attr(get_post_meta($post->ID, 'progression_studios_review_title', true)); ?>",
  <?php if (has_post_thumbnail()) : ?><?php $image_schema = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'progression-studios-blog-post'); ?> "image": [
    "<?php echo esc_attr($image_schema[0]); ?>"
  ],
  <?php endif; ?>
  <?php if (get_post_meta($post->ID, 'progression_studios_review_summary_text', true)) : ?> "description": "<?php echo esc_attr(get_post_meta($post->ID, 'progression_studios_review_summary_text', true)); ?>",
  <?php endif; ?>
  <?php if (get_post_meta($post->ID, 'review_score', true)) : ?> "review": {
    "@type": "Review",
    "reviewRating": {
      "@type": "Rating",
      "ratingValue": "<?php echo esc_attr(get_post_meta($post->ID, 'review_score', true)); ?>",
      "bestRating": "10"
    },
    "author": {
      "@type": "Person",
      "name": "<?php the_post();
									echo get_the_author();
									rewind_posts(); ?>"
    }
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "<?php echo esc_attr(get_post_meta($post->ID, 'review_score', true)); ?>",
    "bestRating": "10",
    "reviewCount": "1"
  }
  <?php endif; ?>
}
	</script>
	<?php endif; ?>