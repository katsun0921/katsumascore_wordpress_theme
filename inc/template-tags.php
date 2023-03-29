<?php

/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package pro
 */


add_filter('progression_studios_filter_embeds', 'wp_oembed_get');

?>

<?php

  /* Modify Default Category Widget */
  add_filter('wp_list_categories', 'progression_studios_add_span_cat_count');
  function progression_studios_add_span_cat_count($links)
  {
    $links = str_replace('</a> (', ' <span class="count">', $links);

    $links = str_replace('(', '', $links);

    $links = str_replace(')', '</span></a>', $links);
    return $links;
  }

  add_filter('get_archives_link', 'progression_studios_archive_count_span');
  function progression_studios_archive_count_span($links)
  {
    $links = str_replace('</a>&nbsp;(', ' <span class="count">', $links);
    $links = str_replace(')', '</span></a>', $links);
    return $links;
  }





  function progression_studios_room_link()
  {
    global $post;
    ?>

<?php if (get_post_meta($post->ID, 'progression_studios_room_featured_image_link', true) == 'progression_link_url') : ?>

<a href="<?php echo esc_url(get_post_meta($post->ID, 'progression_studios_external_link', true)); ?>">
  <?php else : ?>

  <?php if (get_post_meta($post->ID, 'progression_studios_room_featured_image_link', true) == 'progression_link_url_new_window') : ?>

  <a href="<?php echo esc_url(get_post_meta($post->ID, 'progression_studios_external_link', true)); ?>" target="_blank">
    <?php else : ?>

    <?php if (get_post_meta($post->ID, 'progression_studios_room_featured_image_link', true) == 'progression_link_lightbox') : ?>

    <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); ?>
    <a href="<?php echo esc_attr($image[0]); ?>" data-rel="prettyPhoto" <?php $get_description = get_post(get_post_thumbnail_id())->post_excerpt;
                                                                                    if (!empty($get_description)) {
                                                                                      echo 'title="' . $get_description . '"';
                                                                                    } ?>>
      <?php else : ?>

      <?php if (get_post_meta($post->ID, 'progression_studios_room_featured_image_link', true) == 'progression_link_default') : ?>

      <a href="<?php the_permalink(); ?>">

        <?php endif; ?>

        <?php endif; ?>

        <?php endif; ?>

        <?php endif; ?>

        <?php
          }


          function progression_studios_blog_link()
          {
            global $post;
            ?>

        <?php if (get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) == 'progression_link_url') : ?>

        <a href="<?php echo esc_url(get_post_meta($post->ID, 'progression_studios_external_link', true)); ?>">
          <?php else : ?>

          <?php if (get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) == 'progression_link_url_new_window') : ?>

          <a href="<?php echo esc_url(get_post_meta($post->ID, 'progression_studios_external_link', true)); ?>"
            target="_blank">
            <?php else : ?>

            <?php if (get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) == 'progression_link_lightbox') : ?>

            <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); ?>
            <a href="<?php echo esc_attr($image[0]); ?>" data-rel="prettyPhoto" <?php $get_description = get_post(get_post_thumbnail_id())->post_excerpt;
                                                                                            if (!empty($get_description)) {
                                                                                              echo 'title="' . $get_description . '"';
                                                                                            } ?>>
              <?php else : ?>

              <?php if (get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) == 'progression_lightbox_video') : ?>

              <a href="<?php echo esc_url(get_post_meta($post->ID, 'progression_studios_external_link', true)); ?>"
                data-rel="prettyPhoto"
                <?php $get_description = get_post(get_post_thumbnail_id())->post_excerpt;
                                                                                                                                                          if (!empty($get_description)) {
                                                                                                                                                            echo 'title="' . $get_description . '"';
                                                                                                                                                          } ?>>
                <?php else : ?>

                <a href="<?php the_permalink(); ?>">

                  <?php endif; ?>

                  <?php endif; ?>

                  <?php endif; ?>

                  <?php endif; ?>

                  <?php
                    }





                    function progression_studios_room_post_title()
                    {
                      global $post;
                      ?>

                  <?php if (get_post_meta($post->ID, 'progression_studios_room_featured_image_link', true) == 'progression_link_url') : ?>

                  <a href="<?php echo esc_url(get_post_meta($post->ID, 'progression_studios_external_link', true)); ?>">

                    <?php else : ?>

                    <?php if (get_post_meta($post->ID, 'progression_studios_room_featured_image_link', true) == 'progression_link_url_new_window') : ?>

                    <a href="<?php echo esc_url(get_post_meta($post->ID, 'progression_studios_external_link', true)); ?>"
                      target="_blank">

                      <?php else : ?>

                      <?php if (get_post_meta($post->ID, 'progression_studios_room_featured_image_link', true) == 'progression_link_default') : ?>
                      <a href="<?php the_permalink(); ?>">
                        <?php endif; ?>

                        <?php endif; ?>

                        <?php endif; ?>

                        <?php
                          }




                          function progression_studios_blog_post_title()
                          {
                            global $post;
                            ?>

                        <?php if (get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) == 'progression_link_url') : ?>

                        <a
                          href="<?php echo esc_url(get_post_meta($post->ID, 'progression_studios_external_link', true)); ?>">

                          <?php else : ?>

                          <?php if (get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) == 'progression_link_url_new_window') : ?>

                          <a href="<?php echo esc_url(get_post_meta($post->ID, 'progression_studios_external_link', true)); ?>"
                            target="_blank">

                            <?php else : ?>

                            <a href="<?php the_permalink(); ?>">

                              <?php endif; ?>

                              <?php endif; ?>

                              <?php
                                }








                                function progression_studios_room_index_gallery()
                                {
                                  ?>
                              <?php global $post;
                                    if (get_post_meta($post->ID, 'progression_studios_room_featured_image_link', true) == 'progression_link_url') : ?>
                              href="<?php echo esc_url(get_post_meta($post->ID, 'progression_studios_external_link', true)); ?>"
                              <?php else : ?>

                              <?php if (get_post_meta($post->ID, 'progression_studios_room_featured_image_link', true) == 'progression_link_url_new_window') : ?>
                              href="<?php echo esc_url(get_post_meta($post->ID, 'progression_studios_external_link', true)); ?>"
                              target="_blank"

                              <?php else : ?>

                              <?php if (get_post_meta($post->ID, 'progression_studios_room_featured_image_link', true) == 'progression_lightbox_video') : ?>

                              href="<?php echo esc_url(get_post_meta($post->ID, 'progression_studios_external_link', true)); ?>"
                              data-rel="prettyPhoto"
                              <?php $get_description = get_post(get_post_thumbnail_id())->post_excerpt;
                                          if (!empty($get_description)) {
                                            echo 'title="' . $get_description . '"';
                                          } ?>

                              <?php else : ?>
                              <?php if (get_post_meta($post->ID, 'progression_studios_room_featured_image_link', true) == 'progression_link_default') : ?>

                              href="<?php the_permalink(); ?>"

                              <?php endif; ?>


                              <?php endif; ?>

                              <?php endif; ?>

                              <?php endif; ?>

                              <?php
                                }



                                function progression_studios_blog_index_gallery()
                                {
                                  ?>
                              <?php global $post;
                                    if (get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) == 'progression_link_url') : ?>
                              href="<?php echo esc_url(get_post_meta($post->ID, 'progression_studios_external_link', true)); ?>"
                              <?php else : ?>

                              <?php if (get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) == 'progression_link_url_new_window') : ?>
                              href="<?php echo esc_url(get_post_meta($post->ID, 'progression_studios_external_link', true)); ?>"
                              target="_blank"

                              <?php else : ?>

                              <?php if (get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) == 'progression_lightbox_video') : ?>

                              href="<?php echo esc_url(get_post_meta($post->ID, 'progression_studios_external_link', true)); ?>"
                              data-rel="prettyPhoto"
                              <?php $get_description = get_post(get_post_thumbnail_id())->post_excerpt;
                                          if (!empty($get_description)) {
                                            echo 'title="' . $get_description . '"';
                                          } ?>

                              <?php else : ?>

                              href="<?php the_permalink(); ?>"

                              <?php endif; ?>

                              <?php endif; ?>

                              <?php endif; ?>

                              <?php
                                  }




                                  /* remove more link jump */
                                  function progression_studios_remove_more_link_scroll($link)
                                  {
                                    $link = preg_replace('|#more-[0-9]+|', '', $link);
                                    return $link;
                                  }
                                  add_filter('the_content_more_link', 'progression_studios_remove_more_link_scroll');




                                  if (!function_exists('progression_studios_show_pagination_links_pro')) :
                                    function progression_studios_show_pagination_links_pro()
                                    {
                                      global $wp_query;

                                      $page_tot   = $wp_query->max_num_pages;
                                      $page_cur   = get_query_var('paged');
                                      $big        = 999999999;

                                      if ($page_tot == 1) return;

                                      echo paginate_links(
                                        array(
                                          'base'      => str_replace($big, '%#%', get_pagenum_link(999999999, false)), // need an unlikely integer cause the url can contains a number
                                          'format'    => '?paged=%#%',
                                          'current'   => max(1, $page_cur),
                                          'total'     => $page_tot,
                                          'prev_next' => true,
                                          'prev_text'    => '<span>' . esc_html__('&lsaquo; Previous', 'ratency-progression') . '</span>',
                                          'next_text'    => '<span>' . esc_html__('Next &rsaquo;', 'ratency-progression') . '</span>',
                                          'end_size'  => 1,
                                          'mid_size'  => 2,
                                          'type'      => 'list'
                                        )
                                      );
                                    }
                                  endif;





                                  if (!function_exists('progression_studios_show_pagination_links_blog')) :
                                    function progression_studios_show_pagination_links_blog()
                                    {
                                      global $blogloop;

                                      $page_tot   = $blogloop->max_num_pages;
                                      if (get_query_var('paged')) {
                                        $paged = get_query_var('paged');
                                      } else if (get_query_var('page')) {
                                        $paged = get_query_var('page');
                                      } else {
                                        $paged = 1;
                                      }
                                      $big        = 999999999;

                                      if ($page_tot == 1) return;

                                      echo paginate_links(
                                        array(
                                          'base'      => str_replace($big, '%#%', get_pagenum_link(999999999, false)), // need an unlikely integer cause the url can contains a number
                                          'format'    => '?paged=%#%',
                                          'current'   => max(1, $paged),
                                          'total'     => $page_tot,
                                          'prev_next' => true,
                                          'prev_text'    => '<span>' . esc_html__('&lsaquo; Previous', 'ratency-progression') . '</span>',
                                          'next_text'    => '<span>' . esc_html__('Next &rsaquo;', 'ratency-progression') . '</span>',
                                          'end_size'  => 1,
                                          'mid_size'  => 2,
                                          'type'      => 'list'
                                        )
                                      );
                                    }
                                  endif;







                                  if (!function_exists('progression_studios_infinite_content_nav_pro')) :
                                    /**
                                     * Displays navigation to next/previous pages when applicable.
                                     *
                                     * @since Twenty Twelve 1.0
                                     */
                                    function progression_studios_infinite_content_nav_pro($html_id)
                                    {
                                      global $wp_query;

                                      $html_id = esc_attr($html_id);

                                      if ($wp_query->max_num_pages > 1) : ?>
                              <div id="infinite-nav-pro-default" class="infinite-nav-pro">
                                <div class="nav-previous">
                                  <?php next_posts_link(wp_kses(__('Load More <span><i class="fa fa-arrow-circle-down"></i></span>', 'ratency-progression'), TRUE)); ?>
                                </div>
                              </div>
                              <?php endif;
                                    }
                                  endif;




                                  function progression_studios_category_title($title)
                                  {
                                    if (is_category()) {

                                      $title = single_cat_title('', false);
                                    } elseif (is_tag()) {

                                      $title = single_tag_title('', false);
                                    }

                                    return $title;
                                  }
                                  add_filter('get_the_archive_title', 'progression_studios_category_title');



                                  /**
                                   * Returns true if a blog has more than 1 category.
                                   *
                                   * @return bool
                                   */
                                  function progression_studios_categorized_blog()
                                  {
                                    if (false === ($all_the_cool_cats = get_transient('progression_studios_categories'))) {
                                      // Create an array of all the categories that are attached to posts.
                                      $all_the_cool_cats = get_categories(array(
                                        'fields'     => 'ids',
                                        'hide_empty' => 1,

                                        // We only need to know if there is more than one category.
                                        'number'     => 2,
                                      ));

                                      // Count the number of categories that are attached to the posts.
                                      $all_the_cool_cats = count($all_the_cool_cats);

                                      set_transient('progression_studios_categories', $all_the_cool_cats);
                                    }

                                    if ($all_the_cool_cats > 1) {
                                      // This blog has more than 1 category so progression_studios_categorized_blog should return true.
                                      return true;
                                    } else {
                                      // This blog has only 1 category so progression_studios_categorized_blog should return false.
                                      return false;
                                    }
                                  }



                                  /**
                                   * Flush out the transients used in progression_studios_categorized_blog.
                                   */
                                  function progression_studios_category_transient_flusher()
                                  {
                                    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
                                      return;
                                    }
                                    // Like, beat it. Dig?
                                    delete_transient('progression_studios_categories');
                                  }
                                  add_action('edit_category', 'progression_studios_category_transient_flusher');
                                  add_action('save_post',     'progression_studios_category_transient_flusher');