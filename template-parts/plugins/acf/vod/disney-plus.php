<?php ['url' => $url, 'unregistered_text' => $unregistered_text, 'streaming_text' => $streaming_text] = $args; ?>
<div>
  <p class="u-m-0">
    <?php echo $unregistered_text; ?>
  </p>
  <a href="https://www.disneyplus.com/ja-jp/welcome/stream-now">
    <img
      src="<?php echo get_template_directory_uri() . '/images/vod/disney-plus.webp' ?>"
      alt="Disney Plus"
      loading="lazy"></a>
</div>
<a
  class="u-block"
  href="<?php echo esc_url($url) ?>"
  target="_blank"
  rel="noopener noreferrer">
  <?php echo $streaming_text; ?>
</a>