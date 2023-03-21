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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&family=Sawarabi+Gothic&display=swap"
    rel="stylesheet">
  <?php wp_head(); ?>
</head>

<body id="js-preloader" <?php body_class(); ?>>
  <?php get_template_part('header/page', 'loader'); ?>
  <header id="masthead-pro">
    <div class="l-header">
      <div class="l-header__logo">
        <h1 id="logo-pro" class="u-m-0 u-py-3 u-w-28 u-leading-none logo-inside-nav-pro noselect">
          <a href="<?php echo esc_url('/'); ?>" rel="home">
            <img src="<?php echo get_template_directory_uri(); ?>/images/logo-primary.png" alt="katsumascore"
              className="u-w-24" width="100" />
          </a>
        </h1>
      </div>
      <div class="l-header__search">
        <?php get_search_form(); ?>
      </div>
      <?php
      $rssLink = get_theme_mod('progression_studios_general_rss');
      $twitterLink = get_theme_mod('progression_studios_general_twitter');
      $facebookLink = get_theme_mod('progression_studios_general_facebook');
      ?>
      <div class="l-header__snsLinks">
        <ul class="u-flex justify-between u-gap-x-5">
          <?php if ($rssLink) : ?>
          <li>
            <a href="<?php echo esc_url($rssLink); ?>" target="_blank"
              title="<?php echo esc_html__('RSS', 'progression-elements-ratency'); ?>">
              <img class="u-w-8" src="<?php echo get_template_directory_uri(); ?>/images/logo-rss.png" alt="rss"
                width="100" />
            </a>
          </li>
          <?php endif; ?>
          <?php if ($facebookLink) : ?>
          <li>
            <a href="<?php echo esc_url($facebookLink); ?>" target="_blank"
              title="<?php echo esc_html__('Facebook', 'progression-elements-ratency'); ?>">
              <img class="u-w-8" src="<?php echo get_template_directory_uri(); ?>/images/logo-facebook.png"
                alt="facebook" width="100" />
            </a>
          </li>
          <?php endif; ?>
          <?php if ($twitterLink) : ?>
          <li>
            <a href="<?php echo esc_url($twitterLink); ?>" target="_blank"
              title="<?php echo esc_html__('Twitter', 'progression-elements-ratency'); ?>">
              <img class="u-w-8" src="<?php echo get_template_directory_uri(); ?>/images/logo-twitter-blue-circle.png"
                alt="twitter" />
            </a>
          </li>
          <?php endif; ?>
        </ul><!-- close .progression-studios-header-social-icons -->
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
        <?php wp_nav_menu(array('theme_location' => 'progression-studios-primary', 'menu_class' => 'c-link__header', 'fallback_cb' => false, 'walker'  => new ProgressionFrontendWalker)); ?>
      </nav>
    </div>
  </header>