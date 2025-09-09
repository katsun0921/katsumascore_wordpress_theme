<?php
['post_id' => $post_id] = $args;
// コンテンツを配信していVODを表示するページ。劇場で上映中でありVODで配信をしていない時は表示をしない。
$title_jp = get_post_meta($post_id, 'title_jp', true);
$original_title = get_post_meta($post_id, 'original_title', true);
$repeater_other_vod = 'streaming_vod_other_vod';
$rows_other_vod = get_field($repeater_other_vod, $post_id);
$count_other_vod = $rows_other_vod ? count($rows_other_vod) : 0;
?>

<?php if ($count_other_vod > 0) : ?>
<section>
  <h2>
    <?php echo pll_current_language() === 'en' ? 'You can access ' . $original_title . ' through various other video distribution services as well.' : $title_jp . 'は、他にも様々な動画配信サービスで配信中です。' ?>
  </h2>
  <ul style="flex-wrap: wrap;display: flex;list-style: none;">
    <?php
      for ($i = 0; $i < $count_other_vod; $i++) :
        $vod_term_id = $rows_other_vod[$i]['other_vod_name'];
        $is_affiliate_code = $rows_other_vod[$i]['is_affiliate_code'];
        $affiliate_code = $rows_other_vod[$i]['affiliate_code'];
        $is_paid = $rows_other_vod[$i]['is_paid'];
        $affiliate = null;
        $affiliate_path = '/template-parts/plugin/acf/vod/';
        $url = $rows_other_vod[$i]['other_vod_url'];
        $slug = get_term($vod_term_id)->slug;
        $amazon_prime_video = pll_current_language() === 'en' ? 'amazon-prime-video-com' : 'amazon-prime-video-jp';
        $netflix = pll_current_language() === 'en' ? 'netflix-com' : 'netflix-jp';
        $unext = pll_current_language() === 'en' ? 'u-next-en' : 'u-next-ja';
        $disney_plus = pll_current_language() === 'en' ? 'disneyplus-com' : 'disneyplus-jp';
        $dmmtv = pll_current_language() === 'en' ? 'dmmtv-en' : 'dmmtv-jp';
        $youtube = pll_current_language() === 'en' ? 'youtube-com' : 'youtube-cojp';
        $appleTvPlus = pll_current_language() === 'en' ? 'apple-tv-com' : 'apple-tv-cojp';
        switch ($slug) {
          case $amazon_prime_video:
            $affiliate = $affiliate_path . 'amazon-prime-video';
            break;
          case 'abema_tv':
            $affiliate = $affiliate_path . 'abema-tv';
            break;
          case $netflix:
            $affiliate = $affiliate_path . 'netflix';
            break;
          case $unext:
            $affiliate = $affiliate_path . 'u-next';
            break;
          case $disney_plus:
            $affiliate = $affiliate_path . 'disney-plus';
            break;
          case $dmmtv:
            $affiliate = $affiliate_path . 'dmmtv';
            break;
          case $youtube:
            $affiliate = $affiliate_path . 'youtube';
            break;
          case $appleTvPlus:
            $affiliate = $affiliate_path . 'apple-tv-plus';
            break;
        }
        $arg_affiliate = array(
          'unregistered_text' => pll_current_language() === 'en' ? 'If you have not yet registered, you can do so here.' : '未登録の方はこちらから登録できます。',
          'streaming_text' => pll_current_language() === 'en' ? 'You can access the distribution by following this link.' : '配信はこちらのリンクから移動できます。',
          'url' => $url,
          'is_affiliate_code' => $is_affiliate_code,
          'affiliate_code' => $affiliate_code,
        )
      ?>
    <?php if (!is_null($affiliate)) : ?>
    <li style="width: 50%">
      <?php if ($is_paid) : ?>
      <em><?php echo pll_current_language() === 'en' ? 'This distribution is paid.' : 'この配信は有料になります。'; ?></em>
      <?php endif; ?>
      <? get_template_part($affiliate, null, $arg_affiliate) ?>
    </li>
    <?php endif; ?>
    <?php endfor; ?>
  </ul>
</section>
<?php endif; ?>
