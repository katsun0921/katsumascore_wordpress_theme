<?php

/**
 * @package pro
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="progression-single-container">
    <?php get_template_part('template-parts/review'); ?>
    <div class="clearfix-pro"></div>

    <?php if (!get_post_meta($post->ID, 'progression_studios_disable_advertisement_post', true)) : ?>
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
          <cite><a href="<?php echo $summaryGroup['acf_ref_url'] ?>" target="_blank"><?php echo $summaryGroup['acf_summary_ref'] ?></a></cite>
        </blockquote>
      <?php endif; ?>

      <?php the_content(); ?>

      <?php
      // TODO: get_field_objectはACFの関数。wordpress関数を使いたい。
      $amazon = 'amazon';
      $filmakrs = 'filmakrs';
      $imdb = 'imdb';
      $rottenTomatoes = 'rotten_tomatoes';
      $eigaCom = 'eiga_com';
      $moviesYahoo = 'movies_yahoo';
      $anikore = 'anikore';

      $siteNames = array(
        $amazon,
        $filmakrs,
        $imdb,
        $rottenTomatoes,
        $eigaCom,
        $moviesYahoo,
        $anikore,
      );

      function getIndx($siteName)
      {
        return array_search('score', array_column(get_field_object($siteName)['sub_fields'], 'label'));
      }

      function getMax($siteName)
      {
        $indexKey = getIndx($siteName);
        return array("max" => get_field_object($siteName)['sub_fields'][$indexKey]["max"]);
      }

      $reviewSites = [];
      foreach ((array) $siteNames as $site) {
        if (get_field_object($site)) {
          $addValue = array_merge(get_field_object($site)['value'], getMax($site));
          $label = get_field_object($site)['label'];
          array_push($reviewSites, array($label => $addValue));
        }
      }
      ?>
      <?php if ($reviewSites > 0) : ?>
        <div class="progression-blog-single-review-site-container">
          <h2 class="progression-blog-single-review-site-heading">各サイトのレビューサイトのスコア</h2>
          <ul>
            <?php foreach ((array) $reviewSites as $key => $value) :
              $data = $value[key($value)];
              $siteUrl = strlen($data['site_url']) > 0 ? 'href="' . $data['site_url'] . '" target="_blank" rel="noopener"' : '';
              $score = strlen($data['score']) > 0 ? $data['score'] : '';
              $max = strlen($data['max']) > 0 ? $data['max'] : '';
            ?>
              <?php if ($score) : ?>
                <li>
                  <a <?php echo $siteUrl ?>>
                    <?php echo key($value) . ": " . $score . "/" . $max ?>
                  </a>
                </li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
          <p class="progression-blog-single-review-site-caution">
            <strong>本ページの情報は<time datetime="<?php the_time(get_the_date('Y-m-d')); ?>"></time>
              <?php echo get_the_date('Y年n月j日'); ?>時点のものです。<br>各サイトの最新スコアは各々のサイトにてご確認ください。
            </strong>
          </p>
        </div>
      <?php endif; ?>
      <div class="progression-blog-single-vod-container">
        <h2 class="progression-blog-single-vod-heading">
          <?php
          $titleJp = get_post_meta($post->ID, 'title_jp', true);
          $vodServiceName = get_the_terms($post->ID, 'vod')[0]->name;
          $vodServiceSlug = get_the_terms($post->ID, 'vod')[0]->slug;
          $vodServiceUrl = get_post_meta($post->ID, 'vod_group_service_item_url', true);
          $vodUrl = get_term_link(get_the_terms($post->ID, 'vod')[0]->term_id)
          ?>
          このページでは
          <?php echo $vodServiceName; ?>で配信中の
          <?php echo $titleJp; ?>から執筆しました
        </h2>
        <p class="progression-blog-single-vod-text">
          <?php echo $vodServiceName ?>で配信されている『
          <?php echo $titleJp; ?>』のあらすじ、感想、評価を紹介しました。気になる方は、ぜひ下記URLの
          <?php echo $vodServiceName ?>からチェックしてみてください！
        </p>
        <a href="<?php echo esc_url($vodServiceUrl); ?>" target="_blank" rel="noopener"><?php echo $vodServiceName . ' ' . $titleJp; ?></a>
        <p class="progression-blog-single-vod-caution">
          <strong>本ページの情報は<time datetime="<?php the_time(get_the_date('Y-m-d')); ?>"></time>
            <?php echo get_the_date('Y年n月j日'); ?>時点のものです。<br>最新の配信状況は
            <?php echo $vodServiceName; ?>サイトにてご確認ください。
          </strong>
        </p>
        <p><a href="<?php echo esc_url($vodUrl); ?>">他にも<?php echo $vodServiceName ?>の作品はこちらからご覧いただけます。</a></p>
      </div>
      <div class="clearfix-pro"></div>
    </div><!-- close .progression-blog-single-content -->

    <?php
    $relation_filed = get_field('relation_filed');
    if ($relation_filed) :
    ?>
      <div class="progression-blog-single-relation">
        <h2 class="progression-blog-single-relation-heading">関連ページ</h2>
        <ul class="progression-blog-single-relation-lists">
          <?php foreach ((array) $relation_filed as $relation_post) :
            $relation_post_id = (int) $relation_post['release_post_id'];
            $relation_categories = get_the_category($relation_post_id);
            $image_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($relation_post_id), 'progression-studios-blog-background');
            $image_url = get_post_meta($relation_post_id, 'progression_studios_gallery-image-url', true);
            $image = $image_url ? $image_url : $image_thumbnail[0];
          ?>
            <li class="progression-blog-single-relation-list" style="<?php echo "background-image: url(" . esc_url($image) . ")"; ?>">
              <a href="<?php echo get_permalink($relation_post_id); ?>">
                <?php if (get_the_category($relation_post_id)) : ?>
                  <ul class="progression-blog-single-relation-category-lists">
                    <?php foreach ((array) $relation_categories as $relation_category) : ?>
                      <li class="progression-blog-single-relation-category-list">
                        <?php echo $relation_category->name; ?>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                <?php endif; ?>
                <div class="progression-blog-single-relation-content">
                  <div class="progression-blog-single-relation-score">
                    <div class="progression-blog-single-relation-score-value">
                      <?php echo get_post_meta($relation_post_id, 'review_score', true); ?>
                    </div>
                  </div>
                  <div class="progression-blog-single-relation-title">
                    <?php echo get_the_title($relation_post_id); ?>
                  </div>
                  <div class="progression-blog-single-relation-date">
                    <?php echo get_the_date('Y/m/d', $relation_post_id); ?>
                  </div>
                </div>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div><!-- /.progression-blog-single-relation -->
    <?php endif; ?>

    <?
    // 劇場版以外レンタルサービスを表示
    if ($vodServiceSlug !== 'theater') {
      get_template_part('template-parts/content-ad-rental');
    }
    ?>

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
