<?php
$post_id = $post->ID;
$template = 'template-parts';
?>

<?php get_header(); ?>

<?php if (!get_post_meta($cover_page->ID, 'progression_studios_disable_page_title', true)) : ?>
<?php  get_template_part($template . '/content-title', null, array('post_id' => $post_id, 'headingText' => get_the_title($cover_page))); ?>
<?php else : ?>
<?php  get_template_part($template . '/content-title', null, array('post_id' => $post_id, 'headingText' => 'Latest News')); ?>
<?php endif; ?>

<div id="content-pro" class="site-content u-mb-50px u-relative">
  <div
    class="l-container<?php if (get_option('page_for_posts')) : $cover_page = get_page(get_option('page_for_posts')); ?><?php endif; ?>">

    <?php if (is_active_sidebar('progression-studios-post-widget-sidebar')) : ?>
    <div id="main-container-pro" class="l-content">
      <?php endif; ?>

      <?php if (have_posts()) : ?>
      <div class="progression-studios-blog-index">

        <div class="progression-masonry-margins">
          <div class="progression-blog-index-masonry">
            <?php while (have_posts()) : the_post(); ?>
            <div
              class="progression-masonry-item progression-masonry-col-<?php echo esc_attr(get_theme_mod('progression_studios_blog_columns', '1')); ?>">
              <div class="progression-masonry-padding-blog">
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
            <?php endwhile; ?>
          </div>
        </div>
      </div>

      <?php else : ?>

      <div class="progression-studios-blog-index">
        <?php get_template_part('template-parts/content', 'none'); ?>
      </div>

      <?php endif; ?>
    </div>

    <?php if (is_active_sidebar('progression-studios-post-widget-sidebar')) : ?>
    <?php get_sidebar(); ?>
    <?php endif; ?>
  </div>
  <!-- close .l-container -->
</div>
<!-- #content-pro -->
<?php get_footer(); ?>