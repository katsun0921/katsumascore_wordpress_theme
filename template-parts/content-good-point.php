<?php
$good_points_filed = get_field('good_point_filed');
if ($good_points_filed) :
?>
<div class="progression-blog-single-good-point-container">
  <h2 class="progression-blog-single-good-point">ここがおすすめ！</h2>
  <ul class="progression-blog-single-good-point-lists">
    <?php
      foreach ((array) $good_points_filed as $good_point) :
        $good_point_text = (string) $good_point['good_point_text'];
        if ($good_point_text) :
      ?>
    <li class="progression-blog-single-good-point-list">
      <?php echo $good_point_text ?>
    </li>
    <?php
        endif;
      endforeach;
      ?>
  </ul>
</div>
<?php endif; ?>