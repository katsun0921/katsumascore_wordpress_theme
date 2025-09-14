<?php

/**
 * @description スワイパーを使用して最新記事を表示する。styleとjsはこのページに直接書き完結させる
 * @see: https://swiperjs.com/demos
 */
// 最新記事一覧を取得
$recent_count = 6;
$recent_posts = new WP_Query([
  'posts_per_page' => $recent_count,
  'post_status' => 'publish',
])
?>

<?php
if ($recent_posts->have_posts()):
?>
  <style>
    .swiper-section {
      width: 100%;
      height: 100%;
      margin: 0 auto;
      background-color: #111827;
    }

    .recent-posts__main {
      padding: 0 50px;
    }

    .swiper-posts__link {
      height: 90vw;
      position: relative;
      display: block;
      color: white;
      text-decoration: none;
    }

    .swiper-posts__link:hover {
      color: white;
      opacity: 0.8;
    }

    .swiper-posts__detail {
      position: relative;
      margin: 0 auto;
      width: 90%;
      z-index: 1;
      top: 50%;
      transform: translateY(-50%);
    }

    .swiper-posts__title {
      margin-right: 65px;
      font-weight: bold;
      font-size: clamp(1.5rem, 2.5vw, 60px);
      line-height: 1.2;
      text-shadow: 0px 0px 15px #000;
    }

    .swiper-posts__excerpt {
      font-size: clamp(1rem, 1.2vw, 24px);
      line-height: 1.4;
      text-shadow: 1px 1px 3px #000;
      display: -webkit-box;
      -webkit-line-clamp: 5;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
      max-height: calc(1.4em * 5);
    }

    .swiper-posts__image {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      margin: auto;
      z-index: 0;
      text-align: center;

      img {
        height: 100%;
      }
    }

    .recent-posts__thumbs {
      display: none;
    }

    .swiper__thumb-image {
      position: relative;
      transition: all 1s ease;
      border: 2px solid transparent;
      opacity: 0.3;
    }

    .swiper__thumb-image.swiper-slide-thumb-active {
      border: 2px solid #fff;
      opacity: 1;
    }

    .swiper__thumb-title {
      position: absolute;
      font-size: clamp(0.5rem, 1.2vw, 1.4rem);
      top: 5px;
      left: 5px;
      color: #fff;
      width: 90%;
      text-shadow: 0px 0px 10px #000;
    }

    @media screen and (768px <=width) {
      .recent-posts__thumbs {
        display: block;
        padding: 10px 50px;
      }

      .swiper-posts__link {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        gap: 30px;
      }

      .swiper-posts__detail {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        width: 70%;
        padding-left: 50px;
        top: 0;
        transform: translateY(0);
      }

      .swiper-posts__image {
        height: 500px;
        position: relative;
      }
    }
  </style>
  <section class="swiper-section">
    <div class="recent-posts__main">
      <swiper-container style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff;" class="swiper-recent-posts"
        thumbs-swiper=".swiper" space-between="10" navigation="true" loop="true">
        <?php while ($recent_posts->have_posts()): $recent_posts->the_post(); ?>
          <?php
          $categories = get_the_category();
          $cat_names_str = '';
          if (!empty($categories)) :
            $cat_names = array_map(function ($cat) {
              return esc_html($cat->name);
            }, $categories);
            $cat_names_str = implode(', ', $cat_names);
          endif;
          ?>
          <swiper-slide>
            <a href="<?php the_permalink(); ?>" class="swiper-posts__link">
              <div class="swiper-posts__detail">
                <div class="u-absolute u-top-1-5 u-right-1-5">
                  <?php get_template_part('template-parts/components/score', null, array('post_id' => get_the_ID())); ?>
                </div>
                <p class="c-category c-category__normal"><?php echo $cat_names_str; ?></p>
                <p class="swiper-posts__title u-mt-3"><?php the_title(); ?></p>
                <div class="u-mt-6 swiper-posts__excerpt">
                  <?php the_excerpt(); ?>
                </div>
              </div>
              <div class="swiper-posts__image">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" />
              </div>
            </a>
          </swiper-slide>
        <?php endwhile; ?>
      </swiper-container>
    </div>
    <div class="recent-posts__thumbs">
      <swiper-container class="swiper" space-between="10" slides-per-view="<?php echo $recent_count; ?>" free-mode="true"
        watch-slides-progress="true">
        <?php while ($recent_posts->have_posts()): $recent_posts->the_post(); ?>
          <swiper-slide class="swiper__thumb-image">
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" />
            <p class="swiper__thumb-title"><?php the_title(); ?></p>
          </swiper-slide>
        <?php endwhile; ?>
      </swiper-container>
    </div>

    <script src="<?php echo get_template_directory_uri(); ?>/js/swiper-element-bundle.min.js"></script>
  </section>
<?php endif;
wp_reset_postdata(); ?>