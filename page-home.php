<?php
/*
Template Name: Home (Custom)
Description: トップページ用テンプレート
*/

global $post;
// 最新記事一覧を取得
$recent_posts = new WP_Query([
  'posts_per_page' => 5,
  'post_status' => 'publish',
]);

get_header();

?>
<div class="custom-home-wrapper">
    <?php
    if ($recent_posts->have_posts()):
    ?>

    <ul class="recent-posts">
        <?php while ($recent_posts->have_posts()): $recent_posts->the_post(); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
    </ul>
    <?php endif; wp_reset_postdata(); ?>
  <swiper-container style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="mySwiper"
    thumbs-swiper=".mySwiper2" space-between="10" navigation="true">
    <swiper-slide>
      <p>Nature 1</p>
      <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
    </swiper-slide>
    <swiper-slide>
      <p>Nature 2</p>
      <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
    </swiper-slide>
    <swiper-slide>
      <p>Nature 3</p>
      <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
    </swiper-slide>
    <swiper-slide>
      <p>Nature 4</p>
      <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
    </swiper-slide>
    <swiper-slide>
      <p>Nature 5</p>
      <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
    </swiper-slide>
    <swiper-slide>
      <p>Nature 6</p>
      <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
    </swiper-slide>
    <swiper-slide>
      <p>Nature 7</p>
      <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
    </swiper-slide>
    <swiper-slide>
      <p>Nature 8</p>
      <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
    </swiper-slide>
    <swiper-slide>
      <p>Nature 9</p>
      <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
    </swiper-slide>
    <swiper-slide>
      <p>Nature 10</p>
      <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
    </swiper-slide>
  </swiper-container>

  <swiper-container class="mySwiper2" space-between="10" slides-per-view="4" free-mode="true"
    watch-slides-progress="true">
    <swiper-slide>
      <p>Nature 1</p>
      <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
    </swiper-slide>
    <swiper-slide>
      <p>Nature 2</p>
      <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
    </swiper-slide>
    <swiper-slide>
      <p>Nature 3</p>
      <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
    </swiper-slide>
    <swiper-slide>
      <p>Nature 4</p>
      <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
    </swiper-slide>
    <swiper-slide>
      <p>Nature 5</p>
      <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
    </swiper-slide>
    <swiper-slide>
      <p>Nature 6</p>
      <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
    </swiper-slide>
    <swiper-slide>
      <p>Nature 7</p>
      <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
    </swiper-slide>
    <swiper-slide>
      <p>Nature 8</p>
      <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
    </swiper-slide>
    <swiper-slide>
      <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
    </swiper-slide>
    <swiper-slide>
      <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
    </swiper-slide>
  </swiper-container>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

</div>
<?php

get_footer();
