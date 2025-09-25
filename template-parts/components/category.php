<?php
  $id = $args['id'] ?? get_the_ID();
?>
<div class="c-category">
  <?php
  $categories = get_the_category($id);
  $cat_names = array();
  if (! empty($categories)) :
    foreach ($categories as $category) :
      $cat_names[] = esc_html($category->name);
    endforeach;
    $cat_names = array_reverse($cat_names);
    echo implode(' ', $cat_names);
  endif;
  ?>
</div>
