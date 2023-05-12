<?php
$post_id = $post->ID;
$template = 'template-parts';
?>
<?php get_header(); ?>

<?php  get_template_part($template . '/content-title', null, array('post_id' => $post_id, 'headingText' => get_the_archive_title())); ?>

<div id="content-pro" class="site-content u-mb-50px u-relative">
  <div class="l-container l-container__showLeftSidebar">
    <div class="l-content">
      <?php if (have_posts()) : ?>
      <ul class="u-flex u-flex-col u-gap-10">
        <?php while (have_posts()) : the_post(); ?>
        <li>
          <?php get_template_part('template-parts/components/postImageOverlay'); ?>
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