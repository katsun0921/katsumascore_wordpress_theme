<?php
$imageThumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'progression-studios-blog-background');
$image = $imageThumbnail[0];
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div
    class="progression-studios-default-blog-overlay <?php echo esc_attr(get_theme_mod('progression_studios_blog_transition')); ?>">

    <a href="<?php the_permalink(); ?>">
      <?php if (has_post_thumbnail()) : ?>
      <div class="overlay-progression-studios-blog-image"
        style="background-image:url('<?php echo esc_attr($image); ?>')">
      </div>
      <?php endif; ?>

      <?php if (get_post_meta($post->ID, 'review_score', true)) : ?>
      <span class="c-score">
        <span class="c-score__count">
          <?php echo esc_attr(get_post_meta($post->ID, 'review_score', true)); ?>
        </span>
      </span>
      <?php endif; ?>

      <div class="overlay-progression-blog-content">
        <div class="overlay-progression-blog-content-table-cell">
          <div class="overlay-progression-blog-content-padding">

            <div class="related-overlay-blog-meta-category-list"><?php foreach ((get_the_category()) as $category) {
                                                                  echo '<span>' . $category->cat_name . '</span>';
                                                                } ?></div>

            <h2 class="overlay-progression-blog-title"><?php the_title(); ?></h2>

          </div><!-- close .overlay-progression-blog-content-padding -->

        </div>
      </div><!-- close .overlay-progression-blog-content -->

      <div class="overlay-blog-gradient"></div>
    </a>

    <div class="clearfix-pro"></div>
  </div><!-- close .progression-studios-default-blog-overlay -->
</div><!-- #post-## -->
