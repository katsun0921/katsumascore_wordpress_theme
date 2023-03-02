<?php
// レビューを投稿したVODを紹介するページ
['post_id' => $post_id] = $args;
$is_cinema_watched = get_field('cinema_info_filed_is_cinema_watched');
$cinema_list_filed = get_field('cinema_info_filed_cinema_list_filed');
$is_cinema_showing = get_field('cinema_info_filed_is_cinema_showing');
$is_vod_streaming = get_field('streaming_vod_watched_vod_is_writing_video_article');
$vod_streaming_term_id = get_field('streaming_vod_watched_vod_watched_vod_name');
$title_jp = get_post_meta($post_id, 'title_jp', true);
$official_url = get_field('official_url');
$release_date = get_field('release_date');
$vod_service_name = get_term($vod_streaming_term_id)->name;
$vod_service_url = get_field('streaming_vod_watched_vod_watched_vod_url');
$vod_url = get_term_link(get_term($vod_streaming_term_id)->term_id);
$is_affiliate_code = get_field('streaming_vod_watched_vod_is_affiliate_code');
$affiliate_code = get_field('streaming_vod_watched_vod_affiliate_code');
?>
<section class="progression-blog-single-vod-container">
  <?php
  // まだVODが配信していなく、劇場公開を視聴している
  if (!$is_vod_streaming && $is_cinema_watched) :
  ?>
  <h2 class="progression-blog-single-vod-heading">
    このページでは
    <?php echo $release_date ?>に公開された
    <?php echo $title_jp; ?>を執筆しました。
  </h2>
  <?php if ($is_cinema_showing) : ?>
  <p class="progression-blog-single-vod-text">
    公開中の『
    <?php echo $title_jp; ?>』のあらすじ、感想、評価を紹介しました。気になる方は、ぜひ劇場情報URLからチェックしてみてください！
  </p>
  <a href="<?php echo esc_url($cinema_list_filed); ?>" target="_blank"
    rel="noopener"><?php echo $title_jp . 'の劇場情報'; ?></a>
  <?php else : ?>
  <p><?php the_modified_date('Y年m月d日') ?>時点では劇場公開が終了しております。</p>
  <?php endif; ?>
  <p class="progression-blog-single-vod-caution">
    <strong>本ページの情報は<time datetime="<?php the_time(get_the_date('Y-m-d')); ?>"></time>
      <?php echo get_the_date('Y年n月j日'); ?>時点のものです。</strong><br>最新の状況は
    <a href="<?php echo esc_url($official_url); ?>" rel="noopener" target="_blank">
      <?php echo $title_jp; ?>サイトにてご確認ください。
    </a>
  </p>
  <?php endif; ?>

  <?php
  // VODが配信中のものかり執筆し、劇場公開で視聴していない
  if ($is_vod_streaming && !$is_cinema_watched) :
  ?>
  <h2 class="progression-blog-single-vod-heading">
    このページでは
    <?php echo $vod_service_name; ?>で配信中の
    <?php echo $title_jp; ?>から執筆しました
  </h2>
  <p class="progression-blog-single-vod-text">
    <?php echo $vod_service_name ?>で配信されている『
    <?php echo $title_jp; ?>』のあらすじ、感想、評価を紹介しました。気になる方は、ぜひ下記URLの
    <?php echo $vod_service_name ?>からチェックしてみてください！
  </p>
  <?php if ($is_affiliate_code) : ?>
  <?php echo $affiliate_code ?>
  <?php else : ?>
  <a href="<?php echo esc_url($vod_service_url); ?>" target="_blank"
    rel="noopener"><?php echo $vod_service_name . ' ' . $title_jp; ?></a>
  <?php endif; ?>
  <p><a href="<?php echo esc_url($vod_url); ?>">他にも<?php echo $vod_service_name ?>の作品のレビューを書いています。</a></p>
  <p class="progression-blog-single-vod-caution">
    <strong>本ページの情報は<time datetime="<?php the_time(get_the_date('Y-m-d')); ?>"></time>
      <?php echo get_the_date('Y年n月j日'); ?>時点のものです。<br>最新の配信状況は
      <?php echo $vod_service_name; ?>サイトにてご確認ください。
    </strong>
  </p>
  <?php endif; ?>
  <div class="clearfix-pro"></div>
</section><!-- close .progression-blog-single-content -->