<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage katsumascore
 * @since 1.0.0
 */
$categories = get_categories(array(
  'orderby' => 'include',
  'include' => array('movie', 'anime', 'drama')
));
$taxonomies = get_taxonomies();
$rssLink = get_theme_mod('progression_studios_general_rss');
$twitterLink = get_theme_mod('progression_studios_general_twitter');
$facebookLink = get_theme_mod('progression_studios_general_facebook');
?>

<footer class="l-footer u-mt-12">
  <div class="l-container">
    <section>
      <dl>
        <dt class="u-mb-4">CATEGORIES</dt>
        <dd>
          <ul class="u-flex u-flex-wrap">
            <?php foreach ($categories as $category) : ?>
              <?php if ($category->parent == 0) : ?>
                <li class="c-list__termList">
                  <a href="<?php echo get_category_link($category->term_id); ?>">
                    <?php echo $category->name; ?>
                  </a>
                </li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </dd>
      </dl>
      <dl class="c-list__taxonomy u-mt-4">
        <?php
        foreach ($taxonomies as $taxonomy) :
          if ($taxonomy == 'vod') :
            $terms = get_terms(array(
              'taxonomy' => $taxonomy,
              'hide_empty' => false,
            ));
        ?>
            <dt class="u-mb-4">VOD</dt>
            <dd>
              <ul class="u-flex u-flex-wrap">
                <?php
                foreach ($terms as $term) :
                  $name = $term->name;
                  $slug = $term->slug;
                  $count = $term->count;
                  if ($slug !== 'theater' && $count !== 0) : ?>
                    <li class="c-list__termList">
                      <a href="<?php echo get_term_link($term->term_id, $taxonomy); ?>">
                        <?php echo $name; ?>
                      </a>
                    </li>
                  <?php endif; ?>
                <?php endforeach; ?>
              </ul>
            </dd>
          <?php endif; ?>
        <?php endforeach; ?>
      </dl>
    </section>
    <section class="u-mt-8">
      <?php get_template_part('template-parts/componentss/ListSocialIcon') ?>
      <div class="l-footer__support">
        <ul class="l-footer__help">
          <li><a href="/about"><?php echo pll_current_language() === 'en' ? 'About the Site' : 'サイトについて'; ?></a></li>
          <li><a href="/privacy-policy/">Privacy Policy</a></li>
          <li><a href="/contact"><?php echo pll_current_language() === 'en' ? 'Contact' : 'お問い合わせ'; ?></a>
          </li>
        </ul>
        <p class="u-ml-auto u-mt-auto">
          All Rights Reserved. Developed by Katsumascore.
        </p>
      </div>
    </section>
  </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>
