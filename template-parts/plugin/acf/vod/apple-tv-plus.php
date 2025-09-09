<?php ['url' => $url, 'unregistered_text' => $unregistered_text, 'streaming_text' => $streaming_text] = $args; ?>
<a
  class="u-block"
  href="https://tv.apple.com/"
  target="_blank"
  rel="noopener noreferrer"
>
  <img
    src="<?php echo get_template_directory_uri() . '/images/banner/apple-tv-plus.webp' ?>"
    alt="Apple TV Plus"
    loading="lazy"
  >
</a>
<a
  class="u-block"
  href="<?php echo esc_url($url) ?>"
  target="_blank"
  rel="noopener noreferrer"
>
  <?php echo $streaming_text; ?>
</a>