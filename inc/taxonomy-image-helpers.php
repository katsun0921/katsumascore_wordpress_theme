<?php
/**
 * カテゴリー画像表示用のヘルパー関数
 *
 * @package Katsumascore
 */

/**
 * カテゴリー画像のIDを取得
 *
 * @param int $category_id カテゴリーID（省略時は現在のカテゴリー）
 * @return int|false 画像ID、または存在しない場合はfalse
 */
function get_category_image_id($category_id = null) {
    if (is_null($category_id)) {
        if (is_category()) {
            $category_id = get_queried_object_id();
        } else {
            return false;
        }
    }
    
    return Katsumascore_Taxonomy_Image::get_category_image_id($category_id);
}

/**
 * カテゴリー画像のURLを取得
 *
 * @param int $category_id カテゴリーID（省略時は現在のカテゴリー）
 * @param string $size 画像サイズ
 * @return string|false 画像URL、または存在しない場合はfalse
 */
function get_category_image_url($category_id = null, $size = 'medium') {
    if (is_null($category_id)) {
        if (is_category()) {
            $category_id = get_queried_object_id();
        } else {
            return false;
        }
    }
    
    return Katsumascore_Taxonomy_Image::get_category_image_url($category_id, $size);
}

/**
 * カテゴリー画像を表示
 *
 * @param int $category_id カテゴリーID（省略時は現在のカテゴリー）
 * @param string $size 画像サイズ
 * @param array $attr 画像の属性
 * @return string|false 画像のHTML、または存在しない場合はfalse
 */
function get_category_image($category_id = null, $size = 'medium', $attr = array()) {
    if (is_null($category_id)) {
        if (is_category()) {
            $category_id = get_queried_object_id();
        } else {
            return false;
        }
    }
    
    return Katsumascore_Taxonomy_Image::display_category_image($category_id, $size, $attr);
}

/**
 * カテゴリー画像を出力
 *
 * @param int $category_id カテゴリーID（省略時は現在のカテゴリー）
 * @param string $size 画像サイズ
 * @param array $attr 画像の属性
 */
function the_category_image($category_id = null, $size = 'medium', $attr = array()) {
    echo get_category_image($category_id, $size, $attr);
}

/**
 * カテゴリー画像が存在するかチェック
 *
 * @param int $category_id カテゴリーID（省略時は現在のカテゴリー）
 * @return bool 画像が存在する場合はtrue、しない場合はfalse
 */
function has_category_image($category_id = null) {
    $image_id = get_category_image_id($category_id);
    return !empty($image_id);
}

/**
 * 投稿のカテゴリー画像を取得（複数カテゴリーの場合は最初のカテゴリー）
 *
 * @param int $post_id 投稿ID（省略時は現在の投稿）
 * @param string $size 画像サイズ
 * @param array $attr 画像の属性
 * @return string|false 画像のHTML、または存在しない場合はfalse
 */
function get_post_category_image($post_id = null, $size = 'medium', $attr = array()) {
    if (is_null($post_id)) {
        $post_id = get_the_ID();
    }
    
    $categories = get_the_category($post_id);
    if (empty($categories)) {
        return false;
    }
    
    // 最初のカテゴリーの画像を取得
    $first_category = $categories[0];
    return get_category_image($first_category->term_id, $size, $attr);
}

/**
 * 投稿のカテゴリー画像を出力（複数カテゴリーの場合は最初のカテゴリー）
 *
 * @param int $post_id 投稿ID（省略時は現在の投稿）
 * @param string $size 画像サイズ
 * @param array $attr 画像の属性
 */
function the_post_category_image($post_id = null, $size = 'medium', $attr = array()) {
    echo get_post_category_image($post_id, $size, $attr);
}