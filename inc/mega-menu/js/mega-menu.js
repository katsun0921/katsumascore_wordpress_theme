/**
 * Progression Mega Menu Framework
 *
 */

( function( $ ) {

	"use strict";

	$( document ).ready( function() {

		// show or hide megamenu fields on parent and child list items
		progression_studios_megamenu.menu_item_mouseup();
		progression_studios_megamenu.megamenu_status_update();
		//$( '.edit-menu-item-megamenu-status' ).status_update();
		progression_studios_megamenu.update_megamenu_fields();

	});

	// "extending" wpNavMenu
	var progression_studios_megamenu = {

		menu_item_mouseup: function() {
			$( document ).on( 'mouseup', '.menu-item-bar', function( event, ui ) {
				if( ! $( event.target ).is( 'a' )) {
					setTimeout( progression_studios_megamenu.update_megamenu_fields, 300 );
				}
			});
		},

		megamenu_status_update: function() {

			$( document ).on( 'click', '.edit-menu-item-megamenu-status', function() {
				var parent_li_item = $( this ).parents( '.menu-item:eq( 0 )' );

				if( $( this ).is( ':checked' ) ) {
					parent_li_item.addClass( 'progression-megamenu' );
				} else 	{
					parent_li_item.removeClass( 'progression-megamenu' );
				}

				progression_studios_megamenu.update_megamenu_fields();
			});
		},

		update_megamenu_fields: function() {
			var menu_li_items = $( '.menu-item');

			menu_li_items.each( function( i ) 	{

				var megamenu_status = $( '.edit-menu-item-megamenu-status', this );

				if( ! $( this ).is( '.menu-item-depth-0' ) ) {
					var check_against = menu_li_items.filter( ':eq(' + (i-1) + ')' );


					if( check_against.is( '.progression-megamenu' ) ) {

						megamenu_status.attr( 'checked', 'checked' );
						$( this ).addClass( 'progression-megamenu' );
					} else {
						megamenu_status.attr( 'checked', '' );
						$( this ).removeClass( 'progression-megamenu' );
					}
				} else {
					if( megamenu_status.attr( 'checked' ) ) {
						$( this ).addClass( 'progression-megamenu' );
					}
				}
			});
		}

	};

	
})( jQuery );