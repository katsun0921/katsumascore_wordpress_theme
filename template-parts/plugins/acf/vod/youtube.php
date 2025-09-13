<?php ['url' => $url, 'unregistered_text' => $unregistered_text, 'streaming_text' => $streaming_text] = $args; ?>
<a
  class="u-block"
  href="<?php echo esc_url(add_utm_parameters([
          'url' => $url,
          'source' => 'katsumascore',
          'medium' => 'content',
          'campaign' => 'youtube_watch'
        ])); ?>"
  target="_blank"
  rel="noopener noreferrer">
  <img
    src="<?php echo get_template_directory_uri() . '/images/vod/youtube.webp' ?>"
    alt="youtube"
    loading="lazy">
  <?php echo $streaming_text; ?>
</a>