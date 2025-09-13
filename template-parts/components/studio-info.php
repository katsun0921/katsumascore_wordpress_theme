<?php

/**
 * 制作会社・配給会社情報表示コンポーネント
 *
 * @param int $post_id 投稿ID
 */

$post_id = $args['post_id'] ?? get_the_ID();

$film_studios = get_the_terms($post_id, 'film_studio');
$production_studios = get_the_terms($post_id, 'production_studio');
?>

<!-- 配給会社 -->
<?php if ($film_studios) : ?>
  <dt class="u-font-bold u-text-lg">
    <?php echo pll_current_language() === 'en' ? 'Distributed by' : '配給会社'; ?>
  </dt>
  <dd class="u-pl-4">
    <ul class="c-listMovie__multiple">
      <?php foreach ((array)$film_studios as $film_studio) : ?>
        <li>
          <a href="<?php echo esc_url(get_term_link($film_studio->term_id)); ?>"><?php echo $film_studio->name; ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </dd>
<?php endif ?>

<!-- 制作会社 -->
<?php if ($production_studios) : ?>
  <dt class="u-font-bold u-text-lg">
    <?php echo pll_current_language() === 'en' ? 'Production Companies' : '制作会社'; ?>
  </dt>
  <dd class="u-pl-4">
    <ul class="c-listMovie__multiple">
      <?php foreach ((array)$production_studios as $production_studio) : ?>
        <li>
          <a href="<?php echo esc_url(get_term_link($production_studio->term_id)); ?>">
            <?php echo $production_studio->name; ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </dd>
<?php endif ?>