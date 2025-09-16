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
  <dt class="u-font-bold u-text-lg">
    <?php echo pll_current_language() === 'en' ? 'Original Site' : '公式サイト'; ?>
  </dt>
  <dd class="u-pl-4">
    <?php if (get_post_meta($post_id, 'official_url', true)) : ?>
    <a
      href="<?php echo esc_url(get_post_meta($post_id, 'official_url', true)) ?>"
      target="_blank">
      <?php echo get_post_meta($post_id, 'official_url', true) ?>
    </a>
    <?php endif ?>
    <p>
      <?php echo get_post_meta($post_id, 'copyright', true) ?>
    </p>
  </dd>

  <!-- 公式サイトSNSリンク-->
  <?php
  $sns_group = get_field('official_sns', $post_id);
  $has_content = false;
  if ($sns_group && is_array($sns_group)) {
    foreach ($sns_group as $platform => $sns_data) {
      if (!empty($sns_data['embed'])) {
        $has_content = true;
        break;
      }
    }
  }
  if ($has_content) : ?>
    <dt class="u-font-bold u-text-lg">
      <?php echo pll_current_language() === 'en' ? 'Official SNS' : '公式サイトSNS'; ?>
    </dt>
    <dd class="u-pl-4">
      <ul class="u-flex u-flex-col u-gap-2 u-mt-2">
        <?php foreach ($sns_group as $platform => $sns_data) :
          if (!empty($sns_data['link'])) : ?>
            <li class="sns-item">
              <a class="u-p-2" href="<?php echo esc_url($sns_data['link']); ?>" target="_blank" rel="noopener">
                <?php
                // プラットフォーム名を表示用に変換
                switch ($platform) {
                  case 'x':
                    echo 'X(旧Twitter)';
                    break;
                  case 'instagram':
                    echo 'Instagram';
                    break;
                  case 'youtube_channel':
                    echo 'YouTube Channel';
                    break;
                  case 'TikTok':
                    echo 'TikTok';
                    break;
                  case 'facebook':
                    echo 'Facebook';
                    break;
                  case 'line':
                    echo 'LINE';
                    break;
                  default:
                    echo esc_html(ucfirst($platform));
                }
                ?>
              </a>
            </li>
        <?php endif;
        endforeach; ?>
      </ul>
    </dd>
  <?php endif; ?>
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
