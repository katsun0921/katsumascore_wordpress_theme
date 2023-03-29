<?php
$post_id = $post->ID;
$template = 'template-parts';
?>

<?php get_header(); ?>

<?php if (get_option('page_for_posts')) : $cover_page = get_page(get_option('page_for_posts')); ?>

<?php if (!get_post_meta($cover_page->ID, 'progression_studios_disable_page_title', true)) : ?>
<?php  get_template_part($template . '/content-title', null, array('post_id' => $post_id, 'headingText' => get_the_title($cover_page))); ?>
<?php else : ?>
<?php  get_template_part($template . '/content-title', null, array('post_id' => $post_id, 'headingText' => 'Latest News')); ?>
<?php endif; ?>

<div id="content-pro" class="site-content u-mb-50px u-relative">
  <div
    class="l-container<?php if (get_option('page_for_posts')) : $cover_page = get_page(get_option('page_for_posts')); ?><?php endif; ?>">

    <?php if (is_active_sidebar('progression-studios-sidebar')) : ?><div id="main-container-pro" class="l-content">
      <?php endif; ?>


      <?php if (have_posts()) : ?>
      <div class="progression-studios-blog-index">

        <div class="progression-masonry-margins"
          style="margin-top:-<?php echo esc_attr(get_theme_mod('progression_studios_blog_index_gap', '15')); ?>px; margin-left:-<?php echo esc_attr(get_theme_mod('progression_studios_blog_index_gap', '15')); ?>px; margin-right:-<?php echo esc_attr(get_theme_mod('progression_studios_blog_index_gap', '15')); ?>px;">
          <div class="progression-blog-index-masonry">
            <?php while (have_posts()) : the_post(); ?>
            <div
              class="progression-masonry-item progression-masonry-col-<?php echo esc_attr(get_theme_mod('progression_studios_blog_columns', '1')); ?>">
              <div class="progression-masonry-padding-blog"
                style="padding:<?php echo esc_attr(get_theme_mod('progression_studios_blog_index_gap', '15')); ?>px;">
                <div class="progression-studios-isotope-animation">
                  <?php if (get_theme_mod('progression_studios_blog_index_layout', 'default') == 'default') : ?>
                  <?php get_template_part('template-parts/content', get_post_format()); ?>
                  <?php endif; ?>
                  <?php if (get_theme_mod('progression_studios_blog_index_layout') == 'overlay') : ?>
                  <?php get_template_part('template-parts/content', 'overlay'); ?>
                  <?php endif; ?>
                  <?php if (get_theme_mod('progression_studios_blog_index_layout') == 'top-image') : ?>
                  <?php get_template_part('template-parts/content', 'top'); ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <?php endwhile; ?>
          </div><!-- close .progression-blog-index-masonry -->
        </div><!-- close .progression-masonry-margins -->
      </div><!-- close .progression-studios-blog-index -->

      <div class="clearfix-pro"></div>

      <?php if (get_theme_mod('progression_studios_blog_pagination', 'default') == 'default') : ?>
      <?php progression_studios_show_pagination_links_pro(); ?>
      <?php endif; ?>

      <?php if (get_theme_mod('progression_studios_blog_pagination') == 'load-more') : ?>
      <div id="progression-load-more-manual"><?php progression_studios_infinite_content_nav_pro('nav-below'); ?></div>
      <?php endif; ?>

      <?php if (get_theme_mod('progression_studios_blog_pagination') == 'infinite-scroll') : ?>
      <?php progression_studios_infinite_content_nav_pro('nav-below'); ?>
      <?php endif; ?>

      <div class="clearfix-pro"></div>

      <?php else : ?>

      <div class="progression-studios-blog-index">
        <?php get_template_part('template-parts/content', 'none'); ?>
      </div><!-- close .progression-masonry-margins -->

      <?php endif; ?>


      <?php if (is_active_sidebar('progression-studios-sidebar')) : ?>
    </div><!-- close #main-container-pro --><?php get_sidebar(); ?><?php endif; ?>

    <div class="clearfix-pro"></div>
  </div><!-- close .l-container -->
</div>
<!-- #content-pr
o -->
<?php get_footer(); ?>
