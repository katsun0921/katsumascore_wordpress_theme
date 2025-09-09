# 開発ガイド

Katsumascore WordPressテーマの開発環境セットアップと開発手順を説明します。

## 開発環境のセットアップ

### 必要なツール

- **PHP**: 7.4以上
- **Composer**: 依存関係管理
- **Node.js**: 16以上（CSS/JSビルド用）
- **Git**: バージョン管理
- **ローカル開発環境**: XAMPP、MAMP、Local by Flywheel等

### 1. リポジトリのクローン

```bash
git clone <repository-url>
cd katsumascore_wordpress_theme
```

### 2. 依存関係のインストール

#### Composer依存関係
```bash
composer install
```

#### Node.js依存関係（CSS/JSビルド用）
```bash
npm install
```

### 3. 開発用ビルド

#### CSS/JSのビルド
```bash
npm run build
```

#### 開発用ウォッチモード
```bash
npm run watch
```

## プロジェクト構造

```
katsumascore_wordpress_theme/
├── .cursor/                 # Cursor IDE設定
│   └── rules/              # コーディングルール
├── doc/                    # ドキュメント
├── template-parts/         # テンプレートパーツ
│   ├── component/         # 再利用可能コンポーネント
│   ├── post/              # 投稿専用テンプレート
│   ├── page/              # ページ専用テンプレート
│   └── plugin/            # プラグイン依存テンプレート
├── inc/                   # テーマ機能
├── css/                   # スタイルシート
├── js/                    # JavaScript
├── images/                # 画像アセット
├── languages/             # 翻訳ファイル
├── style.css              # テーマヘッダー
├── functions.php           # メイン機能
└── composer.json          # Composer設定
```

## コーディング標準

### PHPコーディング標準

#### 変数命名
- **スネークケース**: `$post_id`, `$template_name`
- **関数名**: プレフィックス付きスネークケース `theme_function_name()`

#### ファイル構造
```php
<?php
/**
 * ファイルの説明
 *
 * @package Katsumascore
 * @since 1.0.0
 */

// セキュリティチェック
if (!defined('ABSPATH')) {
    exit;
}

// 関数定義
function theme_function_name($param) {
    // 実装
}
```

### CSSコーディング標準

#### BEMメソドロジー
```css
/* ブロック */
.c-button { }

/* エレメント */
.c-button__text { }

/* モディファイア */
.c-button--primary { }
.c-button--large { }
```

#### クラス命名規則
- **レイアウト**: `l-` プレフィックス
- **コンポーネント**: `c-` プレフィックス
- **ユーティリティ**: `u-` プレフィックス

### ファイル命名規則

#### ケバブケース（kebab-case）
- すべてのファイル名は小文字とハイフンを使用
- 例: `post-image-overlay.php`, `list-social-icon.php`

#### プレフィックス規則
- `post-`: 投稿専用テンプレート
- `page-`: ページ専用テンプレート
- `acf-`: ACF依存テンプレート
- `plugin-`: プラグイン依存テンプレート
- `elementor-`: Elementor依存テンプレート

## 開発ワークフロー

### 1. ブランチ戦略

```bash
# 機能開発
git checkout -b feature/new-feature

# バグ修正
git checkout -b bugfix/fix-issue

# リリース準備
git checkout -b release/v1.1.0
```

### 2. コミットメッセージ

```
type(scope): description

feat(template): add new post template
fix(component): resolve score display issue
docs(readme): update installation guide
```

### 3. プルリクエスト

- 機能追加やバグ修正は必ずプルリクエストで行う
- コードレビューを必須とする
- テストを追加する

## テンプレート開発

### テンプレートパーツの作成

#### 新しいコンポーネントの作成
```php
<?php
/**
 * 新しいコンポーネント
 *
 * @param array $args コンポーネントの引数
 */

// 引数のデフォルト値
$defaults = [
    'post_id' => get_the_ID(),
    'size' => 'medium',
];

$args = wp_parse_args($args, $defaults);
extract($args);
?>

<div class="c-new-component">
    <!-- コンポーネントの内容 -->
</div>
```

#### テンプレートパーツの呼び出し
```php
get_template_part('template-parts/components/new-component', null, [
    'post_id' => $post_id,
    'size' => 'large'
]);
```

### カスタムフィールドの使用

#### ACFフィールドの取得
```php
// 単一フィールド
$score = get_field('review_score', $post_id);

// フィールドオブジェクト
$field_object = get_field_object('review_score', $post_id);

// リピーターフィールド
$repeater = get_field('acf_summary_group', $post_id);
if ($repeater) {
    foreach ($repeater as $row) {
        echo $row['summary_text'];
    }
}
```

## 多言語開発

### Polylang関数の使用

#### 言語判定
```php
// 現在の言語を取得
$current_lang = pll_current_language();

// 言語に応じたコンテンツ表示
if ($current_lang === 'en') {
    echo 'English content';
} else {
    echo '日本語コンテンツ';
}
```

#### 言語固有のURL
```php
// ホームURL
$home_url = pll_current_language() === 'en' ? '/en/top' : '/';

// 投稿URL
$post_url = get_permalink($post_id);
```

## デバッグとテスト

### デバッグ設定

#### wp-config.php
```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
define('SCRIPT_DEBUG', true);
```

#### デバッグ関数
```php
// デバッグ出力
if (WP_DEBUG) {
    error_log('Debug message: ' . print_r($variable, true));
}

// 条件付きデバッグ
if (defined('WP_DEBUG') && WP_DEBUG) {
    var_dump($variable);
}
```

### テスト環境

#### ローカルテスト
- 複数のブラウザでテスト
- レスポンシブデザインの確認
- 多言語表示の確認

#### パフォーマンステスト
- Google PageSpeed Insights
- GTmetrix
- WordPressのクエリモニター

## リリース手順

### 1. バージョン更新

#### style.css
```css
/*
Theme Name: Katsumascore
Version: 1.1.0
*/
```

#### functions.php
```php
define('KATSUMASCORE_VERSION', '1.1.0');
```

### 2. ビルドとテスト

```bash
# 本番用ビルド
npm run build:production

# テスト実行
npm run test
```

### 3. リリースノート作成

- 新機能の説明
- バグ修正の詳細
- 破壊的変更の警告

## トラブルシューティング

### よくある問題

#### テンプレートが表示されない
- ファイル名の確認
- パスの確認
- ファイルの権限確認

#### スタイルが適用されない
- CSSファイルの読み込み確認
- キャッシュのクリア
- ブラウザの開発者ツールで確認

#### 多言語機能の不具合
- Polylangの設定確認
- 翻訳ファイルの確認
- 言語スイッチャーの設定確認

## 参考資料

- [WordPress Codex](https://codex.wordpress.org/)
- [WordPress Developer Handbook](https://developer.wordpress.org/)
- [ACF Documentation](https://www.advancedcustomfields.com/resources/)
- [Polylang Documentation](https://polylang.pro/documentation/)

---

**開発のベストプラクティス**: 常にセキュリティを考慮し、適切なエスケープとサニタイゼーションを行ってください。
