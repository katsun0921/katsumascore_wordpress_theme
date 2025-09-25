<?php
$post_id = isset($post) ? $post->ID : null;
$template = 'template-parts';
?>

<?php get_header(); ?>

<?php get_template_part($template . '/components/title', null, array('post_id' => $post_id, 'headingText' => 'Search for:' . get_search_query())); ?>

<main class="site-content u-mt-12 u-relative">
  <div class="l-container">
    <section class="l-content">
      <?php if (have_posts()) : ?>

        <ul>
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
  </div><!-- close .l-container -->
</main><!-- #content-pro -->
<?php get_footer(); ?>
