<?php ['url' => $url, 'unregistered_text' => $unregistered_text, 'streaming_text' => $streaming_text] = $args; ?>
<div>
  <a
    href="<?php echo pll_current_language() === 'en' ? 'https://www.amazon.com/amazonprime' : 'https://www.amazon.co.jp/amazonprime' ?>">
    <p class="u-m-0">
      <?php echo $unregistered_text; ?>
    </p>
    <img
      src="<?php echo get_template_directory_uri() . '/images/vod/amazon-prime-video.webp' ?>"
      alt="Amazon Prime Video">
  </a>
</div>
<a
  class="u-block"
  href="<?php echo esc_url($url) ?>"
  target="_blank"
  rel="noopener noreferrer">
  <?php echo $streaming_text; ?>
</a>