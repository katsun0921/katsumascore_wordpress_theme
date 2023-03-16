<?php

/**
 * The Header for our theme.
 */
?>
<!doctype html>
<html lang="ja">

<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-NE4K3EM3VB"></script>
  <script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', 'G-NE4K3EM3VB');
  </script>
  <!-- Google AdSense -->
  <script data-ad-client="ca-pub-6583700677059660" async
    src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php get_template_part('header/social', 'sharing'); ?>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <?php wp_head(); ?>
</head>

<body id="js-preloader" <?php body_class(); ?>>
  <?php get_template_part('header/page', 'loader'); ?>
  <header id="masthead-pro" class="l-header">
    <div class="l-container progression-studios-logo-container u-z-50">
      <div class="l-header__logo">
        <h1 id="logo-pro" class="u-m-0 u-py-3 u-w-28 u-leading-none logo-inside-nav-pro noselect">
        </h1>
      </div>
      <div>
        <?php get_search_form(); ?>
      </div>
      <?php
            $rssLink = get_theme_mod('progression_studios_general_rss')
          ?>
      <div>
        <ul class="u-flex justify-between u-gap-x-5">
          <?php if ($rssLink) : ?>
          <li>
            <a href="<?php echo esc_url($rssLink); ?>" target="_blank" class="c-icon c-icon__header"
              title="<?php echo esc_html__( 'RSS', 'progression-elements-ratency' ); ?>">
              <?php get_template_part('icons/rss') ?>
            </a>
          </li>
          <?php endif; ?>
          <?php if (get_theme_mod( 'progression_studios_header_facebook')) : ?>
          <li>
            <a href="<?php echo esc_url(get_theme_mod('progression_studios_general_facebook')); ?>" target="_blank"
              class="c-icon c-icon__header"
              title="<?php echo esc_html__( 'Facebook', 'progression-elements-ratency' ); ?>">
            </a>
          </li>
          <?php endif; ?>
          <?php if (get_theme_mod( 'progression_studios_general_twitter')) : ?><li>
            <a href="<?php echo esc_url(get_theme_mod('progression_studios_general_twitter')); ?>" target="_blank"
              class="c-icon c-icon__header"
              title="<?php echo esc_html__( 'Twitter', 'progression-elements-ratency' ); ?>">
              <?php get_template_part('icons/twitter') ?>
            </a>
          </li>
          <?php endif; ?>
        </ul><!-- close .progression-studios-header-social-icons -->
      </div>
    </div>
    <!-- close .l-container -->

    <?php if (get_theme_mod('progression_studios_header_sticky', 'none-sticky-pro') == 'sticky-pro') : ?>
    <div id="progression-sticky-header">
      <?php endif; ?>
      <?php progression_studios_navigation(); ?>
      <?php if (get_theme_mod('progression_studios_header_sticky', 'none-sticky-pro') == 'sticky-pro') : ?>
    </div><!-- close #progression-sticky-header -->
    <?php endif; ?>

    <?php get_template_part('header/mobile', 'navigation'); ?>
  </header>