<?php

/**
 * @package pro
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div
    class="progression-studios-default-blog-top progression-studios-default-blog-index <?php echo esc_attr(get_theme_mod('progression_studios_blog_transition')); ?>">
    <div class="progression-blog-content">

      <div class="progression-studios-image-top-image">

        <?php if (has_post_thumbnail()) : ?>
        <div class="progression-studios-feaured-image">
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('progression-studios-blog-index'); ?>
            <?php if (get_post_meta($post->ID, 'review_score', true)) : ?>
            <span class="c-score">
              <span class="c-score__count">
                <?php echo esc_attr(get_post_meta($post->ID, 'review_score', true)); ?>
              </span>
            </span>
            <?php endif; ?>
          </a>
        </div><!-- close .progression-studios-feaured-image -->
        <?php else : ?>

        <?php if (has_post_format('video') && get_post_meta($post->ID, 'video_code', true) || has_post_format('audio') && get_post_meta($post->ID, 'video_code', true)) : ?>

        <div class="progression-studios-feaured-image video-progression-studios-format">
          <?php echo apply_filters('the_content', get_post_meta($post->ID, 'video_code', true)); ?>
        </div>


        <?php endif; ?>
        <!-- close gallery -->

        <?php endif; ?>
        <!-- close video -->
      </div><!-- close .progression-studios-image-top-image -->

      <div class="blog-post-vertical-content-layout">

        <?php if ('post' == get_post_type()) : ?>
        <?php if (get_theme_mod('progression_studios_blog_index_meta_category_display', 'true') == 'true') : ?>
        <div class="blog-meta-category-list"><?php the_category(' '); ?></div>
        <?php endif; ?>
        <?php endif; ?>

        <h2 class="progression-blog-title"><?php the_title(); ?></a></h2>

        <?php if ('post' == get_post_type()) : ?>
        <ul class="progression-post-meta">

          <?php if (get_theme_mod('progression_studios_blog_meta_author_display', 'true') == 'true') : ?><li
            class="blog-meta-author-display"><?php esc_html_e('By', 'ratency-progression'); ?> <a
              href="<?php echo get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')); ?>"><?php the_author(); ?></a>
          </li><?php endif; ?>

          <?php if (get_theme_mod('progression_studios_blog_meta_date_display', 'true') == 'true' && 'post' == get_post_type()) : ?>
          <?php if (get_theme_mod('progression_studios_blog_date_ago', 'true') == 'true') : ?>
          <li class="blog-meta-date-list"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')); ?>
            <?php esc_html_e('ago', 'ratency-progression'); ?></li>
          <?php else : ?>
          <li class="blog-meta-date-list"><?php the_time(get_option('date_format')); ?></li>
          <?php endif; ?>
          <?php endif; ?>
        </ul>
        <?php endif; ?>

        <?php if (get_theme_mod('progression_studios_blog_excerpt', 'true') == 'true') : ?>
        <div class="progression-studios-blog-excerpt">
          <?php if (has_excerpt()) : ?><?php the_excerpt(); ?><?php else : ?>
          <?php if ('post' == get_post_type()) : ?><?php the_content(sprintf(wp_kses(__('Continue Reading <i class="fa fa-chevron-right" aria-hidden="true"></i>', 'ratency-progression'), array('i' => array('id' => array(),  'class' => array(),  'style' => array(),), 'span' => array('class' => array()))), the_title('<span class="screen-reader-text">"', '"</span>', false))); ?><?php endif; ?>
          <?php endif; ?>

          <?php if (!get_the_title()) : ?>
          <p><a href="<?php the_permalink(); ?>"
              class="more-link"><?php echo wp_kses(__('Continue Reading <i class="fa fa-chevron-right" aria-hidden="true"></i>', 'ratency-progression'), true) ?></a>
          </p>
          <?php endif; ?>

          <div class="clearfix-pro"></div>
          <?php wp_link_pages(array(
            'before' => '<div class="c-pagination">' . esc_html__('Pages:', 'ratency-progression'),
            'after'  => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
          ));
          ?>

        </div>
        <?php endif; ?>
        <?php if (is_sticky() && is_home() && !is_paged()) {
          printf('<div class="progression-studios-sticky-post">%s</div>', esc_html__('FEATURED', 'ratency-progression'));
        } ?>
      </div>
      <!-- close
.blog-post-vertical-content-layout -->

    </div><!-- close .progression-blog-content -->
  </div>
  <!-- close .pro
gression-studios-defaul
t-blog-index -->
</div><!-- #post-## -->
