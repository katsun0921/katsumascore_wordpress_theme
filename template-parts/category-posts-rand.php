<?php if ( 'post' == get_post_type() ) : ?>
<?php // You might need to use wp_reset_postdata();
global $post;
$categories = get_the_category($post->ID);
$category_ids = array();
foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
$args=array(
  'category__in' => $category_ids,
	'post__not_in' => array($post->ID),
	'posts_per_page'=> 3, // Number of related posts that will be displayed.
	'orderby'=>'rand' // Randomize the posts
);
$category_query = new WP_Query( $args );
$class_name = count($category_query->posts) === 3 ? 'l-postRelated__3columns' : 'l-postRelated';
if( $category_query->have_posts() ) :
?>
<section class="u-mt-6">
  <h2 class="c-heading__related u-mb-3">
    <?php echo pll_current_language() === 'en' ? 'I recommend this option.' : 'こちらもおすすめです！' ?>
  </h2>
  <ul class="<?php echo $class_name ?>">
    <?php while ( $category_query->have_posts() ) : $category_query->the_post(); ?>
    <li>
      <?php get_template_part('template-parts/components/postImageOverlay'); ?>
    </li>
    <?php endwhile; ?>
  </ul>
</section>
<?php endif;
wp_reset_postdata();  ?>
<?php endif; ?>
