<?php ['url' => $url, 'unregistered_text' => $unregistered_text, 'streaming_text' => $streaming_text] = $args; ?>
<div>
  <a href="https://www.netflix.com/signup">
    <p class="u-m-0">
      <?php echo $unregistered_text; ?>
    </p>
    <img
      src="<?php echo get_template_directory_uri() . '/images/vod/netflix.webp' ?>"
      alt="Netflix">
  </a>
</div>
<a
  style="display: block;"
  href="<?php echo esc_url($url) ?>"
  target="_blank"
  rel="noopener noreferrer">
  <?php echo $streaming_text; ?>
</a>