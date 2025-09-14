<?php
$post_id = isset($post) ? $post->ID : null;
$template = 'template-parts';
?>
<?php get_header(); ?>

<?php get_template_part($template . '/components/title', null, array('post_id' => $post_id, 'headingText' => null)); ?>

<main class="site-content u-relative">
  <div class="l-content u-mx-auto">
    <!-- パンくずリスト（Breadcrumbs） -->
    <?php if (function_exists('custom_breadcrumb')) {
      custom_breadcrumb();
    } ?>
  </div>
  <div class="l-container l-container__showSidebar u-mt-12">
    <section class="l-content">
      <?php if (have_posts()) : ?>
        <ul class="u-flex u-flex-col u-gap-10">
          <?php while (have_posts()) : the_post(); ?>
            <li>
              <?php get_template_part('template-parts/components/post-image-left'); ?>
            </li>
          <?php endwhile; ?>
        </ul>
        <div class="u-mt-8">
          <?php get_template_part('template-parts/components/pagination'); ?>
        </div>
      <?php else : ?>
        <?php get_template_part('template-parts/components/none'); ?>
      <?php endif; ?>
    </section>
    <?php get_sidebar(); ?>
  </div>
</main>
<?php get_footer(); ?>
