<?php
// コンテンツを配信していVODを表示するページ。劇場で上映中でありVODで配信をしていない時は表示をしない。
$titleJp = get_post_meta($post->ID, 'title_jp', true);
$repeater_other_vod = 'streaming_vod_other_vod';
$rows_other_vod = get_field($repeater_other_vod);
$count_other_vod = $rows_other_vod ? count($rows_other_vod) : 0;
?>

<?php if ($count_other_vod > 0): ?>
<section>
  <h2>
    <?php echo $titleJp ?>は他にも動画配信サービスで配信中です。
  </h2>
  <ul style="flex-wrap: wrap;display: flex;list-style: none;">
    <?php
    for ($i = 0; $i < $count_other_vod; $i++) :
      $vod_term_id = get_post_meta($post_id, $repeater_other_vod . '_' . $i . '_' . 'other_vod_name', true);
      $affiliate = null;
      $affiliate_path = 'template-parts/affiliate/';
      $url = $rows_other_vod[$i]['other_vod_url'];
      $slug = get_term($vod_term_id)->slug;;
      switch ($slug) {
        case 'amazon_prime_video':
          $affiliate = $affiliate_path . 'amazon-prime-video';
          break;
        case 'abema_tv':
          $affiliate = $affiliate_path . 'abema-tv';
          break;
        case 'netflix':
          $affiliate = $affiliate_path . 'netflix';
          break;
        case 'u-next':
          $affiliate = $affiliate_path . 'u-next';
          break;
        default:
          $affiliate = null;
      }
      $arg_affiliate = array(
        'unregistered_text' => '未登録の方はこちらから登録できます。',
        'streaming_text' => '配信はこちらのリンクから移動できます。',
        'url' => $url
      )
    ?>
    <?php if (isset($affiliate)) : ?>
    <li style="width: 50%">
      <? get_template_part($affiliate, null, $arg_affiliate) ?>
    </li>
    <?php endif; ?>
    <?php endfor; ?>
  </ul>
</section>
<?php endif; ?>
