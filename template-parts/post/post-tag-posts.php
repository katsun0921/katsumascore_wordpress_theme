<?php if ('post' == get_post_type()) : ?>
<?php
  $post_id = $args['post_id'] ?? get_the_ID();
  $tags = get_the_tags($post_id);
  ?>
<?php if ($tags) : ?>
<?php
  // 配列をシャッフル
  shuffle($tags);

  // ランダムに3件だけ取り出す
  $random_tags = array_slice($tags, 0, 3);
?>
<?php foreach ($random_tags as $tag) : ?>
<?php
      $tag_id = $tag->term_id;
      $tag_name = $tag->name;
      $tag_description = $tag->description;
      $query_args = array(
        'tag_id' => $tag_id,
        'posts_per_page' => 3,
        'post__not_in' => array($post_id),
        'posts_per_page' => 3, // Number of related posts that will be displayed.
        'orderby' => 'rand' // Randomize the posts
      );
      $tag_query = new WP_Query($query_args);
      $class_name = count($tag_query->posts) === 3 ? 'l-postRelated__3columns' : 'l-postRelated';
      ?>
<?php if ($tag_query->have_posts()) : ?>
<section class="u-mt-6">
  <h2 class="c-heading__related u-mb-3">
    <?php echo pll_current_language() === 'en' ? 'I recommend this ' . $tag_name . '!' : $tag_name . 'もおすすめです！' ?>
  </h2>
  <?php if($tag_description) : ?>
  <p><?php echo $tag_description ?></p>
  <?php endif; ?>
  <ul class="<?php echo $class_name ?>">
    <?php while ($tag_query->have_posts()) : $tag_query->the_post(); ?>
    <li>
        <?php get_template_part('template-parts/component/post-image-overlay'); ?>
    </li>
    <?php endwhile; ?>
  </ul>
</section>
<?php endif; ?>
<?php endforeach; ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php endif; ?>
