<?php

/**
 * カスタムページネーション機能
 */

/**
 * カスタムページネーション用のクエリ変数を追加
 *
 * @param array $vars WordPressクエリ変数の配列
 * @return array 修正されたクエリ変数の配列
 * @since 1.0.0
 */
function add_custom_query_vars($vars)
{
  $vars[] = 'page';
  return $vars;
}
add_filter('query_vars', 'add_custom_query_vars');

/**
 * カスタムページネーション処理
 *
 * @param WP_Query $query WordPressクエリオブジェクト
 * @return void
 * @since 1.0.0
 */
function modify_main_query($query)
{
  if (!is_admin() && $query->is_main_query()) {
    $page_num = get_query_var('page');
    if ($page_num && is_numeric($page_num)) {
      $query->set('paged', intval($page_num));
    }
  }
}
add_action('pre_get_posts', 'modify_main_query');

/**
 * WordPressのデフォルトページネーションURLを無効化
 *
 * @param string $redirect_url リダイレクト先URL
 * @param string $requested_url リクエストされたURL
 * @return string|false リダイレクト先URLまたはfalse
 * @since 1.0.0
 */
function disable_canonical_paginated_urls($redirect_url, $requested_url)
{
  if (is_paged() && strpos($requested_url, '/page/') !== false) {
    return false; // リダイレクトを無効化
  }
  return $redirect_url;
}
add_filter('redirect_canonical', 'disable_canonical_paginated_urls', 10, 2);

/**
 * ページネーションのリライトルールを無効化
 *
 * @param array $rules リライトルールの配列
 * @return array 修正されたリライトルールの配列
 * @since 1.0.0
 */
function remove_pagination_rewrite_rules($rules)
{
  foreach ($rules as $rule => $rewrite) {
    if (strpos($rule, 'page') !== false || strpos($rule, 'paged') !== false) {
      unset($rules[$rule]);
    }
  }
  return $rules;
}
add_filter('rewrite_rules_array', 'remove_pagination_rewrite_rules');

/**
 * /page/2/ 形式のURLから ?page=2 にリダイレクト
 *
 * @return void
 * @since 1.0.0
 */
function redirect_page_urls()
{
  global $wp;
  $current_url = home_url($wp->request);

  if (preg_match('/(.*)\/page\/(\d+)\/?$/', $current_url, $matches)) {
    $base_url = $matches[1];
    $page_num = $matches[2];

    if ($page_num > 1) {
      $redirect_url = $base_url . '/?page=' . $page_num;
    } else {
      $redirect_url = $base_url . '/';
    }

    wp_safe_redirect($redirect_url, 301);
    exit;
  }
}
add_action('template_redirect', 'redirect_page_urls');

/**
 * WordPressのデフォルトページネーションリライトルールをフィルター
 *
 * @param array $rules リライトルールの配列
 * @return array 修正されたリライトルールの配列
 * @since 1.0.0
 */
function disable_pagination_rewrite_rules($rules)
{
  // ページネーション関連のルールを削除
  foreach ($rules as $rule => $rewrite) {
    if (strpos($rule, '/page/') !== false || strpos($rule, 'paged=') !== false) {
      unset($rules[$rule]);
    }
  }
  return $rules;
}
add_filter('rewrite_rules_array', 'disable_pagination_rewrite_rules');

/**
 * ページネーションベースを無効化
 *
 * @return void
 * @since 1.0.0
 */
function disable_pagination_base()
{
  global $wp_rewrite;
  $wp_rewrite->pagination_base = '';
}
add_action('init', 'disable_pagination_base');

/**
 * /page/X/ へのアクセスを適切なURLにリダイレクト
 *
 * @return void
 * @since 1.0.0
 */
function redirect_paginated_urls()
{
  if (!is_admin()) {
    $current_url = $_SERVER['REQUEST_URI'];

    // /page/数字/ のパターンをチェック
    if (preg_match('/\/page\/(\d+)\/?/', $current_url, $matches)) {
      $page_num = intval($matches[1]);

      // /page/X/ 部分を削除してベースURLを作成
      $base_url = preg_replace('/\/page\/\d+\/?/', '/', $current_url);

      // ?page=X を追加（1ページ目以外）
      if ($page_num > 1) {
        $redirect_url = add_query_arg('page', $page_num, $base_url);
      } else {
        $redirect_url = $base_url;
      }

      // 現在のドメインを含む完全なURLを作成
      $redirect_url = home_url($redirect_url);

      wp_safe_redirect($redirect_url, 301);
      exit;
    }
  }
}
add_action('template_redirect', 'redirect_paginated_urls', 1);
