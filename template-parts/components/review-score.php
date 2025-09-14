<?php

/**
 * レビュースコア表示コンポーネント
 *
 * @param int $post_id 投稿ID
 */

$post_id = $args['post_id'] ?? get_the_ID();
?>

<?php if (get_post_meta($post_id, 'review_score', true)) : ?>
  <div class="p-info__score">
    <div class="c-score c-score__large">
      <div class="c-score__count">
        <?php echo esc_attr(get_post_meta($post_id, 'review_score', true)); ?>
      </div>
    </div>
  </div>
<?php endif; ?>