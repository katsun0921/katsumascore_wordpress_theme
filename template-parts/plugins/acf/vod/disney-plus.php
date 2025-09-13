<?php ['url' => $url, 'unregistered_text' => $unregistered_text, 'streaming_text' => $streaming_text] = $args; ?>
<div>
  <p class="u-m-0">
    <?php echo $unregistered_text; ?>
  </p>
  <a href="<?php echo add_utm_parameters([
              'url' => 'https://www.disneyplus.com/ja-jp/welcome/stream-now',
              'source' => 'katsumascore',
              'medium' => 'affiliate',
              'campaign' => 'disney_plus_signup'
            ]); ?>">
    <img
      src="<?php echo get_template_directory_uri() . '/images/vod/disney-plus.webp' ?>"
      alt="Disney Plus"
      loading="lazy"></a>
</div>
<a
  class="u-block"
  href="<?php echo esc_url(add_utm_parameters([
          'url' => $url,
          'source' => 'katsumascore',
          'medium' => 'content',
          'campaign' => 'disney_plus_watch'
        ])); ?>"
  target="_blank"
  rel="noopener noreferrer">
  <?php echo $streaming_text; ?>
</a>