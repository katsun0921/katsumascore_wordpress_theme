<?php

/**
 * 基本情報表示コンポーネント
 *
 * @param int $post_id 投稿ID
 */

$post_id = $args['post_id'] ?? get_the_ID();

$date_string = get_post_meta($post_id, 'release_date', true);
$release_date = $date_string ? DateTime::createFromFormat('Ymd', $date_string) : null;
?>

<dl class="p-info__detail">
  <!-- original-title -->
  <?php if (get_post_meta($post_id, 'title_en', true)) : ?>
    <dt class="u-font-bold u-text-lg">
      <?php echo pll_current_language() === 'en' ? 'Title' : '原題'; ?>
    </dt>
    <dd class="u-pl-4">
      <?php echo get_post_meta($post_id, 'title_en', true) ?>
    </dd>
  <?php endif ?>

  <!-- 公式サイト -->
  <?php if (get_post_meta($post_id, 'official_url', true)) : ?>
    <dt class="u-font-bold u-text-lg">
      <?php echo pll_current_language() === 'en' ? 'Original Site' : '公式サイト'; ?>
    </dt>
    <dd class="u-pl-4">
      <a
        href="<?php echo esc_url(get_post_meta($post_id, 'official_url', true)) ?>"
        target="_blank">
        <?php echo get_post_meta($post_id, 'official_url', true) ?>
      </a>
    </dd>
  <?php endif ?>

  <!-- 上映日・配信日 -->
  <?php if ($release_date) : ?>
    <dt class="u-font-bold u-text-lg">
      <?php echo pll_current_language() === 'en' ? 'Screening and distribution dates' : '上映日・配信日'; ?>
    </dt>
    <dd class="u-pl-4">
      <?php echo pll_current_language() === 'en' ? $release_date->format('j M, Y') : $release_date->format('Y年m月d日'); ?>
    </dd>
  <?php endif ?>
</dl>