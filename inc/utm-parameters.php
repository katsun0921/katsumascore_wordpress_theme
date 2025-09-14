<?php

/**
 * UTMパラメーター関連の関数
 *
 * @package katsumascore_wordpress_theme
 */

/**
 * URLにUTMパラメーターを追加する関数
 * @param array|string $args 配列形式の引数または従来のURL文字列
 *   配列の場合: [
 *     'url' => string ベースURL（必須）
 *     'source' => string utm_source値（必須）
 *     'medium' => string utm_medium値（デフォルト: 'website'）
 *     'campaign' => string utm_campaign値（デフォルト: 'vod_redirect'）
 *     'content' => string utm_content値（省略時は投稿タイトルまたは'katsumascore'）
 *   ]
 * @return string UTMパラメーター付きのURL
 */
function add_utm_parameters($utm_params)
{
  // 第1引数が配列の場合は新形式、文字列の場合は従来形式で処理
  if (is_array($utm_params)) {
    // 新形式：配列での引数指定
    $url = $utm_params['url'] ?? '';
    $utm_source = $utm_params['source'] ?? '';
    $utm_medium = $utm_params['medium'] ?? 'website';
    $utm_campaign = $utm_params['campaign'] ?? 'vod_redirect';
    $utm_content = $utm_params['content'] ?? (get_the_title() ? sanitize_title(get_the_title()) : 'katsumascore');
  } else {
    $utm_content = get_the_title() ? sanitize_title(get_the_title()) : 'katsumascore';
  }

  // 必須パラメーターのチェック
  if (empty($url) || empty($utm_source)) {
    return $url;
  }

  $utm_params = [
    'utm_source' => $utm_source,
    'utm_medium' => $utm_medium,
    'utm_campaign' => $utm_campaign,
    'utm_content' => $utm_content
  ];

  // URLに既存のクエリパラメーターがあるかチェック
  $separator = (parse_url($url, PHP_URL_QUERY) === null) ? '?' : '&';

  return $url . $separator . http_build_query($utm_params);
}
