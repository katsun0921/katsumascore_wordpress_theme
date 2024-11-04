<?php if ('post' == get_post_type()) : ?>
<?php
  ['post_id' => $post_id] = $args;
  $series_term_id = get_post_meta($post_id, 'type_post_series', true);
  $series_ids = gettype($series_term_id) === 'array' ? $series_term_id : array(
    0 => $series_term_id
  );
  $taxonomy_series_id = 'series';
  ?>
<?php if ($series_ids) : ?>
<?php foreach ($series_ids as $series_id) : ?>
<?php
      $term_series = get_term($series_id);
      $series_name = $term_series->name;
      $series_description = $term_series->description;
      // タクソノミーに登録された投稿を取得（現在の投稿を除外）
      $query_args = array(
        'post_type' => 'post',
        'post__not_in' => array($post_id),
        'posts_per_page' => 3, // Number of related posts that will be displayed.
        'order' => 'DESC',
        'orderby' => 'date',
        'tax_query'      => [
          [
            'taxonomy' => $taxonomy_series_id, // タクソノミーID（またはスラッグ）を指定
            'field'    => 'term_id',
            'terms'    => $series_term_id, // ACFで指定したタクソノミーID
          ],
        ],
      );
      $series_query = new WP_Query($query_args);
      $class_name = count($series_query->posts) === 3 ? 'l-postRelated__3columns' : 'l-postRelated';
      ?>
<?php if ($series_query->have_posts()) : ?>
<section class="u-mt-6">
  <h2 class="c-heading__related u-mb-3">
    <?php echo pll_current_language() === 'en' ? 'There are more in the ' . $series_name . '!' : $series_name . 'は他にもあります！' ?>
  </h2>
  <?php if($series_description) : ?>
  <p><?php echo $series_description ?></p>
  <?php endif; ?>
  <ul class="<?php echo $class_name ?>">
    <?php while ($series_query->have_posts()) : $series_query->the_post(); ?>
    <li>
      <?php get_template_part('template-parts/components/postImageOverlay'); ?>
    </li>
    <?php endwhile; ?>
  </ul>
</section>
<?php endif; ?>
<?php endforeach; ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php endif; ?>
