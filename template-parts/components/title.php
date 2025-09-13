<?php
global $post;
$post_id = $args['post_id'] ?? null;
$headingText = $args['headingText'] ?? null;
$is_post = (get_post_type() === 'post');
$imageThumbnail = ($post && isset($post->ID)) ? wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'background') : false;
$image = ($imageThumbnail && is_array($imageThumbnail)) ? $imageThumbnail[0] : '';

$imageDefault = get_template_directory_uri() . '/images/main-visual-default.webp';
if (is_category()) {
  $cat = get_queried_object();
  $category_images = [
    // カテゴリースラッグ => ファイル名
    'japan' => 'category-movie-japan.webp',
    'france' => 'category-movie-france.webp',
    'germany' => 'category-movie-germany.webp',
    'australia' => 'category-movie-australia.webp',
    'india-ja' => 'category-movie-india.webp',
    'movie-ja' => 'category-movie.webp',
    'united-kingdom' => 'category-movie-united-kingdom.webp',
    'america-ja' => 'category-movie-america.webp',
    'anime' => 'category-anime.webp',
    'anime-ova-ja' => 'category-anime.webp',
    'anime-film-ja' => 'category-anime.webp',
    'anime-en' => 'category-anime.webp',
    'anime-film-en' => 'category-anime.webp',
    'movie-en' => 'category-movie.webp',
    'america-en' => 'category-movie.webp',
    'australia-en' => 'category-movie-australia.webp',
    'france-en' => 'category-movie-france.webp',
    'germany-en' => 'category-movie-germany.webp',
    'japan-en' => 'category-movie-japan.webp',
    'united-kingdom-en' => 'category-movie-united-kingdom.webp',
  ];
  $filename = $category_images[$cat->slug] ?? '';
  $image = $filename ? get_template_directory_uri() . '/images/categories/' . $filename : $imageDefault;
}
if (taxonomy_exists('vod') && is_tax('vod')) {

  $vod_images = [
    //スラッグ => ファイル名
    'abema-tv' => 'abema-tv.webp',
    'amazon-prime-video-com' => 'amazon-prime-video.webp',
    'amazon-prime-video-jp' => 'amazon-prime-video.webp',
    'apple-tv-com' => 'apple-tv-plus.webp',
    'apple-tv-cojp' => 'apple-tv-plus.webp',
    'disneyplus-com' => 'disney-plus.webp',
    'disneyplus-jp' => 'disney-plus.webp',
    'dmmtv-jp' => 'dmm-tv.webp',
    'netflix-com' => 'netflix.webp',
    'netflix-jp' => 'netflix.webp',
    'u-next-ja' => 'u-next.webp',
    'youtube-com' => 'youtube.webp',
    'youtube-cojp' => 'youtube.webp',
  ];
  $tax = get_queried_object();
  $filename = $vod_images[$tax->slug] ?? '';
  $image = $filename ? get_template_directory_uri() . '/images/vod/' . $filename : $imageDefault;
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
  <?php elseif (is_tax()) : ?>
    <h1 class="page-title c-heading__title">
      <div class="u-block u-mb-6">
      <div class="c-category c-category__title">
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
