<?php

/**
 * The Header for our theme.
 *
 * @package pro
 * @since pro 1.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

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
  <script data-ad-client="ca-pub-6583700677059660" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php get_template_part('header/social', 'sharing'); ?>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php get_template_part('header/page', 'loader'); ?>
  <div id="boxed-layout-pro" <?php progression_studios_page_title(); ?>>

    <div id="progression-studios-header-position">
      <?php get_template_part('header/header', 'top'); ?>

      <div id="progression-studios-header-width">

        <header id="masthead-pro" class="progression-studios-site-header <?php echo esc_attr(get_theme_mod('progression_studios_nav_align', 'progression-studios-nav-center')); ?>">

          <div id="logo-nav-pro">

            <div class="width-container-pro progression-studios-logo-container">
              <h1 id="logo-pro" class="logo-inside-nav-pro noselect"><?php progression_studios_logo(); ?></h1>
              <?php if (function_exists('progression_studios_elements_social')) : ?><?php progression_studios_elements_social(); ?><?php endif; ?>
              <?php if (get_theme_mod('progression_studios_nav_search', 'on') == 'on') : ?><?php get_search_form(); ?><?php endif; ?>
            </div><!-- close .width-container-pro -->

            <div class="clearfix-pro"></div>

            <?php if (get_theme_mod('progression_studios_header_sticky', 'none-sticky-pro') == 'sticky-pro') : ?><div id="progression-sticky-header"><?php endif; ?>
              <?php progression_studios_navigation(); ?>
              <?php if (get_theme_mod('progression_studios_header_sticky', 'none-sticky-pro') == 'sticky-pro') : ?></div><!-- close #progression-sticky-header --><?php endif; ?>

          </div><!-- close #logo-nav-pro -->
          <?php get_template_part('header/mobile', 'navigation'); ?>

        </header>
      </div><!-- close #progression-studios-header-width -->

    </div><!-- close #progression-studios-header-position -->
