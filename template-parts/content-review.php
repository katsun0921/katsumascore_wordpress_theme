<div class="progression-blog-review-content">

  <div class="progression-blog-review-rating-container">
    <?php if (get_post_meta($post->ID, 'review_score', true)) : ?>
    <div class="progression-studios-hexagon-border">
      <div class="progression-blog-review-total">
        <?php echo esc_attr(get_post_meta($post->ID, 'review_score', true)); ?>
      </div>
    </div>
    <?php endif; ?>

  </div>

  <div class="progression-blog-review-text-container">

    <?php if (get_the_excerpt($post->ID, true)) : ?>
    <div class="progression-blog-review-summary">
      <?php echo sprintf(wp_kses(get_the_excerpt($post->ID, true), true)); ?>
    </div>
    <?php endif; ?>
  </div>
  <div class="clearfix-pro"></div>

  <dl class="lastcolumn-progression">
    <!-- original-title -->
    <?php if (get_post_meta($post->ID, 'original_title', true)) : ?>
    <dt>原題</dt>
    <dd class="progression-studios-blog-review-original-title">
      <?php echo get_post_meta($post->ID, 'original_title', true) ?>
    </dd>
    <?php endif ?>
    <?php if (get_post_meta($post->ID, 'official_url', true)) : ?>
    <dt>公式サイト</dt>
    <dd class="progression-studios-blog-review-original-title">
      <a href="<?php echo esc_url(get_post_meta($post->ID, 'official_url', true)) ?>" target="_blank">
        <?php echo get_post_meta($post->ID, 'official_url', true) ?>
      </a>
    </dd>
    <?php endif ?>
    <?php if (get_post_meta($post->ID, 'release_date', true)) : ?>
    <dt>上映日・配信日</dt>
    <dd class="progression-studios-blog-review-original-title"><?php echo get_field('release_date') ?></dd>
    <?php endif ?>
    <?php $directors = get_the_terms($post->ID, 'director') ?>
    <?php if ($directors) : ?>
    <dt><?php echo get_taxonomy('director')->label ?></dt>
    <dd>
      <ul id="progression-studios-blog-review-category">
        <?php foreach ((array)$directors as $director) : ?>
        <li><a href="<?php echo esc_url(get_term_link($director->term_id)); ?>"><?php echo $director->name; ?></a></li>
        <?php endforeach; ?>
      </ul>
    </dd>
    <?php endif ?>
    <?php
    $actors_filed = get_field('actors_filed');
    if ($actors_filed) :
    ?>
    <dt>登場人物</dt>
    <dd>
      <?php foreach ($actors_filed as $actor_filed) : ?>
      <?php
          $actor_id = $actor_filed['actor'];
          $actor_filed_character = $actor_filed['character'];
          $actor_filed_description = $actor_filed['description'];
          $taxonomy_actor = 'actor';
          $term_actor = get_term_by('ID', $actor_id, $taxonomy_actor);
          $term_link_actor = get_term_link($actor_id, $taxonomy_actor);
          ?>
      <dl style="margin: 0px; font-size: 14px;">
        <?php if ($actor_filed_character) : ?>
        <dt><?php echo $actor_filed_character ?></dt>
        <?php endif ?>
        <dd style="margin-left: 1em;">
          <?php if ($term_actor) : ?>
          <p style="margin: 0px;">演: <a
              href="<?php echo esc_url($term_link_actor); ?>"><?php echo $term_actor->name ?></a></p>
          <? endif ?>
          <?php if ($actor_filed_description) : ?>
          <p style="margin: 0px;"><?php echo $actor_filed_description ?></p>
          <?php endif ?>
        <dd>
      </dl>
      <?php endforeach ?>
    </dd>
    <?php endif ?>

    <?php $film_studios = get_the_terms($post->ID, 'film_studio') ?>
    <?php if ($film_studios) : ?>
    <dt><?php echo get_taxonomy('film_studio')->label ?></dt>
    <dd>
      <ul id="progression-studios-blog-review-category">
        <?php foreach ((array)$film_studios as $film_studio) : ?>
        <li>
          <a href="<?php echo esc_url(get_term_link($film_studio->term_id)); ?>"><?php echo $film_studio->name; ?></a>
        </li>
        <?php endforeach; ?>
      </ul>
    </dd>
    <?php endif ?>
    <?php $production_studios = get_the_terms($post->ID, 'production_studio') ?>
    <?php if ($production_studios) : ?>
    <dt><?php echo get_taxonomy('production_studio')->label ?></dt>
    <dd>
      <ul id="progression-studios-blog-review-category">
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
  <div class="clearfix-pro"></div>
  <?php if (get_post_meta($post->ID, 'video_code', true)) : ?>
  <?php echo get_post_meta($post->ID, 'video_code', true) ?>
  <?php endif ?>

</div><!-- close .progression-blog-review-content -->