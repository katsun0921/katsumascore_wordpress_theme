<?php
require_once get_template_directory() . '/libs/ImageSelector.php';

global $post;
$post_id = $args['post_id'] ?? null;
$headingText = $args['headingText'] ?? null;
$is_post = (get_post_type() === 'post');
$imageThumbnail = ($post && isset($post->ID)) ? wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'background') : false;
$image = ($imageThumbnail && is_array($imageThumbnail)) ? $imageThumbnail[0] : '';

$imageDefault = get_template_directory_uri() . '/images/main-visual-default.webp';
$image_selector = new ImageSelector();

if (is_category()) {
  $cat = get_queried_object();
  $image = $image_selector->getCategoryImageUrl($cat->slug);
}
if (taxonomy_exists('vod') && is_tax('vod')) {
  $tax = get_queried_object();
  $image = $image_selector->getVodImageUrl($tax->slug);
}

$parent_class = $is_post ? 'l-title' : 'u-bg-cover l-title';
?>

<hgroup style="<?php if (has_post_thumbnail()) : ?>background-image:url('<?php echo esc_attr($image); ?>') <?php endif; ?>"
  class="<?php echo $parent_class; ?>">
  <?php if (is_category()) : ?>
    <h1 class="page-title c-heading__title">
      <?php
      // 現在表示しているカテゴリーを取得
      $cat = get_queried_object();

      if ($cat && ! is_wp_error($cat)) {
        // 親カテゴリを遡って取得
        $parents = get_ancestors($cat->term_id, 'category');
        $parents = array_reverse($parents); // 親 → 子の順に整列

        // 親カテゴリがあれば出力
        if (! empty($parents)) {
          foreach ($parents as $parent_id) {
            $parent = get_category($parent_id);
            echo esc_html($parent->name) . ' ';
          }
        }

        // 最後に現在のカテゴリー名を出力
        echo esc_html($cat->name);
      }
      ?>
    </h1>
  <?php elseif (is_tag()) : ?>
    <h1 class="page-title c-heading__title">
      <?php
      // 現在表示しているタグを取得
      $tag = get_queried_object();

      if ($tag && ! is_wp_error($tag)) {
        echo esc_html($tag->name);
      }
      ?>
    </h1>
  <?php elseif (is_tax()) : ?>
    <h1 class="page-title c-heading__title">
      <div class="u-block u-mb-6">
        <div class="c-category">
          <?php
          $tax = get_queried_object();
          if ($tax && isset($tax->taxonomy)) {
            $tax_obj = get_taxonomy($tax->taxonomy);
            echo esc_html($tax_obj->labels->singular_name);
          }
          ?>
        </div>
      </div>
      <?php echo single_term_title('', false); ?>
    </h1>
  <?php elseif ($is_post) : ?>
    <h1 class="page-title c-heading__title">
      <div class="u-block u-mb-6"><?php get_template_part('template-parts/components/category') ?></div>
      <span class="u-block u-px-20 is-shadow"><?php echo the_title() ?></span>
    </h1>
  <?php else : ?>
    <h1 class="page-title c-heading__title">
      <?php echo !!$headingText ? $headingText : ''; ?>
    </h1>
  <?php endif; ?>
</hgroup>
