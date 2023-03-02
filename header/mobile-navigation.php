<div id="main-nav-mobile">

  <?php if ( has_nav_menu( 'progression-studios-mobile-menu' ) ):  ?>
  <?php wp_nav_menu( array('theme_location' => 'progression-studios-mobile-menu', 'menu_class' => 'mobile-menu-pro', 'fallback_cb' => false, 'walker'  => new ProgressionFrontendWalker ) ); ?>
  <?php else: ?>
  <?php wp_nav_menu( array('theme_location' => 'progression-studios-primary', 'menu_class' => 'mobile-menu-pro', 'fallback_cb' => false, 'walker'  => new ProgressionFrontendWalker ) ); ?>
  <?php endif; ?>

  <div class="clearfix-pro"></div>
</div><!-- close #mobile-menu-container -->