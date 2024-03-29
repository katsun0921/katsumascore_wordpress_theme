<?php
$post_id = $post->ID;
$template = 'template-parts';
?>

<?php get_header(); ?>

<?php  get_template_part($template . '/content-title', null, array('post_id' => $post_id, 'headingText' => 'Search for:'. get_search_query())); ?>


<div id="content-pro" class="site-content u-mb-50px u-relative">
  <div class="l-container l-container__showLeftSidebar">
    <div class="l-content">
      <?php if (have_posts()) : ?>

      <ul>
        <?php while (have_posts()) : the_post(); ?>
        <li>
          <?php if (get_theme_mod('progression_studios_blog_index_layout') == 'default') : ?>
          <?php get_template_part('template-parts/content', get_post_format()); ?>
          <?php endif; ?>
          <?php if (get_theme_mod('progression_studios_blog_index_layout') == 'overlay') : ?>
          <?php get_template_part('template-parts/content', 'overlay'); ?>
          <?php endif; ?>
          <?php if (get_theme_mod('progression_studios_blog_index_layout', 'top-image') == 'top-image') : ?>
          <?php get_template_part('template-parts/content', 'top'); ?>
          <?php endif; ?>
        </li>
        <?php endwhile; ?>
      </ul><!-- close .progression-blog-index-masonry -->

      <?php else : ?>

      <?php get_template_part('template-parts/content', 'none'); ?>

      <?php endif; ?>
    </div>
    <?php get_sidebar(); ?>
  </div><!-- close .l-container -->
</div><!-- #content-pro -->
<?php get_footer(); ?>