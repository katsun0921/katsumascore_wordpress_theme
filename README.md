# katsumascore_wordpress_theme

katsumascore.blog wordpress theme

## 開発ガイドライン

このテーマの開発は以下のルールにしたがってください：

- **PHPコーディング標準**: [.cursor/rules/php-coding-standards.mdc](.cursor/rules/php-coding-standards.mdc)
- **バージョン管理**: [.cursor/rules/version-control.mdc](.cursor/rules/version-control.mdc)
- **多言語開発**: [.cursor/rules/multilingual-development.mdc](.cursor/rules/multilingual-development.mdc)
- **テンプレートシステム**: [.cursor/rules/template-system.mdc](.cursor/rules/template-system.mdc)
- **スタイリング規約**: [.cursor/rules/styling-conventions.mdc](.cursor/rules/styling-conventions.mdc)
- **プロジェクト構造**: [.cursor/rules/project-structure.mdc](.cursor/rules/project-structure.mdc)
- **WordPress開発**: [.cursor/rules/wordpress-development.mdc](.cursor/rules/wordpress-development.mdc)

## クイックリファレンス

### テーマ情報
- **テーマ名**: Katsumascore
- **バージョン**: 1.0
- **作者**: Katsumasa-sato
- **テーマURI**: https://katsumascore.blog/

### 主要技術
- **CMS**: WordPress
- **多言語**: Polylang Pro
- **PHP**: 8.0以上推奨

## 依存プラグイン

### 必須プラグイン
以下のプラグインはテーマの正常な動作に必要です：

| プラグイン | 説明 | バージョン |
|-----------|------|----------|
| **Polylang Pro** | 多言語サポート（日本語/英語） | 3.0以上 |
| **Advanced Custom Fields Pro** | カスタムフィールド管理 | 6.4以上 |

### 推奨プラグイン
以下のプラグインは機能拡張のために推奨されます：

| プラグイン | 説明 | 用途 |
|-----------|------|------|
| **TGM Plugin Activation** | プラグイン管理 | 依存プラグインの自動インストール |

### 使用されている主要機能
- **ACFフィールド**: `review_score`, `title_jp`, `acf_summary_group`, `streaming_vod_*`
- **Polylang関数**: `pll_current_language()`, 言語固有コンテンツ

詳細なセットアップ手順は [doc/installation.md](doc/installation.md) を参照してください。
