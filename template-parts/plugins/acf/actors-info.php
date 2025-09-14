<?php

/**
 * 登場人物・俳優情報表示コンポーネント
 *
 * @param int $post_id 投稿ID
 */

$post_id = $args['post_id'] ?? get_the_ID();

$actors_filed = get_field('actors_filed', $post_id);
?>

<?php if ($actors_filed) : ?>
  <dt class="u-font-bold u-text-lg">
    <?php echo pll_current_language() === 'en' ? 'Characters' : '登場人物'; ?>
  </dt>
  <dd class="u-pl-4">
    <dl>
      <?php foreach ($actors_filed as $actor_filed) : ?>
        <?php
        $actor_id = $actor_filed['actor'];
        $actor_filed_character = $actor_filed['character'];
        $actor_filed_description = $actor_filed['description'];
        $taxonomy_actor = 'actor';
        $term_actor = get_term_by('ID', $actor_id, $taxonomy_actor);
        $term_link_actor = get_term_link($actor_id, $taxonomy_actor);
        ?>
        <?php if ($actor_filed_character) : ?>
          <dt class="u-font-bold"><?php echo $actor_filed_character ?></dt>
        <?php endif ?>
        <dd class="u-pl-4">
          <?php if ($term_actor) : ?>
            <p>Actor: <a href="<?php echo esc_url($term_link_actor); ?>"><?php echo $term_actor->name ?></a></p>
            <?php
            $actor_posts = get_posts(array(
              'post_type' => 'post',
              'posts_per_page' => -1,
              'tax_query' => array(
                array(
                  'taxonomy' => 'actor',
                  'field' => 'term_id',
                  'terms' => $actor_id,
                ),
              ),
              'post__not_in' => array($post_id), // 現在の投稿を除外
            ));
            ?>
            <?php if ($actor_posts) : ?>
              <p><?php echo pll_current_language() === 'en' ? 'Other Works:' : '他の作品:'; ?></p>
              <ul class="u-list-disc u-ml-4">
                <?php foreach ($actor_posts as $actor_post) : ?>
                  <li>
                    <?php
                    // 対象の投稿IDのcharacterを取得
                    $actor_post_actors = get_field('actors_filed', $actor_post->ID);
                    $title = get_field(pll_current_language() === 'en' ? 'title_en' : 'title_jp', $actor_post->ID);
                    $characters = array();
                    if ($actor_post_actors) {
                      foreach ($actor_post_actors as $actor_post_actor) {
                        if ($actor_post_actor['actor'] == $actor_id && !empty($actor_post_actor['character'])) {
                          $characters[] = $actor_post_actor['character'];
                        }
                      }
                    }
                    ?>
                    <a href="<?php echo esc_url(get_permalink($actor_post->ID)); ?>">
                      <?php echo esc_html($title); ?>
                      <?php if (!empty($characters)): ?>
                        (<?php echo implode(', ', $characters); ?>)
                      <?php endif; ?>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          <?php endif ?>
          <?php if ($actor_filed_description) : ?>
            <p><?php echo $actor_filed_description ?></p>
          <?php endif ?>
        </dd>
      <?php endforeach ?>
    </dl>
  </dd>
<?php endif ?>