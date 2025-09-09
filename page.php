<?php
$post_id = get_the_ID();;
$template = 'template-parts';
?>

<? get_header(); ?>


<?php if (!get_post_meta($post_id, 'progression_studios_disable_page_title', true)) : ?>
  <?php get_template_part($template . '/components/title', null, array('post_id' => $post_id, 'headingText' => get_the_title())); ?>
<?php endif; ?>


<div id="content-pro" class="u-mb-50px u-relative">
  <div class="l-container">
    <?php while (have_posts()) : the_post(); ?>
      <?php get_template_part('template-parts/page/page'); ?>
    <?php endwhile; ?>
  </div><!-- close .l-container -->
</div><!-- #content-pro -->

<?php get_footer(); ?>