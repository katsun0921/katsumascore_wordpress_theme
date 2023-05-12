<?php ['url' => $url, 'unregistered_text' => $unregistered_text, 'streaming_text' => $streaming_text] = $args; ?>
<p style="margin-bottom: 0px;">
  <?php echo $unregistered_text; ?>
</p>
<div>
  <a href="https://www.disneyplus.com/ja-jp/welcome/stream-now">
    <img src="<?php echo get_template_directory_uri() . '/images/banner/disney_plus.jpg' ?>" alt="Disney Plus"
      loading="lazy"></a>
</div>
<a style="display: block;" href="<?php echo esc_url($url) ?>" target="_blank" rel="noopener noreferrer">
  <?php echo $streaming_text; ?>
</a>