<?php

/**
 * The template for displaying all single posts.
 *
 * @package pro
 */

get_header(); ?>
<?php while (have_posts()) : the_post(); ?>

<div id="progression-studios-post-page-title">

  <?php if (get_theme_mod('progression_studios_blog_post_rating_page_title') == 'true') : ?>
  <?php if (get_post_meta($post->ID, 'review_score', true)) : ?>
  <div class="progression-studios-hexagon-page-title-container">
    <div class="progression-studios-hexagon-border">
      <div class="progression-blog-review-total">
        <?php echo esc_attr(get_post_meta($post->ID, 'review_score', true)); ?>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <?php endif; ?>

  <?php if ('post' == get_post_type()) : ?><?php if (get_theme_mod('progression_studios_blog_post_index_meta_category_display', 'true') == 'true') : ?>
  <div id="progression-studios-post-category"><?php the_category(' '); ?></div><?php endif; ?><?php endif; ?>
  <h1 class="progression-post-single-title"><?php echo get_post_meta($post->ID, 'title_jp', true); ?>の<br>あらすじ、感想、評価まとめ
  </h1>

  <?php if ('post' == get_post_type()) : ?>
  <ul class="progression-studios-single-post-meta">
    <?php if (get_theme_mod('progression_studios_blog_post_meta_author_display', 'true') == 'true') : ?><li
      class="blog-meta-author-display"><?php esc_html_e('By', 'ratency-progression'); ?> <a
        href="<?php echo get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')); ?>"><?php the_author(); ?></a>
    </li><?php endif; ?>
    <?php if (get_theme_mod('progression_studios_blog_post_meta_date_display', 'true') == 'true') : ?>
    <?php if (get_theme_mod('progression_studios_blog_date_ago', 'true') == 'true') : ?>
    <li class="blog-meta-date-list"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')); ?>
      <?php esc_html_e('ago', 'ratency-progression'); ?></li>
    <?php else : ?>
    <li class="blog-meta-date-list"><?php the_time(get_option('date_format')); ?></li>
    <?php endif; ?>
    <?php endif; ?>
    <?php if (get_theme_mod('progression_studios_blog_post_meta_comment_display', 'true') == 'true') : ?><li
      class="blog-meta-comments">
      <?php comments_popup_link(esc_html__('0 comments', 'ratency-progression'), '1 ' . esc_html__('comment', 'ratency-progression'),   '% ' . esc_html__('comments', 'ratency-progression')); ?>
    </li><?php endif; ?>
  </ul>
  <?php endif; ?>
  <?php if (has_post_thumbnail() || get_post_meta($post->ID, 'progression_studios_gallery-image-url', true)) : ?>
  <div id="progression-studios-post-overlay-image" <?php
                                                        $imageThumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'progression-studios-blog-background');
                                                        $imageUrl = get_post_meta($post->ID, 'progression_studios_gallery-image-url', true);
                                                        $image = $imageUrl ? $imageUrl : $imageThumbnail[0];
                                                        ?>
    style="background-image:url('<?php echo esc_attr($image); ?>')"></div>
  <?php endif; ?>
</div><!-- close #progression-studios-post-page-title -->

<?php if (function_exists('progression_studios_elements_sharing')) : ?><?php progression_studios_elements_sharing(); ?><?php endif; ?>

<div id="content-pro" class="site-content-blog-post u-mt-60px u-mb-50px u-relative ">

  <div class="l-container">
    <?php if (get_theme_mod('progression_studios_blog_post_sidebar', 'right') == 'right' || get_theme_mod('progression_studios_blog_post_sidebar', 'right') == 'left') : ?>
    <div id="main-container-pro" class="l-content"><?php endif; ?>

      <?php get_template_part('template-parts/date', 'single'); ?>
      <?php get_template_part('template-parts/content', 'single'); ?>

      <?php if (get_theme_mod('progression_studios_blog_post_sidebar', 'right') == 'right' || get_theme_mod('progression_studios_blog_post_sidebar', 'right') == 'left') : ?>
    </div><!-- close #main-container-pro --><?php get_sidebar(); ?><?php endif; ?>

    <div class="clearfix-pro"></div>
  </div><!-- close .l-container -->

</div><!-- #content-pro -->

<?php endwhile; // end of the loop.
?>
<?php get_footer(); ?>