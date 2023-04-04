<?php
$post_id = $post->ID;
$template = 'template-parts';
?>

<?php get_header(); ?>

<?php  get_template_part($template . '/content-title', null, array('post_id' => $post_id, 'headingText' => get_the_author())); ?>

<div id="content-pro" class="site-content u-mb-50px u-relative">
  <div class="l-container l-container__showLeftSidebar">
    <div id="main-container-pro" class="l-content">



      <?php if (get_the_author_meta('description')) : ?>
      <?php get_template_part('template-parts/author', 'info'); ?>
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
                <?php if (get_theme_mod('progression_studios_blog_index_layout') == 'default') : ?>
                <?php get_template_part('template-parts/content', get_post_format()); ?>
                <?php endif; ?>
                <?php if (get_theme_mod('progression_studios_blog_index_layout') == 'overlay') : ?>
                <?php get_template_part('template-parts/content', 'overlay'); ?>
                <?php endif; ?>
                <?php if (get_theme_mod('progression_studios_blog_index_layout', 'top-image') == 'top-image') : ?>
                <?php get_template_part('template-parts/content', 'top'); ?>
                <?php endif; ?>
              </div>
            </div>
            <?php endwhile; ?>
          </div><!-- close .progression-blog-index-masonry -->
        </div><!-- close .progression-masonry-margins -->
      </div><!-- close .progression-studios-blog-index -->

      <div class="clearfix-pro"></div>

      <?php else : ?>

      <div class="progression-studios-blog-index">
        <?php get_template_part('template-parts/content', 'none'); ?>
      </div><!-- close .progression-masonry-margins -->

      <?php endif; ?>
    </div><!-- close #main-container-pro -->
    <?php get_sidebar(); ?>
  </div><!-- close .l-container -->
</div><!-- #content-pro -->
<?php get_footer(); ?>
