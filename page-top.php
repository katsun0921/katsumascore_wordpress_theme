<?php
/*
Template Name: Home (Custom)
Description: 英語トップページ用テンプレート
*/

global $post;
get_header();

?>
<main class="custom-home-wrapper">
  <?php get_template_part('template-parts/components/swiper'); ?>
  <!-- ランダムタグ3つとそれぞれの投稿 -->
  <?php
  $all_tags = get_tags([
    'hide_empty' => false,
  ]);

  $random_tags = [];
  if (!empty($all_tags)) {
    shuffle($all_tags);
    $random_tags = array_slice($all_tags, 0, 3);
  }

  if ($random_tags) :
    foreach ($random_tags as $tag) :
      // このタグに属する投稿を最大6件取得
      $tag_posts = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => 6,
        'orderby' => 'date',
        'order' => 'DESC',
        'tag_id' => $tag->term_id,
      ]);

      // このタグに属する投稿数を取得（すべて見る判断用）
      $tag_total_posts = wp_count_posts()->publish;
      $tag_post_count = wp_get_post_tags($tag->term_id);

      if ($tag_posts->have_posts()) :
  ?>
        <section class="u-pt-12 u-pb-12 u-bg-gray-100">
          <div class="u-mx-auto u-px-4 l-content">
            <h2 class="c-heading__related u-text-3xl">
              <a href="<?php echo get_tag_link($tag->term_id); ?>">
                <?php echo esc_html($tag->name); ?>
              </a>
            </h2>
            <ul class="l-columns u-grid-cols-3 u-gap-6 u-mt-8">
              <?php while ($tag_posts->have_posts()) : $tag_posts->the_post(); ?>
                <li>
                  <?php
                  $args = ['post_id' => get_the_ID()];
                  get_template_part('template-parts/components/post-image-top', null, $args);
                  ?>
                </li>
              <?php endwhile; ?>
            </ul>

            <?php
            // 投稿が7件以上なら「すべて見る」リンクを表示
            $all_tag_posts_count = $wpdb->get_var($wpdb->prepare(
              "SELECT COUNT(*) FROM $wpdb->term_relationships
             WHERE term_taxonomy_id = %d",
              $tag->term_taxonomy_id
            ));
            if ($all_tag_posts_count > 6) : ?>
              <a href="<?php echo get_tag_link($tag->term_id); ?>" class="c-link__primary u-mt-8">View All</a>
            <?php endif; ?>
          </div>
        </section>
  <?php
        wp_reset_postdata();
      endif;
    endforeach;
  endif;
  ?>
  <section class="u-pt-12 u-pb-12 u-bg-gray-300">
    <div class="u-mx-auto u-px-4 l-content">
      <h2 class="c-heading__related u-text-3xl">MOVIE</h2>
      <ul class="l-columns u-grid-cols-3 u-gap-6 u-mt-8">
        <?php
        // カテゴリー「movie」の新着投稿を6件取得
        $recent_movies = new WP_Query([
          'post_type' => 'post',
          'posts_per_page' => 6,
          'orderby' => 'date',
          'order' => 'DESC',
          'category_name' => 'movie-en',
        ]);
        if ($recent_movies->have_posts()) :
          while ($recent_movies->have_posts()) : $recent_movies->the_post();
        ?>
            <li>
              <?php
              $args = [
                'post_id' => get_the_ID(),
              ];
              get_template_part('template-parts/components/post-image-top', null, $args);
              ?>
            </li>
          <?php
          endwhile;
          wp_reset_postdata();
        else :
          ?>
          <li>There are no posts in the Movies category.</li>
        <?php endif; ?>
      </ul>
      <a href="<?php echo get_category_link(get_category_by_slug('movie-en')->term_id); ?>" class="c-link__primary u-mt-8">View All</a>
    </div>
  </section>
  <section class="u-pt-12 u-pb-12 u-bg-white">
    <div class="u-mx-auto u-px-4 l-content">
      <h2 class="c-heading__related u-text-3xl">ANIME</h2>
      <ul class="l-columns u-grid-cols-3 u-gap-6 u-mt-8">
        <?php
        // カテゴリー「anime」の新着投稿を6件取得
        $recent_anime = new WP_Query([
          'post_type' => 'post',
          'posts_per_page' => 6,
          'orderby' => 'date',
          'order' => 'DESC',
          'category_name' => 'anime-en',
        ]);
        if ($recent_anime->have_posts()) :
          while ($recent_anime->have_posts()) : $recent_anime->the_post();
        ?>
            <li>
              <?php
              $args = [
                'post_id' => get_the_ID(),
              ];
              get_template_part('template-parts/components/post-image-top', null, $args);
              ?>
            </li>
          <?php
          endwhile;
          wp_reset_postdata();
        else :
          ?>
          <li>There are no posts in the Anime category.</li>
        <?php endif; ?>
      </ul>
      <a href="<?php echo get_category_link(get_category_by_slug('anime-en')->term_id); ?>" class="c-link__primary u-mt-8">View All</a>
    </div>
  </section>
</main>
<?php

get_footer();
