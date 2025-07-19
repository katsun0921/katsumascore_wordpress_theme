<?php
$post_id = $post->ID;
$template = 'template-parts';
?>

<section
  id="single-post-<?php echo $post_id; ?>"
  <?php post_class(); ?>
>
  <?php get_template_part($template . '/content-review'); ?>

  <?php if (is_active_sidebar('progression-studios-post-widgets-top')) : ?>
  <div class="widget-area-top-of-posts">
    <?php dynamic_sidebar('progression-studios-post-widgets-top'); ?>
  </div>
  <?php endif; ?>

  <?php get_template_part($template . '/content-good-point') ?>
  <?php get_template_part($template . '/content-summary') ?>

  <article class="p-content u-my-8">
    <?php the_content(); ?>
  </article>

  <div class="u-mb-8">
    <?php get_template_part($template . '/content-review-site-scores'); ?>
  </div>

  <?php get_template_part($template . '/content-introduce-vod', null, array('post_id' => $post_id)); ?>


  <?php wp_link_pages(
      array(
        'before' => '<div class="c-pagination">' . esc_html__('Pages:', 'ratency-progression'),
        'after' => '</div>',
        'link_before' => '<span>',
        'link_after' => '</span>',
      )
    );
    ?>


  <?php if (is_active_sidebar('progression-studios-post-widgets-bottom')) : ?>
  <div class="u-mt-3 u-mb-12 c-search__box">
    <?php dynamic_sidebar('progression-studios-post-widgets-bottom'); ?>
  </div>
  <?php endif; ?>

</section>
