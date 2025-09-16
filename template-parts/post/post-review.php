<?php

/**
 * # レビュー投稿情報表示テンプレート
 *
 * 詳細は各コンポーネントに分割して管理
 *
 * ## 1. `review-score.php`
 * - レビュースコアの表示を担当
 * - 投稿のメタデータから `review_score` を取得して表示
 *
 * ## 2. `basic-info.php`
 * - 基本情報（原題、公式サイト、上映日・配信日）の表示を担当
 * - 多言語対応（英語・日本語）
 *
 * ## 3. `director-info.php`
 * - 監督情報の表示を担当
 * - 監督の他の作品も表示
 *
 * ## 4. `actors-info.php`
 * - 登場人物・俳優情報の表示を担当
 * - ACFの`actors_filed`フィールドから情報を取得
 * - 俳優の他の出演作品も表示
 *
 * ## 5. `studio-info.php`
 * - 制作会社・配給会社情報の表示を担当
 * - タクソノミー`film_studio`と`production_studio`から情報を取得
 *
 * ## 6. `video-embed.php`
 * - 動画埋め込みの表示を担当
 * - メタデータの`video_code`から埋め込みコードを表示
 */

$post_id = $post->ID;
?>

<section class="p-info u-mb-12">
  <!-- レビュースコア表示 -->
  <div class="p-info__score">
    <?php get_template_part('template-parts/components/score', null, array('post_id' => $post_id, 'size' => 'large')); ?>
  </div>

  <!-- 記事の概要表示 -->
  <?php if (get_the_excerpt($post_id, true)) : ?>
    <div>
      <p><?php echo get_the_excerpt($post_id, true); ?></p>
    </div>
  <?php endif; ?>

  <div class="p-info__detail">
    <!-- 基本情報（原題、公式サイト、上映日） -->
    <?php get_template_part('template-parts/components/basic-info', null, array('post_id' => $post_id)); ?>

    <!-- 監督情報 -->
    <?php get_template_part('template-parts/components/director-info', null, array('post_id' => $post_id)); ?>

    <!-- 登場人物・俳優情報 -->
    <?php get_template_part('template-parts/plugins/acf/actors-info', null, array('post_id' => $post_id)); ?>

    <!-- 制作会社・配給会社情報 -->
    <?php get_template_part('template-parts/components/studio-info', null, array('post_id' => $post_id)); ?>
  </div>

  <!-- 動画埋め込み -->
  <?php get_template_part('template-parts/components/video-embed', null, array('post_id' => $post_id)); ?>
</section>
