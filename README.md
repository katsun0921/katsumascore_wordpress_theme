# katsumascore_wordpress_theme

katsumascore.blog wordpress theme

## php ルール

phpの変数名はスネークケースとする。※キャメルケースだと反映できないことがある。

## tag ルール

```bash

# template ファイルの追加と削除
v1.0.0
↓
v2.0.0

# 機能の追加と削除
v1.0.0
↓
v1.1.0

# 現在機能の修正
v1.0.0
↓
v1.0.1

```

## 英語ページ

[Polylangプラグインを使用](https://polylang.pro/)

https://www.webdesignleaves.com/pr/wp/wp_polylang.html

日本語ページを作成したら、英語ページを作成する

```php
# 英語ページの出し分け
pll_current_language() === 'en' ? '英語' : '日本語';
```
