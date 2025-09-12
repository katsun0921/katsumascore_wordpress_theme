<?php

/**
 * The Component for Post Left Image
 */
$id = $args['id'] ?? get_the_ID();
$title = get_the_title($id);
$excerpt = get_the_excerpt($id);
$permalink = get_permalink($id);
$imageThumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'background');
$image = null;
if (is_array($imageThumbnail) && isset($imageThumbnail[0])) {
  $image = $imageThumbnail[0];
} else {
  // サムネイルがない場合のデフォルト画像パス（必要に応じて変更してください）
  $image = get_template_directory_uri() . '/images/loader.gif';
}
$is_post_page = is_single($id) || is_archive();

?>

<a class="u-flex u-p-2 u-gap-4 u-items-center c-border__primary" href="<?php echo esc_url($permalink); ?>">
  <div class="u-min-h-60 u-relative u-bg-gray-200 u-basic-1 u-basis-custom-property" style="--custom-basis: 250px;">
    <img class="u-absolute u-top-half u-transform-custom-property" style="--custom-transform: translateY(-50%);" src="<?php echo esc_url($image); ?>" alt="" width="540" loading="lazy" />
    <?php if ($is_post_page) : ?>
      <div class="u-absolute u-left-2 u-top-2">
        <?php get_template_part('template-parts/components/score', null, array('post_id' => $id)); ?>
      </div>
    <?php endif; ?>
  </div>
  <div class="u-shrink-2 u-flex u-flex-col u-gap-2">
    <hgroup>
      <?php if ($is_post_page) : ?>
        <div>
          <?php get_template_part('template-parts/components/category', null, array('size' => 'small')); ?>
        </div>
      <?php endif; ?>
      <h3 class="u-mt-1">
        <?php echo esc_html($title); ?>
      </h3>
    </hgroup>
    <div class="c-textOverflowHidden__line-3">
      <?php echo esc_html($excerpt); ?>
    </div>
  </div>
</a>
