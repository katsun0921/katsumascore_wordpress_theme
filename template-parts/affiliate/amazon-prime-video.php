<?php ['url' => $url, 'unregistered_text' => $unregistered_text, 'streaming_text' => $streaming_text] = $args; ?>
<p style="margin-bottom: 0px;">
  <?php echo $unregistered_text; ?>
</p>
<iframe
  src="https://rcm-fe.amazon-adsystem.com/e/cm?o=9&p=294&l=ur1&category=primevideochannel&banner=0NSPGYVA9YXSZRGEDP02&f=ifr&linkID=9881024e025ba0cf5882037577fb6787&t=katsumascore-22&tracking_id=katsumascore-22"
  width="320" height="100" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"
  sandbox="allow-scripts allow-same-origin allow-popups allow-top-navigation-by-user-activation"
  title="Amazon Prime Video"></iframe>
<a style="display: block;" href="<?php echo esc_url($url) ?>" target="_blank" rel="noopener noreferrer">
  <?php echo $streaming_text; ?>
</a>