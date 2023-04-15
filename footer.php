<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 */
?>

<footer id="site-footer"
  class="progression-studios-footer-normal-width <?php echo esc_attr(get_theme_mod('progression_studios_footer_copyright_location', 'footer-copyright-align-left')); ?>">
  <div id="progression-studios-copyright">
    <div id="copyright-divider-top"></div>
    <div class="l-container">
      <div id="copyright-text">
        <?php echo wp_kses(get_theme_mod('progression_studios_footer_copyright', 'All Rights Reserved. Developed by Progression Studios'), true); ?>
      </div>
    </div> <!-- close .l-container -->
  </div><!-- close #progression-studios-copyright -->
</footer>

<a href="#0" id="pro-scroll-top"><?php esc_html_e('Scroll to top', 'ratency-progression'); ?></a>

<?php wp_footer(); ?>
</body>

</html>