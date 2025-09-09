# APIドキュメント

Katsumascore WordPressテーマのカスタム関数とAPIの詳細を説明します。

## カスタム関数

### ランキングアイコン関数

#### `get_ranking_icon($value)`

スコア値に基づいてランキングアイコンを取得します。

**パラメータ:**
- `$value` (int|float): スコア値（0-100）

**戻り値:**
- `string`: ランキングアイコンのHTML

**使用例:**
```php
$score = 85;
$icon = get_ranking_icon($score);
echo $icon; // Aランクのアイコンが表示される
```

**ランキング基準:**
- SS: 95-100点
- S: 90-94点
- A: 80-89点
- B: 70-79点
- C: 60-69点
- 未評価: 60点未満

### テーマセットアップ関数

#### `progression_studios_setup()`

テーマの基本設定を行います。

**機能:**
- テーマサポートの追加
- カスタム画像サイズの登録
- ナビゲーションメニューの登録
- ウィジェットエリアの登録

**フック:**
```php
add_action('after_setup_theme', 'progression_studios_setup');
```

### カスタム画像サイズ

#### 登録済み画像サイズ

```php
// インデックス用（512x512）
add_image_size('index', 512, 512, true);

// 背景用（900x900）
add_image_size('background', 900, 900, false);

// 左寄せ用（700x460）
add_image_size('left-align', 700, 460, true);

// スライダーサムネイル用（300x200）
add_image_size('slider-thumb', 300, 200, true);
```

**使用例:**
```php
// カスタム画像サイズの取得
$image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'index');
$image_url = $image[0];

// テンプレートでの使用
the_post_thumbnail('background');
```

## カスタムフィールドAPI

### ACFフィールド

#### レビュー関連フィールド

**`review_score`**
- タイプ: Number
- 説明: レビュースコア（0-100）

**`title_jp`**
- タイプ: Text
- 説明: 日本語タイトル

**`original_title`**
- タイプ: Text
- 説明: オリジナルタイトル

**`acf_summary_group`**
- タイプ: Repeater
- 説明: あらすじグループ
- サブフィールド:
  - `summary_text`: あらすじテキスト

**`good_point_filed`**
- タイプ: Textarea
- 説明: おすすめポイント

#### VOD関連フィールド

**`streaming_vod_other_vod`**
- タイプ: Repeater
- 説明: その他のVODサービス
- サブフィールド:
  - `other_vod_name`: VODサービス名
  - `other_vod_url`: VOD URL
  - `is_affiliate_code`: アフィリエイトコード使用フラグ
  - `affiliate_code`: アフィリエイトコード

**`cinema_info_filed_is_cinema_watched`**
- タイプ: True/False
- 説明: 劇場で観たかどうか

**`cinema_info_filed_is_cinema_showing`**
- タイプ: True/False
- 説明: 劇場上映中かどうか

### フィールド取得関数

#### `get_field($field_name, $post_id = null)`

ACFフィールドの値を取得します。

**パラメータ:**
- `$field_name` (string): フィールド名
- `$post_id` (int): 投稿ID（省略時は現在の投稿）

**戻り値:**
- フィールドの値

**使用例:**
```php
$score = get_field('review_score', $post_id);
$title_jp = get_field('title_jp', $post_id);
$summary_group = get_field('acf_summary_group', $post_id);
```

#### `get_field_object($field_name, $post_id = null)`

ACFフィールドオブジェクトを取得します。

**パラメータ:**
- `$field_name` (string): フィールド名
- `$post_id` (int): 投稿ID

**戻り値:**
- フィールドオブジェクト（配列）

**使用例:**
```php
$field_object = get_field_object('review_score', $post_id);
$field_label = $field_object['label'];
$field_value = $field_object['value'];
```

## 多言語API

### Polylang関数

#### `pll_current_language()`

現在の言語を取得します。

**戻り値:**
- `string`: 言語コード（'ja' または 'en'）

**使用例:**
```php
$current_lang = pll_current_language();
if ($current_lang === 'en') {
    echo 'English content';
} else {
    echo '日本語コンテンツ';
}
```

#### `pll_get_post_language($post_id)`

投稿の言語を取得します。

**パラメータ:**
- `$post_id` (int): 投稿ID

**戻り値:**
- `string`: 言語コード

#### `pll_get_post($post_id, $language)`

指定言語の投稿を取得します。

**パラメータ:**
- `$post_id` (int): 投稿ID
- `$language` (string): 言語コード

**戻り値:**
- `int`: 翻訳された投稿のID

## テンプレートパーツAPI

### `get_template_part($slug, $name = null, $args = array())`

テンプレートパーツを読み込みます。

**パラメータ:**
- `$slug` (string): テンプレートパーツのスラッグ
- `$name` (string): テンプレートパーツの名前（オプション）
- `$args` (array): テンプレートに渡す引数

**使用例:**
```php
// コンポーネントの読み込み
get_template_part('template-parts/components/score', null, [
    'post_id' => $post_id,
    'size' => 'large'
]);

// 投稿テンプレートの読み込み
get_template_part('template-parts/post/post-single');

// 条件付きテンプレート
get_template_part('template-parts/components/content', get_post_format());
```

### 利用可能なテンプレートパーツ

#### コンポーネント
- `template-parts/components/score.php` - 評価スコア表示
- `template-parts/components/list-social-icon.php` - ソーシャルメディアアイコン
- `template-parts/components/post-image-overlay.php` - 画像オーバーレイ
- `template-parts/components/post-top-image.php` - アイキャッチ画像
- `template-parts/components/category.php` - カテゴリ表示
- `template-parts/components/title.php` - タイトル表示
- `template-parts/components/sharing.php` - シェア機能

#### 投稿テンプレート
- `template-parts/post/post-single.php` - 単一投稿レイアウト
- `template-parts/post/post-review.php` - レビュー投稿コンテンツ
- `template-parts/post/post-related.php` - 関連投稿
- `template-parts/post/post-introduce-vod.php` - VOD紹介
- `template-parts/post/post-series-posts.php` - シリーズ投稿
- `template-parts/post/post-tag-posts.php` - タグ投稿

#### ACF依存テンプレート
- `template-parts/plugin/acf/acf-summary.php` - あらすじ表示
- `template-parts/plugin/acf/acf-good-point.php` - おすすめポイント
- `template-parts/plugin/acf/acf-review-site-scores.php` - レビューサイトスコア
- `template-parts/plugin/acf/acf-relation-by-post-id.php` - 関連投稿表示
- `template-parts/plugin/acf/acf-streaming-vod.php` - ストリーミングVOD

## ウィジェットエリアAPI

### 登録済みウィジェットエリア

#### `progression-studios-post-widget-sidebar`
- 説明: 投稿の右側サイドバー
- 使用場所: 単一投稿ページ

#### `progression-studios-post-widgets-top`
- 説明: 投稿の上部
- 使用場所: 単一投稿ページ

#### `progression-studios-post-widgets-bottom`
- 説明: 投稿の下部
- 使用場所: 単一投稿ページ

### ウィジェットエリアの表示

```php
// ウィジェットエリアの表示
if (is_active_sidebar('progression-studios-post-widget-sidebar')) {
    dynamic_sidebar('progression-studios-post-widget-sidebar');
}
```

## ナビゲーションメニューAPI

### 登録済みメニュー位置

#### `progression-studios-primary`
- 説明: メインナビゲーション
- 使用場所: ヘッダー

#### `progression-studios-mobile-menu`
- 説明: モバイルナビゲーション
- 使用場所: モバイルヘッダー

### メニューの表示

```php
// メインナビゲーションの表示
wp_nav_menu([
    'theme_location' => 'progression-studios-primary',
    'menu_class' => 'l-navigation__menu',
    'container' => false,
]);
```

## フックとフィルター

### アクションフック

#### `progression_studios_after_setup_theme`
テーマセットアップ後に実行されます。

```php
add_action('progression_studios_after_setup_theme', 'custom_theme_setup');
```

#### `progression_studios_enqueue_scripts`
スクリプトとスタイルの読み込み時に実行されます。

```php
add_action('progression_studios_enqueue_scripts', 'custom_scripts');
```

### フィルターフック

#### `progression_studios_post_thumbnail_size`
投稿サムネイルサイズをフィルタリングします。

```php
add_filter('progression_studios_post_thumbnail_size', function($size) {
    return 'custom-size';
});
```

## カスタマイザーAPI

### カスタマイザー設定

#### レイアウト設定
- `progression_studios_blog_index_layout` - ブログインデックスレイアウト
- `progression_studios_post_layout` - 投稿レイアウト

#### 色設定
- `progression_studios_primary_color` - プライマリカラー
- `progression_studios_secondary_color` - セカンダリカラー

### カスタマイザー値の取得

```php
// カスタマイザー値の取得
$layout = get_theme_mod('progression_studios_blog_index_layout', 'default');
$primary_color = get_theme_mod('progression_studios_primary_color', '#000000');
```

## セキュリティAPI

### エスケープ関数

#### `esc_html($text)`
HTMLエスケープを行います。

```php
echo esc_html($user_input);
```

#### `esc_attr($text)`
属性エスケープを行います。

```php
echo '<div class="' . esc_attr($class_name) . '">';
```

#### `esc_url($url)`
URLエスケープを行います。

```php
echo '<a href="' . esc_url($link_url) . '">';
```

### サニタイゼーション関数

#### `sanitize_text_field($str)`
テキストフィールドをサニタイズします。

```php
$clean_text = sanitize_text_field($_POST['text_field']);
```

#### `sanitize_email($email)`
メールアドレスをサニタイズします。

```php
$clean_email = sanitize_email($_POST['email']);
```

## エラーハンドリング

### エラーログ

```php
// エラーログの出力
if (WP_DEBUG) {
    error_log('Error message: ' . $error_message);
}
```

### デバッグ関数

```php
// デバッグ出力
if (defined('WP_DEBUG') && WP_DEBUG) {
    var_dump($variable);
    print_r($array);
}
```

---

**注意**: このAPIドキュメントは、テーマのカスタム機能に焦点を当てています。WordPressの標準APIについては、[WordPress Developer Handbook](https://developer.wordpress.org/)を参照してください。
