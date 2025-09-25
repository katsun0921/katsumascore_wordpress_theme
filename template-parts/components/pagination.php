<?php
global $wp_query;

// URLパラメータからページ番号を取得（デフォルトは1）
$current_page = max(1, get_query_var('page', get_query_var('paged', 1)));
$total_pages = $wp_query->max_num_pages;

if ($total_pages > 1) :
  $base_url = remove_query_arg(array('page', 'paged'));
  $mid_size = 3;

  // ページ番号リンクの範囲を計算
  $start_page = max(1, $current_page - $mid_size);
  $end_page = min($total_pages, $current_page + $mid_size);
?>
  <nav class="c-pagination" aria-label="Page Navigation">
    <ul class="nav-links">
      <?php
      // 前のページリンク
      if ($current_page > 1) :
        $prev_url = ($current_page - 1 == 1) ? $base_url : add_query_arg('page', $current_page - 1, $base_url);
      ?>
        <li>
          <a href="<?php echo esc_url($prev_url) ?>" class="page-numbers prev">« Prev</a>
        </li>
      <?php endif; ?>

      <?php
      // 最初のページ
      if ($start_page > 1) :
        $first_url = $base_url;
      ?>
        <li>
          <a href="<?php echo esc_url($first_url) ?>" class="page-numbers">1</a>
        </li>
        <?php if ($start_page > 2) : ?>
          <li>
            <span>...</span>
          </li>
        <?php endif; ?>
      <?php endif; ?>

      <?php
      // ページ番号リンク
      for ($i = $start_page; $i <= $end_page; $i++) : ?>
      <?php if ($i == $current_page) : ?>
          <li>
            <span class="page-numbers current" aria-current="page"><?php echo esc_html($i) ?></span>
          </li>
        <?php else :
          $page_url = ($i == 1) ? $base_url : add_query_arg('page', $i, $base_url);
        ?>
          <li>
            <a href="<?php echo esc_url($page_url) ?>" class="page-numbers"><?php echo esc_html($i) ?></a>
          </li>
        <?php endif; ?>
      <?php endfor; ?>

      <?php
      // 最後のページ
      if ($end_page < $total_pages) :
        if ($end_page < $total_pages - 1) :
      ?>
          <li>
            <span>...</span>
          </li>
        <?php endif; ?>

        <?php $last_url = add_query_arg('page', $total_pages, $base_url); ?>
        <li>
          <a href="<?php echo esc_url($last_url) ?>" class="page-numbers"><?php echo esc_html($total_pages) ?></a>
        </li>
      <?php endif; ?>

      <?php
      // 次のページリンク
      if ($current_page < $total_pages) :
        $next_url = add_query_arg('page', $current_page + 1, $base_url);
      ?>
        <li>
          <a href="<?php echo esc_url($next_url) ?>" class="page-numbers next">Next »</a>
        </li>
      <?php endif; ?>
    </ul>
  </nav>
<?php endif; ?>
