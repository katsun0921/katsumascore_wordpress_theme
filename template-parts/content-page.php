<?php

/**
 * The template used for displaying page content in page.php
 *
 * @package pro
 */
?>
<main id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <section class="p-content">
    <?php the_content(); ?>
  </section>
  <?php wp_link_pages(array(
		'before' => '<div class="c-pagination">' . esc_html__('Pages:', 'ratency-progression'),
		'after'  => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
	));
	?>
</main>