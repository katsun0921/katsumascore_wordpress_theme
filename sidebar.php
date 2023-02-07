<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package pro
 * @since pro 1.0
 */

if ( ! is_active_sidebar( 'progression-studios-sidebar' ) ) {
	return;
}
?>

<div class="sidebar sticky-sidebar-progression">
		<?php dynamic_sidebar( 'progression-studios-sidebar' ); ?>
</div><!-- close .sidebar -->