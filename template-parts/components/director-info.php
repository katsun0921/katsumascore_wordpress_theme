<?php

/**
 * 監督情報表示コンポーネント
 *
 * @param int $post_id 投稿ID
 */

$post_id = $args['post_id'] ?? get_the_ID();

$directors = get_the_terms($post_id, 'director');
?>

<?php if ($directors) : ?>
  <dt class="u-font-bold u-text-lg">
    <?php echo pll_current_language() === 'en' ? 'Director' : '監督'; ?>
  </dt>
  <dd class="u-pl-4">
    <ul id="c-listMovie__multiple">
      <?php foreach ((array)$directors as $director) : ?>
        <li>
          <a href="<?php echo esc_url(get_term_link($director->term_id)); ?>"><?php echo $director->name; ?></a>
          <?php
          $director_posts = get_posts(array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'tax_query' => array(
              array(
                'taxonomy' => 'director',
                'field' => 'term_id',
                'terms' => $director->term_id,
              ),
            ),
            'post__not_in' => array($post_id), // 現在の投稿を除外
          ));
          ?>
          <?php if ($director_posts) : ?>
            <dl class="u-ml-3">
              <dt><?php echo pll_current_language() === 'en' ? 'Other Works' : '他の作品'; ?></dt>
              <dd>
                <ul class="u-list-disc">
                  <?php foreach ($director_posts as $director_post) : ?>
                    <li>
                      <a href="<?php echo esc_url(get_permalink($director_post->ID)); ?>">
                        <?php echo esc_html($director_post->post_title); ?>
                      </a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </dd>
            </dl>
          <?php endif; ?>
        </li>
      <?php endforeach; ?>
    </ul>
  </dd>
<?php endif ?>