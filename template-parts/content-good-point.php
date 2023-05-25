<?php
$good_points_filed = get_field('good_point_filed');
if ($good_points_filed) :
?>
<section class="p-goodPoint">
  <h2 class="u-mb-4">
    <?php echo pll_current_language() === 'en' ? 'I highly recommend this place!' : 'ここがおすすめ！' ?>
  </h2>
  <ul class="u-list-disc">
    <?php
      foreach ((array) $good_points_filed as $good_point) :
        $good_point_text = (string) $good_point['good_point_text'];
        if ($good_point_text) :
      ?>
    <li>
      <?php echo $good_point_text ?>
    </li>
    <?php
        endif;
      endforeach;
      ?>
  </ul>
</section>
<?php endif; ?>