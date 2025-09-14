<div class="c-pagination">
  <?php
  the_posts_pagination(array(
    'mid_size' => 3,
    'prev_text' => __('« Prev'),
    'next_text' => __('Next »'),
    'screen_reader_text' => 'Page Navigation',
  ));
  ?>
</div>
