<?php ['url' => $url, 'unregistered_text' => $unregistered_text, 'streaming_text' => $streaming_text] = $args; ?>
<div>
  <a
    href="<?php echo add_utm_parameters([
            'url' => pll_current_language() === 'en' ? 'https://www.amazon.com/amazonprime' : 'https://www.amazon.co.jp/amazonprime',
            'source' => 'katsumascore',
            'medium' => 'affiliate',
            'campaign' => 'amazon_prime_signup'
          ]); ?>">
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
  href="<?php echo esc_url(add_utm_parameters([
          'url' => $url,
          'source' => 'katsumascore',
          'medium' => 'content',
          'campaign' => 'amazon_prime_watch'
        ])); ?>"
  target="_blank"
  rel="noopener noreferrer">
  <div>
    <?php echo $streaming_text; ?>
  </div>
</a>
