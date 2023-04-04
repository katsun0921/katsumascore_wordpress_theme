<?php
$post_id = $post->ID;
$template = 'template-parts';
?>

<div id="single-post-<?php echo $post_id; ?>" <?php post_class(); ?>>
  <div class="progression-single-container">
    <?php get_template_part($template . '/content-review'); ?>

    <?php if (!get_post_meta($post_id, 'progression_studios_disable_advertisement_post', true)) : ?>
    <?php if (is_active_sidebar('progression-studios-post-widgets-top')) : ?>
    <div class="widget-area-top-of-posts">
      <?php dynamic_sidebar('progression-studios-post-widgets-top'); ?>
    </div>
    <?php endif; ?>
    <?php endif; ?>

    <?php get_template_part($template . '/content-good-point') ?>
    <?php get_template_part($template . '/content-summary') ?>

    <?php the_content(); ?>

    <?php get_template_part($template . '/content-review-site-scores'); ?>
    <?php get_template_part($template . '/content-introduce-vod', null, array('post_id' => $post_id)); ?>
    <?php
      // 関連IDにもとづくPostを表示
      get_template_part($template . '/content-relation-by-post-id'); ?>

    <?
      // 劇場版以外VODサービスを表示
      $is_cinema_showing = get_field('cinema_info_filed_is_cinema_showing');
      if (!$is_cinema_showing) {
        get_template_part($template . '/content-streaming-vod', null, array('post_id' => $post_id));
      }
      ?>
    <?
      // 劇場版以外レンタルサービスを表示
      if (!$is_cinema_showing) {
        get_template_part($template . '/content-ad-rental', null, array('post_id' => $post_id));
      }
      ?>

    <?php wp_link_pages(
      array(
        'before' => '<div class="c-pagination">' . esc_html__('Pages:', 'ratency-progression'),
        'after' => '</div>',
        'link_before' => '<span>',
        'link_after' => '</span>',
      )
    );
    ?>


    <?php if (!get_post_meta($post->ID, 'progression_studios_disable_advertisement_post', true)) : ?>
    <?php if (is_active_sidebar('progression-studios-post-widgets-bottom')) { ?>
    <div class="u-mt-3 u-mb-12">
      <?php dynamic_sidebar('progression-studios-post-widgets-bottom'); ?>
    </div>
    <?php } ?>
    <?php endif; ?>

    <?php the_tags('<div class="c-tags">', '', '</div>'); ?>

    <?php get_template_part($template . '/related-posts-rand'); ?>
  </div>
</div>