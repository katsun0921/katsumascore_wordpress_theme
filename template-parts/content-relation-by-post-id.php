<?php
//関連ページを表示するtemplate. Post Idに設定したページを表示します
$relation_filed = get_field('relation_filed');
if ($relation_filed) :
?>
<section class="u-mt-3">
  <h2 class="c-heading__related u-mb-3">関連ページ</h2>
  <ul class="u-flex u-flex-wrap">
    <?php foreach ((array) $relation_filed as $relation_post) :
        $relation_post_id = (int) $relation_post['release_post_id'];
        $relation_categories = get_the_category($relation_post_id);
        $image_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($relation_post_id), 'progression-studios-blog-background');
        $image =  $image_thumbnail[0];
      ?>
    <li class="l-post">
      <a class="l-postImageOverlay" href="<?php echo get_permalink($relation_post_id); ?>"
        style="<?php echo 'background-image: url(' . esc_url($image) . ')'; ?>">
        <?php if (get_the_category($relation_post_id)) : ?>
        <ul class="u-z-20 u-relative">
          <?php foreach ((array) $relation_categories as $relation_category) : ?>
          <li class="c-category c-category__small">
            <?php echo $relation_category->name; ?>
          </li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <div class="u-z-20 u-absolute u-right-1-5 u-top-1-5">
          <div class="c-score">
            <span class="c-score__count">
              <?php echo get_post_meta($relation_post_id, 'review_score', true); ?>
            </span>
          </div>
        </div>
        <div class="l-postImageOverlay__content">
          <div class="c-heading__post">
            <?php echo get_the_title($relation_post_id); ?>
          </div>
        </div>
      </a>
    </li>
    <?php endforeach; ?>
  </ul>
</section><!-- /.progression-blog-single-relation -->
<?php endif; ?>
