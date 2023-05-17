<div class="c-date">
  <?php if( pll_current_language() === 'en' ) : ?>
  <p><time datetime="<?php the_modified_date('Y-m-d') ?>">Last update:<?php the_modified_date('F j, Y') ?></time></p>
  <p><time datetime="<?php the_time('Y-m-d') ?>">Publication date:<?php the_time('F j, Y') ?></time></p>
  <?php else: ?>
  <p><time datetime="<?php the_modified_date('Y-m-d') ?>">最終更新日:<?php the_modified_date('Y/m/d') ?></time></p>
  <p><time datetime="<?php the_time('Y-m-d') ?>">公開日:<?php the_time('Y/m/d') ?></time></p>
  <?php endif; ?>
</div>