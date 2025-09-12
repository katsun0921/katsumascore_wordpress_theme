<?php
// パンくずリストを表示する関数
if (!function_exists('custom_breadcrumb')) {
  function custom_breadcrumb() {
    global $post;
    $sep = ' › '; // 区切り文字

    echo '<nav class="breadcrumbs" aria-label="breadcrumb">';
    echo '<a href="' . home_url() . '">HOME</a>' . $sep;

    if (is_category() || is_single()) {
      $categories = get_the_category();
      if ($categories) {
        $cat = $categories[0];
        echo get_category_parents($cat, true, $sep);
      }
      if (is_single()) {
        the_title();
      }
    } elseif (is_page()) {
      if ($post->post_parent) {
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        foreach ($ancestors as $ancestor) {
          echo '<a class="breadcrumbs-link" href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a>' . $sep;
        }
      }
      echo get_the_title();
    } elseif (is_search()) {
      echo '「' . get_search_query() . '」の検索結果';
    } elseif (is_404()) {
      echo '404 Not Found';
    } elseif (is_archive()) {
      the_archive_title();
    }

    echo '</nav>';
  }
}
