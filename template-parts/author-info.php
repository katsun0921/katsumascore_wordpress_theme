<div">
  <div>
    <a
      href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_avatar( get_the_author_meta('user_email'), $size = '200'); ?></a>
    <h5 class="author-heading"><?php the_author_posts_link(); ?></h5>
    <?php if(get_the_author_meta('progression_user_sub_headline')) : ?><h6 class="sub-author-heading">
      <?php echo get_the_author_meta('progression_user_sub_headline'); ?></h6><?php endif; ?>



  </div>
  <?php
		$current_user = wp_get_current_user();
		if ($post->post_author == $current_user->ID ) : ?>
  <a href="<?php echo get_edit_user_link(); ?>">
    <?php esc_html_e( 'Edit Profile', 'ratency-progression' ); ?>
  </a>
  <?php endif; ?>

  <?php echo the_author_meta('description'); ?>
  <ul>
    <?php if(get_the_author_meta('progression_authorurl')) : ?><li><a
        href="<?php echo get_the_author_meta('progression_authorurl'); ?>" target="_blank" class="author-pro"><i
          class="fa fa-wpforms"></i><span><?php esc_html_e( 'Author', 'ratency-progression' ); ?></span></a></li>
    <?php endif; ?>
    <?php if(get_the_author_meta('progression_facebookurl')) : ?><li><a
        href="<?php echo get_the_author_meta('progression_facebookurl'); ?>" target="_blank" class="facebook-pro"><i
          class="fa fa-facebook"></i><span><?php esc_html_e( 'Facebook', 'ratency-progression' ); ?></span></a></li>
    <?php endif; ?>
    <?php if(get_the_author_meta('progression_twitterurl')) : ?><li><a
        href="<?php echo get_the_author_meta('progression_twitterurl'); ?>" target="_blank" class="twitter-pro"><i
          class="fa fa-twitter"></i><span><?php esc_html_e( 'Twitter', 'ratency-progression' ); ?></span></a></li>
    <?php endif; ?>
    <?php if(get_the_author_meta('progression_dribbbleurleurl')) : ?><li><a
        href="<?php echo get_the_author_meta('progression_dribbbleurleurl'); ?>" target="_blank" class="dribbble-pro"><i
          class="fa fa-dribbble"></i><span><?php esc_html_e( 'Dribbble', 'ratency-progression' ); ?></span></a></li>
    <?php endif; ?>

    <?php if(get_the_author_meta('progression_linkedinurl')) : ?><li><a
        href="<?php echo get_the_author_meta('progression_linkedinurl'); ?>" target="_blank" class="linkedin-pro"><i
          class="fa fa-linkedin"></i><span><?php esc_html_e( 'LinkedIn', 'ratency-progression' ); ?></span></a></li>
    <?php endif; ?>
    <?php if(get_the_author_meta('progression_pinteresturl')) : ?><li><a
        href="<?php echo get_the_author_meta('progression_pinteresturl'); ?>" target="_blank" class="pinterest-pro"><i
          class="fa fa-pinterest"></i><span><?php esc_html_e( 'Pinterest', 'ratency-progression' ); ?></span></a></li>
    <?php endif; ?>
    <?php if(get_the_author_meta('progression_googleplusurl')) : ?><li><a
        href="<?php echo get_the_author_meta('progression_googleplusurl'); ?>" target="_blank" class="google-pro"><i
          class="fa fa-google-plus"></i><span><?php esc_html_e( 'Google+', 'ratency-progression' ); ?></span></a></li>
    <?php endif; ?>
    <?php if(get_the_author_meta('progression_instagramurl')) : ?><li><a
        href="<?php echo get_the_author_meta('progression_instagramurl'); ?>" target="_blank" class="instagram-pro"><i
          class="fa fa-instagram"></i><span><?php esc_html_e( 'Instagram', 'ratency-progression' ); ?></span></a></li>
    <?php endif; ?>
    <?php if(get_the_author_meta('progression_youtubeurl')) : ?><li><a
        href="<?php echo get_the_author_meta('progression_youtubeurl'); ?>" target="_blank" class="youtube-pro"><i
          class="fa fa-youtube"></i><span><?php esc_html_e( 'Youtube', 'ratency-progression' ); ?></span></a></li>
    <?php endif; ?>
    <?php if(get_the_author_meta('progression_vimeourl')) : ?><li><a
        href="<?php echo get_the_author_meta('progression_vimeourl'); ?>" target="_blank" class="vimeo-pro"><i
          class="fa fa-vimeo"></i><span><?php esc_html_e( 'Vimeo', 'ratency-progression' ); ?></span></a></li>
    <?php endif; ?>
    <?php if(get_the_author_meta('progression_soundcloudurl')) : ?><li><a
        href="<?php echo get_the_author_meta('progression_soundcloudurl'); ?>" target="_blank" class="soundcloud-pro"><i
          class="fa fa-soundcloud"></i><span><?php esc_html_e( 'Soundcloud', 'ratency-progression' ); ?></span></a>
    </li><?php endif; ?>
    <?php if(get_the_author_meta('progression_houzzurl')) : ?><li><a
        href="<?php echo get_the_author_meta('progression_houzzurl'); ?>" target="_blank" class="houzz-pro"><i
          class="fa fa-houzz"></i><span><?php esc_html_e( 'Houzz', 'ratency-progression' ); ?></span></a></li>
    <?php endif; ?>
    <?php if(get_the_author_meta('progression_emailmailto')) : ?><a
      href="mailto:<?php echo get_the_author_meta('progression_emailmailto'); ?>" class="mail-pro"><i
        class="fa fa-envelope"></i><span><?php esc_html_e( 'E-mail', 'ratency-progression' ); ?></span></a></li>
    <?php endif; ?>
  </ul>


  </div>


  <div class="clearfix-pro"></div>
  </div>
