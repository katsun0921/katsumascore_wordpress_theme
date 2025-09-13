<?php
// 基本情報を表示するテンプレート
$post_id = $post->ID;

$date_string = get_post_meta($post_id, 'release_date', true);
$release_date = $date_string ? DateTime::createFromFormat('Ymd', $date_string) : null;

?>
<section class="p-info u-mb-12">

  <?php if (get_post_meta($post_id, 'review_score', true)) : ?>
    <div class="p-info__score">
      <div class="c-score c-score__large">
        <div class="c-score__count">
          <?php echo esc_attr(get_post_meta($post_id, 'review_score', true)); ?>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if (get_the_excerpt($post_id, true)) : ?>
    <div>
      <p><?php echo get_the_excerpt($post_id, true); ?></p>
    </div>
  <?php endif; ?>

  <dl class="p-info__detail">
    <!-- original-title -->
    <?php if (get_post_meta($post_id, 'title_en', true)) : ?>
      <dt class="u-font-bold u-text-lg">
        <?php echo pll_current_language() === 'en' ? 'Title' : '原題'; ?>
      </dt>
      <dd class="u-pl-4">
        <?php echo get_post_meta($post_id, 'title_en', true) ?>
      </dd>
    <?php endif ?>
    <?php if (get_post_meta($post_id, 'official_url', true)) : ?>
      <dt class="u-font-bold u-text-lg">
        <?php echo pll_current_language() === 'en' ? 'Original Site' : '公式サイト'; ?>
      </dt>
      <dd class="u-pl-4">
        <a
          href="<?php echo esc_url(get_post_meta($post_id, 'official_url', true)) ?>"
          target="_blank">
          <?php echo get_post_meta($post_id, 'official_url', true) ?>
        </a>
      </dd>
    <?php endif ?>
    <?php if ($release_date) : ?>
      <dt class="u-font-bold u-text-lg">
        <?php echo pll_current_language() === 'en' ? 'Screening and distribution dates' : '上映日・配信日'; ?>
      </dt>
      <dd class="u-pl-4">
        <?php echo pll_current_language() === 'en' ? $release_date->format('j M, Y') : $release_date->format('Y年m月d日'); ?>
      </dd>
    <?php endif ?>
    <?php $directors = get_the_terms($post_id, 'director') ?>
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
    <?php
    $actors_filed = get_field('actors_filed');
    if ($actors_filed) :
    ?>
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

              <? endif ?>
              <?php if ($actor_filed_description) : ?>
                <p><?php echo $actor_filed_description ?></p>
              <?php endif ?>
            <dd>
            <?php endforeach ?>
        </dl>
      </dd>
    <?php endif ?>

    <?php $film_studios = get_the_terms($post_id, 'film_studio') ?>
    <?php if ($film_studios) : ?>
      <dt class="u-font-bold u-text-lg">
        <?php echo pll_current_language() === 'en' ? 'Distributed by' : '配給会社'; ?>
      </dt>
      <dd class="u-pl-4">
        <ul class="c-listMovie__multiple">
          <?php foreach ((array)$film_studios as $film_studio) : ?>
            <li>
              <a href="<?php echo esc_url(get_term_link($film_studio->term_id)); ?>"><?php echo $film_studio->name; ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
      </dd>
    <?php endif ?>
    <?php $production_studios = get_the_terms($post_id, 'production_studio') ?>
    <?php if ($production_studios) : ?>
      <dt class="u-font-bold u-text-lg">
        <?php echo pll_current_language() === 'en' ? 'Production Companies' : '制作会社'; ?>
      <dd class="u-pl-4">
        <ul class="c-listMovie__multiple">
          <?php foreach ((array)$production_studios as $production_studio) : ?>
            <li>
              <a href="<?php echo esc_url(get_term_link($production_studio->term_id)); ?>">
                <?php echo $production_studio->name; ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>

      </dd>
    <?php endif ?>
  </dl>
  <?php if (get_post_meta($post_id, 'video_code', true)) : ?>
    <div class="u-mt-4 p-info__iframe">
      <?php echo get_post_meta($post_id, 'video_code', true) ?>
    </div>
  <?php endif ?>
</section>
