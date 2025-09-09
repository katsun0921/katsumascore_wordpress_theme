<?php
/**
 * The Component for Score
 */
['post_id' => $post_id] = $args;
?>

<div class="c-score c-score__medium">
  <span class="c-score__count">
    <?php echo esc_attr(get_post_meta($post_id, 'review_score', true));; ?>
  </span>
</div>
