<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package pro
 */

get_header(); ?>

	<div id="page-title-pro">
		<div class="width-container-pro">
			<div id="progression-studios-page-title-container">
				<h1 class="page-title"><?php esc_html_e( '404 Error', 'ratency-progression' ); ?></h1>
				<?php if(function_exists('bcn_display')) { echo '<ul id="breadcrumbs-progression-studios"><li><a href="'; echo esc_url( home_url( '/' ) ); echo '"><i class="fa fa-home"></i> </a></li>'; bcn_display_list(); echo '</ul>'; }?>
			</div>
			<div class="clearfix-pro"></div>
		</div>
	</div><!-- #page-title-pro -->

	
	<div id="content-pro">
		<div id="error-page-index">

		<div class="width-container-pro">
			
				<br>
				<h3><?php esc_html_e( "Oops! That page can&rsquo;t be found.", 'ratency-progression' ); ?></h3>
				<p><?php esc_html_e( "Sorry, We couldn&rsquo;t find the page you&rsquo;re looking for. Maybe Try one of the links in the navigation or a search.", 'ratency-progression' ); ?></p>
				<?php get_search_form(); ?>
				
				<br>
				
		
			
		<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
		</div><!-- close #error-page-index -->
	</div><!-- #content-pro -->
	
<?php get_footer(); ?>