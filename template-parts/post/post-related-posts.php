<?php if ('post' == get_post_type()) : ?>
  <?php
  $post_id = $args['post_id'] ?? get_the_ID();
  $relation_fields = get_field('relation_fields', $post_id);
  ?>
  <?php if ($relation_fields) : ?>
    <?php foreach ($relation_fields as $relation) : ?>
      <?php
      $relation_title = $relation['title'] ?? '';
      $relation_description = $relation['description'] ?? '';
      $relation_posts = $relation['posts'] ?? [];

      // 投稿が存在しない場合はスキップ
      if (empty($relation_posts)) continue;

      // 現在の投稿を除外
      $filtered_posts = array_filter($relation_posts, function ($post) use ($post_id) {
        return $post->ID != $post_id;
      });

      $class_name = count($filtered_posts) === 3 ? 'l-postRelated__3columns' : 'l-postRelated';
      ?>
      <?php if (!empty($filtered_posts)) : ?>
        <div>
          <h2 class="c-heading__related u-mb-3">
            <?php echo $relation_title ?>
          </h2>
          <?php if ($relation_description) : ?>
            <p><?php echo esc_html($relation_description); ?></p>
          <?php endif; ?>
          <ul class="<?php echo $class_name ?>">
            <?php foreach ($filtered_posts as $related_post) : ?>
              <li>
                <?php get_template_part('template-parts/components/post-image-overlay', null, array('id' => $related_post->ID)); ?>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  <?php endif; ?>
<?php endif; ?>
