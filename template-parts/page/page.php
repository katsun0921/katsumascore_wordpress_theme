<?php

/**
 * The template used for displaying page content in page.php
 *
 * @package pro
 */
?>
<main id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <aside>
    <ul class="u-grid u-grid-cols-3 u-gap-8 u-mb-8 u-list-none">
      <li>
        <a href="https://px.a8.net/svt/ejp?a8mat=3TJ6EJ+BCFDRM+59RE+5ZU29" rel="nofollow">
          <img border="0" width="300" height="300" alt="" src="https://www23.a8.net/svt/bgt?aid=231002155686&wid=001&eno=01&mid=s00000024593001007000&mc=1"></a>
        <img border="0" width="1" height="1" src="https://www11.a8.net/0.gif?a8mat=3TJ6EJ+BCFDRM+59RE+5ZU29" alt="">
      </li>
      <li>
        <a href="https://px.a8.net/svt/ejp?a8mat=3T0HTG+7HPDTE+4EKC+61JSH" rel="nofollow">
          <img border="0" width="288" height="288" alt="" src="https://www23.a8.net/svt/bgt?aid=230130484453&wid=001&eno=01&mid=s00000020550001015000&mc=1"></a>
        <img border="0" width="1" height="1" src="https://www15.a8.net/0.gif?a8mat=3T0HTG+7HPDTE+4EKC+61JSH" alt="">
      </li>
      <li>
        <a
          class="u-block"
          href="<?php echo esc_url(empty($url) ? add_utm_parameters([
                  'url' => 'https://video-static.unext.jp/welcome',
                  'source' => 'katsumascore',
                  'medium' => 'affiliate',
                  'campaign' => 'u_next_signup'
                ]) : add_utm_parameters([
                  'url' => $url,
                  'source' => 'katsumascore',
                  'medium' => 'content',
                  'campaign' => 'u_next_watch'
                ])); ?>"
          target="_blank"
          rel="noopener noreferrer">
          <img
            src="<?php echo get_template_directory_uri() . '/images/vod/u-next.webp' ?>"
            alt="u-next"
            loading="lazy">
        </a>
      </li>
    </ul>
  </aside>
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
