<?php
/*
Template Name: Home (Custom)
Description: 日本語トップページ用テンプレート
*/

global $post;
get_header();

?>
<main class="custom-home-wrapper">
  <?php get_template_part('template-parts/components/swiper'); ?>
  <section class="u-pt-12 u-pb-12 u-bg-gray-300">
    <div class="u-mx-auto u-px-4 l-content">
      <h2 class="c-heading__related u-text-3xl">映画</h2>
      <ul class="l-columns u-grid-cols-3 u-gap-6 u-mt-8">
        <?php
        // カテゴリー「movie」の新着投稿を6件取得
        $recent_movies = new WP_Query([
          'post_type' => 'post',
          'posts_per_page' => 6,
          'orderby' => 'date',
          'order' => 'DESC',
          'category_name' => 'movie-ja',
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
          <li>映画カテゴリーの投稿はありません。</li>
        <?php endif; ?>
      </ul>
      <a href="<?php echo get_category_link(get_category_by_slug('movie-ja')->term_id); ?>" class="c-link__primary u-mt-8">すべて見る</a>
    </div>
  </section>
  <section class="u-pt-12 u-pb-12 u-bg-white">
    <div class="u-mx-auto u-px-4 l-content">
      <h2 class="c-heading__related u-text-3xl">アニメ</h2>
      <ul class="l-columns u-grid-cols-3 u-gap-6 u-mt-8">
        <?php
        // カテゴリー「anime」の新着投稿を6件取得
        $recent_anime = new WP_Query([
          'post_type' => 'post',
          'posts_per_page' => 6,
          'orderby' => 'date',
          'order' => 'DESC',
          'category_name' => 'anime',
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
          <li>アニメカテゴリーの投稿はありません。</li>
        <?php endif; ?>
      </ul>
      <a href="<?php echo get_category_link(get_category_by_slug('anime')->term_id); ?>" class="c-link__primary u-mt-8">すべて見る</a>
    </div>
  </section>
  <section class="u-pt-12 u-pb-12 u-bg-gray-300">
    <div class="u-mx-auto u-px-4 l-content">
      <ul class="l-columns u-grid-cols-3 u-gap-6">
        <li class="u-text-center">
          <a href="https://px.a8.net/svt/ejp?a8mat=3TJ6EJ+BCFDRM+59RE+5ZEMP" rel="nofollow">
            <img border="0" width="300" height="250" alt="" src="https://www29.a8.net/svt/bgt?aid=231002155686&wid=001&eno=01&mid=s00000024593001005000&mc=1"></a>
          <img border="0" width="1" height="1" src="https://www14.a8.net/0.gif?a8mat=3TJ6EJ+BCFDRM+59RE+5ZEMP" alt="">
        </li>
        <li class="u-text-center">
          <a href="https://px.a8.net/svt/ejp?a8mat=3T0HTG+7HPDTE+4EKC+63OY9" rel="nofollow">
            <img border="0" width="300" height="250" alt="" src="https://www27.a8.net/svt/bgt?aid=230130484453&wid=001&eno=01&mid=s00000020550001025000&mc=1"></a>
          <img border="0" width="1" height="1" src="https://www17.a8.net/0.gif?a8mat=3T0HTG+7HPDTE+4EKC+63OY9" alt="">
        </li>
        <li class="u-text-center">
          <!-- admax -->
          <script src="https://adm.shinobi.jp/s/907bbfd51ed847a8ad762bc34b8a57d4"></script>
          <!-- admax -->
        </li>
      </ul>
    </div>
  </section>
  <section class="u-pt-12 u-pb-12 u-bg-white">
    <div class="u-mx-auto u-px-4 l-content">
      <ul class="l-columns u-grid-cols-3 u-gap-6">
        <li class="u-col-span-2">
          <?php
            // 親ページのIDを取得
            $parent_page = get_page_by_path('seasonal-anime-and-dramas-reviews');
          ?>
          <h2 class="c-heading__related u-text-3xl">
            <a href="<?php echo get_permalink($parent_page->ID); ?>">
                <?php ?><?php echo esc_html($parent_page->post_title); ?>
            </a>
          </h2>
          <?php
          // 親ページのIDを取得
          $parent_page = get_page_by_path('seasonal-anime-and-dramas-reviews');
          if ($parent_page) :
            $child_pages = get_pages([
              'child_of' => $parent_page->ID,
              'sort_column' => 'post_date',
              'sort_order' => 'desc',
            ]);
            if ($child_pages) :
          ?>
              <ul class="u-mt-8">
                <?php foreach ($child_pages as $page) : ?>
                  <li>
                    <a href="<?php echo get_permalink($page->ID); ?>"><?php echo esc_html($page->post_title); ?></a>
                  </li>
                <?php endforeach; ?>
              <?php endif; ?>
            <?php endif; ?>
              </ul>
        </li>
        <li>
          <iframe
            src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fp%2FKatsumascore-100072246676709%2F&tabs=timeline&width=340&height=500&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=177731676219853"
            width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true"
            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
        </li>
      </ul>
    </div>
  </section>
</main>
<?php

get_footer();
