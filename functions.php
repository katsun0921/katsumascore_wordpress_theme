<?php

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */

function theme_setup() {

  // Post Thumbnails
  add_theme_support('post-thumbnails');

  // Custom Image Sizes
  add_image_size('thumbnail', 150, 150, true);
  add_image_size('medium', 300, 300, false);
  add_image_size('large', 1024, 1024, false);
  add_image_size('index', 512, 512, true);

  /*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
  add_theme_support('title-tag');

  /**
   * This theme uses wp_nav_menu() in one location.
   */
  register_nav_menus(array(
    'katsumascore-header-menu' => esc_html__('Header Menu', 'katsumascore'),
  ));
}
add_action('after_setup_theme', 'theme_setup');

/**
 * Enqueue scripts and styles
 */
function katsumascore_scripts()
{
  wp_enqueue_script('katsumascore-script-bundle', get_template_directory_uri() . '/js/bundle.js');
  wp_enqueue_style('katsumascore-style-build', get_template_directory_uri() . '/css/build.css');

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}
add_action('wp_enqueue_scripts', 'katsumascore_scripts');

/**
 * Custom Editor Settings
 */
function custom_enqueue_scripts($hook)
{
  // Only add to the edit.php admin page.
  // See WP docs.
  if ('post.php' === $hook) {
    wp_enqueue_style('my-custom-script', get_template_directory_uri() . '/css/edit-post.css');
  }
}
add_action('admin_enqueue_scripts', 'custom_enqueue_scripts');

function my_redirect()
{
  /* 著者アーカイブのリダイレクト */
  if (is_author()) {
    wp_safe_redirect(home_url());
    exit;
  }
}
add_action('template_redirect', 'my_redirect', 1);

/**
 * Allows posts to be searched by ID in the admin area.
 *
 * @param WP_Query $query The WP_Query instance (passed by reference).
 */
function wpse_admin_search_include_ids($query)
{
  // Bail if we are not in the admin area
  if (! is_admin()) {
    return;
  }

  // Bail if this is not the search query.
  if (! $query->is_main_query() && ! $query->is_search()) {
    return;
  }

  // Get the value that is being searched.
  $search_string = get_query_var('s');

  // Bail if the search string is not an integer.
  if (! filter_var($search_string, FILTER_VALIDATE_INT)) {
    return;
  }

  // Set WP Query's p value to the searched post ID.
  $query->set('p', intval($search_string));

  // Reset the search value to prevent standard search from being used.
  $query->set('s', '');
}
add_action('pre_get_posts', 'wpse_admin_search_include_ids');

/**
 * Custom template tags for this theme.
 */
/* Modify Default Category Widget */
function katsumascore_add_span_cat_count($links)
{
  $links = str_replace('</a> (', ' <span class="count">', $links);

  $links = str_replace('(', '', $links);

  $links = str_replace(')', '</span></a>', $links);
  return $links;
}
add_filter('wp_list_categories', 'katsumascore_add_span_cat_count');

function katsumascore_archive_count_span($links)
{
  $links = str_replace('</a>&nbsp;(', ' <span class="count">', $links);
  $links = str_replace(')', '</span></a>', $links);
  return $links;
}
add_filter('get_archives_link', 'katsumascore_archive_count_span');

function katsumascore_category_title($title)
{
  if (is_category()) {
    $title = single_cat_title('', false);
  } elseif (is_tag()) {
    $title = single_tag_title('', false);
  }
  return $title;
}
add_filter('get_the_archive_title', 'katsumascore_category_title');


// Disable Post-by-Email
add_filter('enable_post_by_email_configuration', '__return_false', PHP_INT_MAX);


// ランキングアイコンを表示する
require get_template_directory() . '/inc/get-ranking-icon.php';

// パンくずリスト
require get_template_directory() . '/inc/breadcrumbs.php';

// UTMパラメーター関数
require get_template_directory() . '/inc/utm-parameters.php';

// カテゴリー画像機能
require get_template_directory() . '/inc/taxonomy-image.php';

// カテゴリー画像ヘルパー関数
require get_template_directory() . '/inc/taxonomy-image-helpers.php';
// カスタムページネーション機能
require get_template_directory() . '/inc/pagination.php';

// 管理フィルタ関連
require_once get_template_directory() . '/inc/admin-author-filter.php';
