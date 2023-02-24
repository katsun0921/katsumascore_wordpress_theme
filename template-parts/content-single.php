<?php
$post_id = $post->ID;
?>

<div id="single-post-<?php echo $post_id; ?>" <?php post_class(); ?>>
  <div class="progression-single-container">
    <?php get_template_part('template-parts/review'); ?>
    <div class="clearfix-pro"></div>

    <?php if (!get_post_meta($post_id, 'progression_studios_disable_advertisement_post', true)) : ?>
    <?php if (is_active_sidebar('progression-studios-post-widgets-top')) { ?>
    <div class="widget-area-top-of-posts">
      <?php dynamic_sidebar('progression-studios-post-widgets-top'); ?>
    </div>
    <?php } ?>
    <?php endif; ?>

    <div class="progression-blog-single-content">
      <?php
      $good_points_filed = get_field('good_point_filed');
      if ($good_points_filed) :
      ?>
      <div class="progression-blog-single-good-point-container">
        <h2 class="progression-blog-single-good-point">ここがおすすめ！</h2>
        <ul class="progression-blog-single-good-point-lists">
          <?php
            foreach ((array) $good_points_filed as $good_point) :
              $good_point_text = (string) $good_point['good_point_text'];
              if ($good_point_text) :
            ?>
          <li class="progression-blog-single-good-point-list">
            <?php echo $good_point_text ?>
          </li>
          <?php
              endif;
            endforeach;
            ?>
        </ul>
      </div>
      <?php endif; ?>

      <?php
      // あらすじを表示
      $summaryGroup = get_field('acf_summary_group');
      if (isset($summaryGroup['acf_summary_text'])) :
      ?>
      <p>あらすじ</p>
      <blockquote>
        <p>
          <?php echo $summaryGroup['acf_summary_text'] ?>
        </p>
        <cite><a href="<?php echo $summaryGroup['acf_ref_url'] ?>"
            target="_blank"><?php echo $summaryGroup['acf_summary_ref'] ?></a></cite>
      </blockquote>
      <?php endif; ?>

      <?php the_content(); ?>

      <?php get_template_part('template-parts/content-review-site-scores'); ?>
      <?php get_template_part('template-parts/content-introduce-vod'); ?>
      <?php get_template_part('template-parts/content-relation-by-post-id'); ?>

      <?
      // 劇場版以外VODサービスを表示
      $is_cinema_showing = get_field('cinema_info_filed_is_cinema_showing');
      if (!$is_cinema_showing) {
        get_template_part('template-parts/content-streaming-vod', null, array('post_id' => $post));
      }
      ?>
      <?
      // 劇場版以外レンタルサービスを表示
      if (!$is_cinema_showing) {
        get_template_part('template-parts/content-ad-rental', null, array('post_id' => $post));
      }
      ?>
    </div>

    <?php wp_link_pages(
      array(
        'before' => '<div class="progression-page-nav">' . esc_html__('Pages:', 'ratency-progression'),
        'after' => '</div>',
        'link_before' => '<span>',
        'link_after' => '</span>',
      )
    );
    ?>
    <div class="clearfix-pro"></div>

    <?php if (get_the_author_meta('description')) : ?>
    <?php get_template_part('template-parts/author', 'info'); ?>
    <?php endif; ?>


    <?php if (!get_post_meta($post->ID, 'progression_studios_disable_advertisement_post', true)) : ?>
    <?php if (is_active_sidebar('progression-studios-post-widgets-bottom')) { ?>
    <div class="widget-area-bottom-of-posts">
      <?php dynamic_sidebar('progression-studios-post-widgets-bottom'); ?>
    </div>
    <?php } ?>
    <?php endif; ?>


    <div class="clearfix-pro"></div>
    <?php the_tags('<div class="tags-progression"><span><i class="fa fa-tags"></i></span>', '', '</div><div class="clearfix-pro"></div>'); ?>


    <?php if (get_theme_mod('progression_studios_blog_post_related') == 'true') : ?>
    <?php get_template_part('template-parts/related', 'posts'); ?>
    <?php endif; ?>


    <?php if (comments_open() || get_comments_number()) :
      comments_template();
    endif; ?>
    <div class="clearfix-pro"></div>

  </div><!-- close .progression-single-container -->
</div><!-- #post-## -->