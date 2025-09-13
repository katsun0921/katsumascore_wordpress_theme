<?php
$post_id = get_the_ID();;
$template = 'template-parts';
?>

<? get_header(); ?>


<?php get_template_part($template . '/components/title', null, array('post_id' => $post_id, 'headingText' => get_the_title())); ?>

<div class="u-my-12 u-relative">
  <div class="l-container">
    <?php while (have_posts()) : the_post(); ?>
      <?php get_template_part('template-parts/page/page'); ?>
    <?php endwhile; ?>
  </div><!-- close .l-container -->
</div><!-- #content-pro -->

<?php get_footer(); ?>
