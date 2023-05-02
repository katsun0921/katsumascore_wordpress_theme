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
  function progression_studios_add_span_cat_count($links)
  {
    $links = str_replace('</a> (', ' <span class="count">', $links);

    $links = str_replace('(', '', $links);

    $links = str_replace(')', '</span></a>', $links);
    return $links;
  }
  add_filter('wp_list_categories', 'progression_studios_add_span_cat_count');

  function progression_studios_archive_count_span($links)
  {
    $links = str_replace('</a>&nbsp;(', ' <span class="count">', $links);
    $links = str_replace(')', '</span></a>', $links);
    return $links;
  }
  add_filter('get_archives_link', 'progression_studios_archive_count_span');

function progression_studios_category_title($title) {
  if (is_category()) {
    $title = single_cat_title('', false);
  } elseif (is_tag()) {
    $title = single_tag_title('', false);
  }
  return $title;
}
add_filter('get_the_archive_title', 'progression_studios_category_title');