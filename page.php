<?php

/**
 *
 * @package pro
 * @since pro 1.0
 */
get_header(); ?>


<?php if (!get_post_meta($post->ID, 'progression_studios_disable_page_title', true)) : ?>
  <div id="page-title-pro">
    <div class="width-container-pro">
      <div id="progression-studios-page-title-container">
        <?php the_title('<h1 class="page-title">', '</h1>'); ?>
        <?php if (get_post_meta($post->ID, 'progression_studios_sub_title', true)) : ?><h4 class="progression-sub-title"><?php echo wp_kses(get_post_meta($post->ID, 'progression_studios_sub_title', true), true); ?></h4><?php endif; ?>
      </div><!-- close #progression-studios-page-title-container -->
      <div class="clearfix-pro"></div>
    </div><!-- close .width-container-pro -->
    <?php if (function_exists('bcn_display')) {
      echo '<ul id="breadcrumbs-progression-studios"><li><a href="';
      echo esc_url(home_url('/'));
      echo '"><i class="fa fa-home"></i> </a></li>';
      bcn_display_list();
      echo '</ul>';
    } ?>
  </div><!-- #page-title-pro -->
<?php endif; ?>


<div id="content-pro">
  <div class="width-container-pro<?php if (get_post_meta($post->ID, 'progression_studios_page_sidebar', true) == 'left-sidebar') : ?> left-sidebar-pro<?php endif; ?>">
  <?php get_template_part('template-parts/date'); ?>

    <?php while (have_posts()) : the_post(); ?>
      <?php get_template_part('template-parts/content', 'page'); ?>
    <?php endwhile; ?>

    <div class="clearfix-pro"></div>
  </div><!-- close .width-container-pro -->
</div><!-- #content-pro -->

<?php get_footer(); ?>
