<?php if (is_single()) : ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Product",
  "name": "<?php echo the_title() ?>",
  <?php if (has_post_thumbnail()) : ?>
  <?php $image_schema = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'progression-studios-blog-post'); ?> "image": [
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
      "bestRating": "5"
    },

    "author": {
      "@type": "Person",
      "name": "<?php the_post(); echo get_the_author(); rewind_posts(); ?>"
    }
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "<?php echo esc_attr(get_post_meta($post->ID, 'review_score', true)); ?>",
    "bestRating": "5",
    "reviewCount": "1"
  }
  <?php endif; ?>
}
</script>
<?php endif; ?>

<?php if (!is_front_page()) : ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "HOME",
      "item": "<?php echo esc_url(home_url('/')); ?>"
    }
    <?php
    $position = 2;
    if (is_single()) {
      $categories = get_the_category();
      if ($categories) {
        $cat = $categories[0];
        $ancestors = array_reverse(get_ancestors($cat->term_id, 'category'));
        foreach ($ancestors as $ancestor) {
          $cat_obj = get_category($ancestor);
          echo ',
          {
            "@type": "ListItem",
            "position": ' . $position++ . ',
            "name": "' . esc_html($cat_obj->name) . '",
            "item": "' . esc_url(get_category_link($ancestor)) . '"
          }';
        }
        echo ',
        {
          "@type": "ListItem",
          "position": ' . $position++ . ',
          "name": "' . esc_html($cat->name) . '",
          "item": "' . esc_url(get_category_link($cat->term_id)) . '"
        }';
      }
      echo ',
      {
        "@type": "ListItem",
        "position": ' . $position++ . ',
        "name": "' . esc_html(get_the_title()) . '"
      }';
    } elseif (is_page()) {
      global $post;
      if ($post->post_parent) {
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        foreach ($ancestors as $ancestor) {
          echo ',
          {
            "@type": "ListItem",
            "position": ' . $position++ . ',
            "name": "' . esc_html(get_the_title($ancestor)) . '",
            "item": "' . esc_url(get_permalink($ancestor)) . '"
          }';
        }
      }
      echo ',
      {
        "@type": "ListItem",
        "position": ' . $position++ . ',
        "name": "' . esc_html(get_the_title()) . '"
      }';
    }
    ?>
  ]
}
</script>
<?php endif; ?>
