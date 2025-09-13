<?php
$post_id = isset($post) ? $post->ID : null;
$template = 'template-parts';
?>

<?php get_header(); ?>

<?php  get_template_part($template . '/components/title', null, array('post_id' => $post_id, 'headingText' => '404 Error')); ?>

<main class="u-mb-50px u-relative u-pt-8">
  <div id="error-page-index">
    <div class="l-container">
      <h2><?php esc_html_e("Oops! That page can&rsquo;t be found.", 'ratency-progression'); ?></h2>
      <p>
        <?php esc_html_e("Sorry, We couldn&rsquo;t find the page you&rsquo;re looking for. Maybe Try one of the links in the navigation or a search.", 'ratency-progression'); ?>
      </p>
      <?php get_search_form(); ?>
    </div><!-- close .l-container -->
  </div><!-- close #error-page-index -->
</main><!-- #content-pro -->

<?php get_footer(); ?>
