<?php
$post_id = $post->ID;
$template = 'template-parts';
?>

<?php get_header(); ?>

<?php get_template_part($template . '/components/title', null, array('post_id' => $post_id, 'headingText' => get_the_title())); ?>

<main class="u-mt-12 u-relative">
  <div class=" l-container l-container__showSidebar">
    <section class="l-content ">
      <?php
      // 親ページのIDを取得
      $parent_page = get_page_by_path($post->post_name);
      if ($parent_page) :
        $child_pages = get_pages([
          'child_of' => $parent_page->ID,
          'sort_column' => 'post_date',
          'sort_order' => 'desc',
        ]);
        if ($child_pages) :
      ?>
          <ul class="u-flex u-flex-col u-gap-4">
            <?php foreach ($child_pages as $page) : ?>
              <li>
                <?php get_template_part('template-parts/components/post-image-left', null, array('id' => $page->ID)); ?>
              </li>
            <?php endforeach; ?>
          <?php endif; ?>
        <?php endif; ?>
          </ul>
    </section>
    <?php get_sidebar(); ?>
  </div>
</main>
<?php get_footer(); ?>
