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
    <?php if (get_post_meta($post_id, 'original_title', true)) : ?>
    <dt class="u-font-bold u-text-lg">
      <?php echo pll_current_language() === 'en' ? 'Original Title' : '原題'; ?>
    </dt>
    <dd class="u-pl-4">
      <?php echo get_post_meta($post_id, 'original_title', true) ?>
    </dd>
    <?php endif ?>
    <?php if (get_post_meta($post_id, 'official_url', true)) : ?>
    <dt class="u-font-bold u-text-lg">
      <?php echo pll_current_language() === 'en' ? 'Original Site' : '公式サイト'; ?>
    </dt>
    <dd class="u-pl-4">
      <a href="<?php echo esc_url(get_post_meta($post_id, 'official_url', true)) ?>" target="_blank">
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
      <?php echo pll_current_language() === 'en' ? 'Production Companies' : '配給会社'; ?>
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
  <div class="u-mt-4 p-info__iframe">
    <?php if (get_post_meta($post_id, 'video_code', true)) : ?>
    <?php echo get_post_meta($post_id, 'video_code', true) ?>
    <?php endif ?>
  </div>
</section>