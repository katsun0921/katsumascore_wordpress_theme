<?php
$sharingTitle = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
?>
<ul class="l-sharing">
  <li class="l-sharing__block l-sharing__twitter">
    <a href="https://twitter.com/share?text=<?php echo $sharingTitle; ?>&url=<?php echo urlencode(the_permalink()); ?>"
      class="c-link__social c-link__twitter" target="_blank">
      <span class="c-link__socialText">Share on Twitter</span>
    </a>
  </li>
  <li class="l-sharing__block l-sharing__twitter">
    <a href="http://www.facebook.com/sharer.php?u=<?php echo $sharingTitle; ?>" class="c-link__social c-link__facebook"
      target="_blank">
      <span class="c-link__socialText">Share on Facebook</span>
    </a>
  </li>
</ul>