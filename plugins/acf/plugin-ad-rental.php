<?php
['post_id' => $post_id] = $args;
// レンタル広告を表示するページ。劇場で上映中でありVODで配信をしていない時は表示をしない。
$titleJp = get_post_meta($post_id, 'title_jp', true);
$rental_tsutaya_url = get_field('rental_tsutaya_url', $post_id);
$rental_geo_url = get_field('rental_geo_url', $post_id);
$rental_services = array(
  'tsutaya' => $rental_tsutaya_url,
  'geo' => $rental_geo_url,
);
$all_empty_for_rental_services = true;
foreach ($rental_services as $value) :
  if (!empty($value)) :
    $all_empty_for_rental_services = false;
    break;
  endif;
endforeach;
?>
<?php if (!$all_empty_for_rental_services) : ?>
  <section>
    <h2>
      <?php echo $titleJp ?>はレンタルサービスでレンタル中です。
    </h2>
    <ul style="display: flex;justify-content: space-evenly;list-style: none;">
      <?php foreach ($rental_services as $key => $value) :
        $arg_affiliate = array(
          'unregistered_text' => '未登録の方はこちらから登録できます。',
          'streaming_text' => 'レンタルはこちらのリンクから移動できます。',
          'url' => $value
        );
      ?>
        <?php if (!empty($value)) : ?>
          <li style="width: 33%">
            <? get_template_part('plugins/acf/vod/' . $key, null, $arg_affiliate); ?>
          </li>
        <?php endif; ?>
      <?php endforeach; ?>
    </ul>
  </section>
<?php endif; ?>