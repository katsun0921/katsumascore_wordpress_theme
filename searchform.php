<?php
/**
 * The template for displaying search forms in progression
 *
 * @package pro
 */
?>
<form method="get" class="search-form c-search u-flex" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <label class="u-relative c-search__label">
    <span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'ratency-progression' ); ?></span>
    <input type="search" class="c-search__field"
      placeholder="<?php echo esc_attr_x( 'Enter a keyword to search...', 'placeholder', 'ratency-progression' ); ?>"
      value="<?php echo esc_attr( get_search_query() ); ?>" title="Search Keyword" name="s">
  </label>
  <input type="submit" class="search-submit c-search__submit"
    style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/magnifying-glass.png)" value="">
</form>
