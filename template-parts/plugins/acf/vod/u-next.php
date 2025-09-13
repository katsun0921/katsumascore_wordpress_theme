<?php
//MEMO u-nextは途中でアフィリエイトが解除されたためurlがない場合は登録ページへ遷移させる
[
  'url' => $url,
  'unregistered_text' => $unregistered_text,
  'streaming_text' => $streaming_text,
  'is_affiliate_code' => $is_affiliate_code,
  'affiliate_code' => $affiliate_code
] = $args;
?>
<a
  class="u-block"
  href="<?php echo empty($url) ? 'https://video-static.unext.jp/welcome' : esc_url($url) ?>"
  target="_blank"
  rel="noopener noreferrer">
  <p class="u-m-0">
    <?php echo $unregistered_text; ?>
  </p>
  <img
    src="<?php echo get_template_directory_uri() . '/images/vod/u-next.webp' ?>"
    alt="u-next"
    loading="lazy">
</a>