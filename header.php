<?php

/**
 * The Header for our theme.
 */
?>
<!doctype html>
<html lang="<?php echo function_exists('pll_current_language') ? pll_current_language() : null ?>">

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
  gtag('set', {
    language: "<?php echo function_exists('pll_current_language') ? pll_current_language() : null ?>"
  })
  </script>
  <?php
  if (!is_preview() && !is_admin() && !is_404() && !is_search()) {
    // Google AdSense
  ?>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6583700677059660" crossorigin="anonymous"></script>
  <script async custom-element="amp-auto-ads" src="https://cdn.ampproject.org/v0/amp-auto-ads-0.1.js"></script>
  <?php } ?>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php get_template_part('header/social', 'sharing'); ?>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&family=Shippori+Mincho&display=swap"
    rel="stylesheet">
  <?php wp_head(); ?>
</head>

<body id="js-preloader" <?php body_class(); ?>>
  <!-- Google AdSense AMP -->
  <amp-auto-ads type="adsense" data-ad-client="ca-pub-6583700677059660"></amp-auto-ads>
  <?php get_template_part('header/page', 'loader'); ?>
  <header id="masthead-pro">
    <div class="l-header">
      <div class="l-header__logo">
        <h1 id="logo-pro" class="u-m-0 u-py-3 u-w-28 u-leading-none logo-inside-nav-pro noselect">
          <a href="<?php echo esc_url(pll_current_language() === 'en' ? '/en' : '/'); ?>" rel="home">
            <img src="<?php echo get_template_directory_uri(); ?>/images/logo-primary.png" alt="katsumascore"
              className="u-w-24" width="100" />
          </a>
        </h1>
      </div>
      <div class="l-header__search">
        <?php get_search_form(); ?>
      </div>
      <div class="l-header__snsLinks">
        <?php get_template_part('template-parts/components/ListSocialIcon') ?>
      </div>
    </div>
    <div class="l-navigation l-navigation--isDesktop">
      <div class="l-navigation__menuButton u-flex u-justify-center u-items-center u-gap-x-4">
        <button type="button" id="js-menu-button" class="c-hamburgerMenu">
          <span class="c-hamburgerMenu__lineContainer">
            <span class="c-hamburgerMenu__line"></span>
            <span class="c-hamburgerMenu__line"></span>
            <span class="c-hamburgerMenu__line"></span>
          </span>
          <span class="c-hamburgerMenu__label">MENU</span>
        </button>
      </div>
      <nav id="js-mobile-menu" class="l-navigation__list u-opacity-0">
        <?php wp_nav_menu(array('theme_location' => 'progression-studios-primary', 'menu_class' => 'c-list__header', 'fallback_cb' => false, 'walker'  => new ProgressionFrontendWalker)); ?>
      </nav>
    </div>

  </header>
