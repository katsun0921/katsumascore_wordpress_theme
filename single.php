<?php
$post_id = $post->ID;
$template = 'template-parts';
?>
<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

<?php get_template_part($template . '/content-title', null, array('post_id' => $post_id, 'headingText' => get_post_meta($post_id, 'title_jp', true), 'is_post' => 'post' == get_post_type())); ?>

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