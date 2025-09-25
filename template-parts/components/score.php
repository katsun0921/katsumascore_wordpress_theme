<?php
/**
 * The Component for Score
 */
$post_id = $args['post_id'] ?? get_the_ID();
$size = $args['size'] ?? 'medium'; // 'small', 'medium', 'large'

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
$file = get_ranking_icon( $score );
$image_size = [ 'small' => 40, 'medium' => 60, 'large' => 100 ];
?>

<div class="u-w-24 u-h-24 u-w-custom-property u-h-custom-property" style="--custom-width: <?php echo esc_attr( $image_size[$size] ); ?>px;--custom-height:<?php echo esc_attr( ($image_size[$size] * 1.2) ); ?>px;">
  <img src="<?php echo esc_url( get_template_directory_uri() . '/images/icons/' . $file ); ?>" alt="Score <?php echo esc_attr( $score ); ?>" width="280">
</div>
