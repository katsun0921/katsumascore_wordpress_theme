<?php ['url' => $url, 'unregistered_text' => $unregistered_text, 'streaming_text' => $streaming_text] = $args; ?>
<div>
  <a href="<?php echo add_utm_parameters([
              'url' => 'https://www.netflix.com/signup',
              'source' => 'katsumascore',
              'medium' => 'affiliate',
              'campaign' => 'netflix_signup'
            ]); ?>">
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
  href="<?php echo esc_url(add_utm_parameters([
          'url' => $url,
          'source' => 'katsumascore',
          'medium' => 'content',
          'campaign' => 'netflix_watch'
        ])); ?>"
  target="_blank"
  rel="noopener noreferrer">
  <div>
    <?php echo $streaming_text; ?>
  </div>
</a>
