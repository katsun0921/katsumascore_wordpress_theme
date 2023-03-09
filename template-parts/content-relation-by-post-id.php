<?php
//関連ページを表示するtemplate. Post Idに設定したページを表示します
$relation_filed = get_field('relation_filed');
if ($relation_filed) :
?>
<section class="progression-blog-single-relation">
  <h2 class="progression-blog-single-relation-heading">関連ページ</h2>
  <ul class="progression-blog-single-relation-lists">
    <?php foreach ((array) $relation_filed as $relation_post) :
        $relation_post_id = (int) $relation_post['release_post_id'];
        $relation_categories = get_the_category($relation_post_id);
        $image_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($relation_post_id), 'progression-studios-blog-background');
        $image =  $image_thumbnail[0];
      ?>
    <li class="progression-blog-single-relation-list"
      style="<?php echo "background-image: url(" . esc_url($image) . ")"; ?>">
      <a href="<?php echo get_permalink($relation_post_id); ?>">
        <?php if (get_the_category($relation_post_id)) : ?>
        <ul class="progression-blog-single-relation-category-lists">
          <?php foreach ((array) $relation_categories as $relation_category) : ?>
          <li class="progression-blog-single-relation-category-list">
            <?php echo $relation_category->name; ?>
          </li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <div class="progression-blog-single-relation-content">
          <div class="progression-blog-single-relation-score">
            <div class="progression-blog-single-relation-score-value">
              <?php echo get_post_meta($relation_post_id, 'review_score', true); ?>
            </div>
          </div>
          <div class="progression-blog-single-relation-title">
            <?php echo get_the_title($relation_post_id); ?>
          </div>
          <div class="progression-blog-single-relation-date">
            <?php echo get_the_date('Y/m/d', $relation_post_id); ?>
          </div>
        </div>
      </a>
    </li>
    <?php endforeach; ?>
  </ul>
</section><!-- /.progression-blog-single-relation -->
<?php endif; ?>