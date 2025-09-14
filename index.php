<?php
$post_id = $post->ID;
$template = 'template-parts';
?>

<?php get_header(); ?>

<?php get_template_part($template . '/components/title', null, array('post_id' => $post_id, 'headingText' => get_the_title($cover_page))); ?>

<main class="u-mb-50px u-relative">
  <div class="l-container">
    <section class="l-content">
      <?php if (have_posts()) : ?>
        <ul class="progression-blog-index-masonry">
          <?php while (have_posts()) : the_post(); ?>
            <li>
              <?php get_template_part('template-parts/components/post-image-left', null, array('post_id' => $post_id)); ?>
            </li>
          <?php endwhile; ?>
        </ul>

      <?php else : ?>

        <?php get_template_part('template-parts/components/none'); ?>

      <?php endif; ?>
      </section>
      <?php get_sidebar(); ?>
  </div>
</main>
<?php get_footer(); ?>
