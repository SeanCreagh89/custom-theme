/*

	Theme Name: SCTheme
	Author: Sean Creagh
	Description: Simple Custom Theme
	Version: 1.0

*/



( function( $ ) {

	$( document ).ready( function() {

		$( '.menu-item-has-children' ).hover( function() {

			$( 'nav.menu .menu-item-has-children' ).children( '.sub-menu' ).css( 'display', 'block' );

		}, function() {

			$( 'nav.menu .menu-item-has-children' ).children( '.sub-menu' ).css( 'display', 'none' );

		} );

		$( '#toggle-menu' ).click( function() {

			$( '.responsive-menu .menu' ).slideToggle();
			$( '.responsive-menu .sub-menu' ).css( 'display', 'block' );

		} );

		$( '.responsive-menu a' ).click( function() {

			$( '.responsive-menu .menu' ).slideToggle();

		} );

		$( '#back-to-top' ).click( function() {

			$( 'html, body' ).animate( {

				scrollTop: $( 'body' ).offset().top

			}, 600 );

		} );

	} );

	$( document ).on( 'scroll', '', function() {

		if ( $( 'body' ).scrollTop() > 28 ) {

		} else if ( $( 'body' ).scrollTop() < 28 ) {

		}

	} );

} )( jQuery );