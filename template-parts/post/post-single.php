<?php
$post_id = $post->ID;
$template = 'template-parts';
?>

<section
  id="single-post-<?php echo $post_id; ?>"
  <?php post_class(); ?>>
  <?php get_template_part($template . '/post/post-review'); ?>

  <?php get_template_part($template . '/plugins/acf/acf-good-point') ?>
  <?php get_template_part($template . '/plugins/acf/acf-summary') ?>

  <article class="p-content u-my-8">
    <?php the_content(); ?>
  </article>

  <div class="u-mb-8">
    <?php get_template_part($template . '/plugins/acf/acf-review-site-scores'); ?>
  </div>

  <?php get_template_part($template . '/plugins/acf/post-introduce-vod', null, array('post_id' => $post_id)); ?>


  <?php wp_link_pages(
    array(
      'before' => '<div class="c-pagination">' . esc_html__('Pages:', 'ratency-progression'),
      'after' => '</div>',
      'link_before' => '<span>',
      'link_after' => '</span>',
    )
  );
  ?>

</section>
