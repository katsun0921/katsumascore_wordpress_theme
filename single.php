<?php
$post_id = $post->ID;
$template = 'template-parts';
?>
<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

<?php get_template_part($template . '/content-title', null, array('post_id' => $post_id, 'headingText' => get_post_meta($post_id, 'title_jp', true), 'is_post' => 'post' == get_post_type())); ?>

<div id="content-pro" class="site-content-blog-post u-mt-60px u-mb-50px u-relative ">
  <div class="l-container l-container__showLeftSidebar">
    <div id="main-container-pro" class="l-content">
      <?php get_template_part('template-parts/date', 'single'); ?>
      <?php get_template_part('template-parts/content', 'single'); ?>
    </div><!-- close #main-container-pro -->
    <?php get_sidebar(); ?>
  </div><!-- close .l-container -->
  <div class="u-mt-10">
    <?php get_template_part('template-parts/content-sharing'); ?>
  </div>
</div><!-- #content-pro -->

<?php endwhile; ?>

<?php get_footer(); ?>