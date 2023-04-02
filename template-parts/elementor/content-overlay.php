<?php
$imageThumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'progression-studios-blog-background');
$image = $imageThumbnail[0];
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="progression-studios-default-blog-overlay <?php if (has_post_thumbnail()) : ?><?php else : ?><?php if (has_post_format('video') && get_post_meta($post->ID, 'video_code', true) || has_post_format('audio') && get_post_meta($post->ID, 'video_code', true)) : ?> progression-studios-overlay-video-index<?php endif; ?><?php endif; ?> <?php echo esc_attr(get_theme_mod('progression_studios_blog_transition')); ?>">

    <?php if ('post' == get_post_type()) : ?>
      <?php if ($settings['progression_elements_post_display_category'] == 'yes') : ?><div class="overlay-blog-meta-category-list"><?php the_category(' '); ?></div><?php endif; ?>
    <?php endif; ?>

    <?php if (has_post_thumbnail()) : ?>
    <?php else : ?>
      <?php if (has_post_format('video') && get_post_meta($post->ID, 'video_code', true) || has_post_format('audio') && get_post_meta($post->ID, 'video_code', true)) : ?>

        <div class="progression-studios-feaured-video-overlay">
          <?php echo apply_filters('the_content', get_post_meta($post->ID, 'video_code', true)); ?>
        </div>
      <?php endif; ?>
    <?php endif; ?>

    <a href="<?php the_permalink(); ?>">
      <?php if (has_post_thumbnail()) : ?>
        <div class="overlay-progression-studios-blog-image" style="background-image:url('<?php echo esc_attr($image); ?>')">
        </div>
      <?php endif; ?>

      <div class="overlay-progression-blog-content">
        <div class="overlay-progression-blog-content-table-cell">
          <?php if ($settings['progression_elements_post_show_review'] == 'yes' && get_post_meta($post->ID, 'review_score', true)) : ?>
            <span class="c-score u-absolute u-right-1-5 u-top-1-5">
              <span class="c-score__count">
                <?php echo esc_attr(get_post_meta($post->ID, 'review_score', true)); ?>
              </span>
            </span>
          <?php endif; ?>
          <div class="overlay-progression-blog-content-padding">
            <h3 class="c-heading__post"><?php the_title(); ?></h3>
            <?php if ($settings['progression_elements_post_display_excerpt'] == 'yes' && has_excerpt()) : ?>
              <div class="c-excerpt">
                <?php the_excerpt(); ?>
              </div>
            <?php endif; ?>
          </div><!-- close .overlay-progression-blog-content-padding -->
        </div><!-- close .overlay-progression-blog-content-table-cell -->
      </div><!-- close .overlay-progression-blog-content -->
    </a>

    <div class="clearfix-pro"></div>
  </div><!-- close .progression-studios-default-blog-overlay -->
</div><!-- #post-## -->