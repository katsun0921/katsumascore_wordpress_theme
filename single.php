<?php
$post_id = get_the_ID();
$template = 'template-parts';
?>
<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

  <main>
    <?php
    $heading_title = pll_current_language() === 'en' ? get_post_meta($post_id, 'original_title', true) : get_post_meta($post_id, 'title_jp', true);
    get_template_part($template . '/components/title', null, array('post_id' => $post_id, 'headingText' => $heading_title, 'is_post' => 'post' == get_post_type()));
    ?>

    <section
      id="content-pro"
      class="site-content-blog-post u-mt-60px u-mb-50px u-relative">
      <div class="l-container l-container__showLeftSidebar">
        <div
          id="main-container-pro"
          class="l-content">
          <?php get_template_part('template-parts/components/date', 'single'); ?>
          <?php get_template_part('template-parts/post/post-single'); ?>
        </div><!-- close #main-container-pro -->
        <?php get_sidebar(); ?>
      </div><!-- close .l-container -->
      <aside class="u-mt-10 l-container">
        <?php
        // 関連IDにもとづくPostを表示
        get_template_part($template . '/plugin/acf/acf-relation-by-post-id'); ?>
        <?php
        // 劇場版以外VODサービスを表示
        $is_cinema_showing = get_field('cinema_info_filed_is_cinema_showing');
        if (!$is_cinema_showing) {
          get_template_part($template . '/plugin/acf/acf-streaming-vod', null, array('post_id' => $post_id));
        }
        ?>
        <?php
        // 劇場版以外レンタルサービスを表示
        if (!$is_cinema_showing && pll_current_language() !== 'en') {
          get_template_part($template . '/plugin/plugin-ad-rental', null, array('post_id' => $post_id));
        }
        ?>
        <?php
        // カテゴリーにもとづくPostを表示
        get_template_part($template . '/components/category-posts-rand', null, array('post_id' => $post_id));
        ?>
        <?php
        // シリーズにもとづくPostを表示
        get_template_part($template . '/post/post-series-posts', null, array('post_id' => $post_id));
        ?>
        <?php
        // タグにもとづくPostを表示
        get_template_part($template . '/post/post-tag-posts', null, array('post_id' => $post_id));
        ?>
      </aside>
    </section>
    <section class="u-mb-50px">
      <?php get_template_part('template-parts/components/sharing'); ?>
    </section>
  </main>
<?php endwhile; ?>

<?php get_footer(); ?>
