<?php
$post_id = $post->ID;
$template = 'template-parts';
?>

<?php get_header(); ?>

<?php if (!get_post_meta($cover_page->ID, 'progression_studios_disable_page_title', true)) : ?>
<?php  get_template_part($template . '/component/title', null, array('post_id' => $post_id, 'headingText' => get_the_title($cover_page))); ?>
<?php else : ?>
<?php  get_template_part($template . '/component/title', null, array('post_id' => $post_id, 'headingText' => 'Latest News')); ?>
<?php endif; ?>

<div class="u-mb-50px u-relative">
  <div class="l-container">
    <?php if (is_active_sidebar('progression-studios-post-widget-sidebar')) : ?>
    <div class="l-content">
      <?php endif; ?>

      <?php if (have_posts()) : ?>
      <ul class="progression-blog-index-masonry">
        <?php while (have_posts()) : the_post(); ?>
        <li>
          <?php get_template_part('template-parts/component/post-image-overlay', null, array('post_id' => $post_id)); ?>
        </li>
        <?php endwhile; ?>
      </ul>

      <?php else : ?>

      <?php get_template_part('template-parts/component/none'); ?>

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
