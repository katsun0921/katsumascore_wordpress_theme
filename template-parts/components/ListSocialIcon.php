<?php
/**
 * The Component for List Social Icon
 */
$taxonomies = get_taxonomies();
$rssLink = get_theme_mod('progression_studios_general_rss');
$twitterLink = get_theme_mod('progression_studios_general_twitter');
$facebookLink = get_theme_mod('progression_studios_general_facebook');
?>
<ul class="c-list__socialLink">
  <?php if ($twitterLink) : ?>
  <li>
    <a href="<?php echo esc_url($twitterLink) ?>" target="_blank" class="c-icon__circle">
      <img src="https://katsumascore.blog/images/logo-twitter-blue-circle.png" alt="twitter" width="50" height="50"
        class="u-block" />
    </a>
  </li>
  <?php endif ?>
  <?php if ($facebookLink) : ?>
  <li>
    <a href="<?php echo esc_url($facebookLink) ?>" target="_blank" class="c-icon__circle">
      <img src="https://katsumascore.blog/images/logo-facebook.png" alt="facebook" width="50" height="50"
        class="u-block" />
    </a>
  </li>
  <?php endif ?>
  <?php if ($rssLink) : ?>
  <li>
    <a href="<?php echo esc_url($rssLink) ?>" class="c-icon__rss c-icon__circle" target="_blank">
      <img src="https://katsumascore.blog/images/logo-rss-white.png" alt="rss" width="30" height="30" />
    </a>
  </li>
  <?php endif ?>
</ul>