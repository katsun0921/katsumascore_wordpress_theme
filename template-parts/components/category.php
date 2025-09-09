<div class="c-category c-category__title">
<?php
$categories = get_the_category();
$cat_names = array();
if ( ! empty( $categories ) ) {
	foreach ( $categories as $category ) {
		$cat_names[] = esc_html( $category->name );
	}
	echo implode( ' ', $cat_names );
}
?>
</div>
