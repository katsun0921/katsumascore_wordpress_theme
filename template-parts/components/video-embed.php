<?php

/**
 * 動画埋め込み表示コンポーネント
 *
 * @param int $post_id 投稿ID
 */

$post_id = $args['post_id'] ?? get_the_ID();
?>

<?php if (get_post_meta($post_id, 'video_code', true)) : ?>
  <div class="u-mt-4 p-info__iframe">
    <?php echo get_post_meta($post_id, 'video_code', true) ?>
  </div>
<?php endif ?>