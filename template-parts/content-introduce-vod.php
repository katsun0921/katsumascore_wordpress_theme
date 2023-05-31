<?php
// レビューを投稿したVODを紹介するページ
['post_id' => $post_id] = $args;
$is_cinema_watched = get_field('cinema_info_filed_is_cinema_watched');
$cinema_list_filed = get_field('cinema_info_filed_cinema_list_filed');
$is_cinema_showing = get_field('cinema_info_filed_is_cinema_showing');
$is_vod_streaming = get_field('streaming_vod_watched_vod_is_writing_video_article');
$vod_streaming_term_id = get_field('streaming_vod_watched_vod_watched_vod_name');
$title_jp = get_post_meta($post_id, 'title_jp', true);
$original_title = get_post_meta($post_id, 'original_title', true);
$official_url = get_field('official_url');
$date_string = get_field('release_date');
$release_date = DateTime::createFromFormat('Ymd', $date_string);
$vod_service_name = get_term($vod_streaming_term_id)->name;
$vod_service_url = get_field('streaming_vod_watched_vod_watched_vod_url');
$vod_url = get_term_link(get_term($vod_streaming_term_id)->term_id);
$is_affiliate_code = get_field('streaming_vod_watched_vod_is_affiliate_code');
$affiliate_code = get_field('streaming_vod_watched_vod_affiliate_code');
?>
<?php
// まだVODが配信していなく、劇場公開を視聴している
if (!$is_vod_streaming && $is_cinema_watched) :
?>
<section>
  <h2 class="u-mb-4">
    <?php if (pll_current_language() === 'en') : ?>
    Published on this page on
    <time datetime="<?php echo $release_date->format('j M, Y'); ?>">
      <?php echo $release_date->format('j M, Y'); ?>
    </time>
    Written <?php echo $original_title ?>.
    <?php else : ?>
    このページでは
    <time datetime="<?php echo $release_date->format('Y-m-d'); ?>">
      <?php echo $release_date->format('Y年m月d日'); ?>
    </time>
    に公開された
    <?php echo $title_jp; ?>を執筆しました。
    <?php endif; ?>
  </h2>
  <?php if ($is_cinema_showing) : ?>
  <p class="u-mb-2">
    <?php echo pll_current_language() === 'en' ?
          'Here are the synopsis, impressions, and ratings for' . $original_title . 'that are in theaters. If you are interested in the film, please check out the theater information URL!' :
          '公開中の' . $title_jp . 'のあらすじ、感想、評価を紹介しました。気になる方は、ぜひ劇場情報URLからチェックしてみてください！'; ?>
  </p>
  <a href="<?php echo esc_url($cinema_list_filed); ?>" target="_blank" rel="noopener">
    <?php echo pll_current_language() === 'en' ? 'Theater information for ' . $original_title : $title_jp . 'の劇場情報'; ?>
  </a>
  <?php else : ?>
  <p>
    <?php if (pll_current_language() === 'en') : ?>
    As of<time datetime="<?php echo the_modified_date('Y-m-d'); ?>">
      <?php the_modified_date('j M, Y') ?>
    </time>,
    this film is no longer in theaters.
    <?php else : ?>
    <time datetime="<?php echo the_modified_date('Y-m-d'); ?>">
      <?php the_modified_date('Y年m月d日') ?>
    </time>
    時点では劇場公開が終了しております。
    <?php endif; ?>
  </p>
  <?php endif; ?>
  <div>
    <?php if (pll_current_language() === 'en') : ?>
    <strong>The information on this page is current as of
      <time datetime="<?php the_time(get_the_date('Y-m-d')); ?>">
        <?php echo get_the_date('j M, Y'); ?>
      </time>.</strong><br>
    Please check
    <a href="<?php echo esc_url($official_url); ?>" rel="noopener" target="_blank">
      <?php echo $original_title; ?>site for the latest information.
    </a>
    <?php else : ?>
    <strong>本ページの情報は
      <time datetime="<?php the_time(get_the_date('Y-m-d')); ?>">
        <?php echo get_the_date('Y年n月j日'); ?>
      </time>時点のものです。</strong><br>最新の状況は
    <a href="<?php echo esc_url($official_url); ?>" rel="noopener" target="_blank">
      <?php echo $title_jp; ?>サイトにてご確認ください。
    </a>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>

<?php
// VODが配信中のものかり執筆し、劇場公開で視聴していない
if ($is_vod_streaming && !$is_cinema_watched) :
$title = pll_current_language() === 'en' ? $original_title : $title_jp;
?>
<section>
  <h2 class="u-mb-4">
    <?php echo pll_current_language() === 'en' ?
        'This page is written from the "' . $title . '" which is available on ' . $vod_service_name . '.' :
        'このページでは' . $vod_service_name . 'で配信中の' . $title . 'から執筆しました。';
      ?>
  </h2>
  <p>
    <?php echo pll_current_language() === 'en' ?
        'This page introduces the synopsis, impressions, and ratings of "' . $title . '" available on ' . $vod_service_name . '.
    If you are interested in this movie, please check it out at ' . $vod_service_name . '!' :
        $vod_service_name . 'で配信されている「' . $title . '」のあらすじ、感想、評価を紹介しました。気になる方は、ぜひ下記URLの' . $vod_service_name . 'からチェックしてみてください！';
      ?>
  </p>
  <?php if ($is_affiliate_code) : ?>
  <?php echo $affiliate_code ?>
  <?php else : ?>
  <a href="<?php echo esc_url($vod_service_url); ?>" target="_blank"
    rel="noopener"><?php echo $vod_service_name . ' ' . $title; ?></a>
  <?php endif; ?>
  <?php
    // VODにもとづくPostを取得
    $args = array(
      'post_type' => 'post',
      'tax_query' => array(
        array(
          'taxonomy' => 'vod',
          'field' => 'term_id',
          'terms' => $vod_streaming_term_id,
        ),
      ),
      'orderby' => 'rand',
      'posts_per_page' => 3,
      'post__not_in' => array($post->ID),
    );

    $taxonomy_posts = get_posts($args);
    ?>
  <?php if (count($taxonomy_posts) > 0) : ?>
  <div class="u-mt-6">
    <h3 class="u-mb-3">
      <?php echo pll_current_language() === 'en' ?
          'I have also written reviews of other ' . $vod_service_name . ' productions.' :
          '他にも' . $vod_service_name . 'の作品レビューを書いています。';
        ?>
    </h3>
    <ul class="l-postRelated">
      <?php foreach ($taxonomy_posts as $post) : ?>
      <li>
        <?php get_template_part('template-parts/components/postImageOverlay'); ?>
      </li>
      <?php endforeach ?>
    </ul>
  </div>
  <?php endif; ?>
  <p class="u-mt-6">
    <strong>
      <?php if (pll_current_language() === 'en') : ?>
      The information on this page is current as of
      <time datetime="<?php the_time(get_the_date('Y-m-d')); ?>">
        <?php echo get_the_date('j M, Y'); ?>
      </time>.<br>
      Please check the Amazon Prime Video en site for the latest distribution status.
      <?php else: ?>
      このページは <time datetime="<?php the_time(get_the_date('Y-m-d')); ?>">
        <?php echo get_the_date('Y年n月j日'); ?>
      </time>
      時点のものです。<br>最新の配信状況は
      <?php echo $vod_service_name; ?>サイトにてご確認ください。
      <?php endif; ?>
    </strong>
  </p>
</section>

<?php endif; ?>