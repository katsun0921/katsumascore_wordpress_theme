<?php
/**
 * The Component for Score
 */
['post_id' => $post_id] = $args;

// post_idが取れない時はget_the_ID()で取得、それも取れなかったらnull
if (empty($post_id)) {
  $post_id = get_the_ID();
  if (!$post_id) {
    $post_id = null;
  }
}

// post_idがnullまたはscoreが取れない場合は何も表示しない
if ($post_id === null) {
  return;
}

$score = get_post_meta($post_id, 'review_score', true);
if (empty($score)) {
  return;
}
?>

<div class="c-score c-score__medium">
  <span class="c-score__count">
    <?php echo esc_attr($score);?>
  </span>
</div>
