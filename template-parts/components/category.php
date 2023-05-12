<?php
/**
 * The Component for Category
 */
['size' => $size] = $args;
$sizeClass = $size ? 'c-category__' . $size : '';
$cats = get_the_category();
$cat = $cats[0];
?>

<div class="c-category <?php echo $sizeClass; ?>"><?php echo $cat->cat_name; ?></div>