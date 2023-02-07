/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	wp.customize( 'progression_studios_header_background_color', function( value ) {
		value.bind( function( newval ) {
			$('header#masthead-pro').css('background', newval );
		} );
	} );
	
	
} )( jQuery );
