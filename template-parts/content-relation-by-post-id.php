<?php
//関連ページを表示するtemplate. Post Idに設定したページを表示します
$relation_filed = get_field('relation_filed');
if ($relation_filed) :
$class_name = count($relation_filed) === 3 ? 'l-postRelated__3columns' : 'l-postRelated';
?>
<section class="u-mt-3">
  <h2 class="c-heading__related u-mb-3">関連ページ</h2>
  <ul class="<?php echo $class_name; ?>">
    <?php foreach ((array) $relation_filed as $relation_post) :
        $relation_post_id = (int) $relation_post['release_post_id'];
        $relation_categories = get_the_category($relation_post_id);
        $image_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($relation_post_id), 'progression-studios-blog-background');
        $image =  $image_thumbnail[0];
      ?>
    <li>
      <?php get_template_part( 'template-parts/content-related' ); ?>
    </li>
    <?php endforeach; ?>
  </ul>
</section><!-- /.progression-blog-single-relation -->
<?php endif; ?>