<?php

/**
 * @description スライダーの左ナビ。クリックするとヒーロー画像が変更される
 */
?>
<li class="noselect">
  <div class="progression-ratency-slider-thumb-container">
    <?php if ($settings['progression_elements_thumbs_image'] == 'yes') : ?>
    <div class="progression-ratency-slider-thumb-image">
      <?php if (has_post_thumbnail()) : ?><?php the_post_thumbnail('progression-studios-slider-thumb'); ?><?php endif; ?>
    </div>
    <?php endif; ?>
    <div class="progression-ratency-slider-thumb-caption">
      <h2><?php echo the_title(); ?></h2>
    </div>
    <div class="progression-ratency-slider-thumb-gradient"></div>
  </div>
</li>