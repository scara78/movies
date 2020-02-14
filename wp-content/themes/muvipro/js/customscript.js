/**
 * Copyright (c) 2016 Gian MR
 * Gian MR Theme Custom Javascript
 *
 * @package Muvipro
 */

var $ = jQuery.noConflict();

(function( $ ) {
	/* http://www.w3schools.com/js/js_strict.asp */
	"use strict";

	jQuery(
		function($) {
			/* Sidr Resposive Menu */
			$( '#gmr-topnavresponsive-menu' ).sidr(
				{
					name: 'menus',
					source: '.close-topnavmenu-wrap, .gmr-mainmenu, .gmr-secondmenu, .gmr-topnavmenu',
					displace: false
				}
			);
			$( '#sidr-id-close-topnavmenu-button' ).click(
				function(e){
					e.preventDefault();
					$.sidr( 'close', 'menus' );
				}
			);
			$( 'input#sidr-id-s' ).click(
				function(e){
					e.preventDefault();
					e.stopPropagation();
				}
			);
			$( '.sidr-inner li' ).each(
				function(index) {
					var item = $( this );
					if (item.find( 'ul' ).length > 0) {
						// Has submenus.
						item.find( 'a' ).first().append( '<span class="sub-toggle">+</span>' );
					}
				}
			);
			$( '.sidr-inner .sub-toggle' ).click(
				function(e) {
					e.preventDefault();
					var item = $( this ),
					txt;
					item.toggleClass( 'is-open' );
					txt = item.hasClass( 'is-open' ) ? 'Ã¢â‚¬â€œ' : '+';
					item.text( txt );
					$( this ).closest( 'li' ).find( 'a' ).first().next().slideToggle();
				}
			);
		}
	); /* End jQuery(function($) { */

	/* Accessibility Drop Down Menu */
	jQuery(
		function($) {
			$( '.menu-item-has-children a' ).focus(
				function () {
					$( this ).siblings( '.sub-menu' ).addClass( 'focused' );
				}
			).blur(
				function(){
					$( this ).siblings( '.sub-menu' ).removeClass( 'focused' );
				}
			);
			// Sub Menu.
			$( '.sub-menu a' ).focus(
				function () {
					$( this ).parents( '.sub-menu' ).addClass( 'focused' );
				}
			).blur(
				function(){
					$( this ).parents( '.sub-menu' ).removeClass( 'focused' );
				}
			);
		}
	); /* End jQuery(function($) { */

	/* Search Dropdown */
	jQuery(
		function($) {
			$( '#search-menu-button' ).click(
				function(e) {
					e.stopPropagation();
					e.preventDefault();
					$( '#search-dropdown-container' ).toggle();
				}
			);
			$( '#search-menu-button-top' ).click(
				function(e) {
					e.stopPropagation();
					e.preventDefault();
					$( '.topsearchform' ).toggleClass( "open" );
				}
			);
			$( document ).click(
				function(e) {
					var container = $( "#search-dropdown-container" );
					var btn       = $( "#search-menu-button" );

					var container_2 = $( ".topsearchform" );
					var btn_2       = $( "#search-menu-button-top" );

					if (container.has( e.target ).length === 0 && btn.has( e.target ).length === 0) {
						container.hide();
					}
					if (container_2.has( e.target ).length === 0 && btn_2.has( e.target ).length === 0) {
						container_2.removeClass( "open" );
					}
				}
			);
		}
	); /* End jQuery(function($) { */

	/* Sticky Menu */
	jQuery(
		function($) {
			$( window ).scroll(
				function() {
					if ( $( this ).scrollTop() > 325 ) {
						$( '.top-header' ).addClass( 'sticky-menu' );
					} else {
						$( '.top-header' ).removeClass( 'sticky-menu' );
					}
				}
			);
		}
	); /* End jQuery(function($) { */

	/* Click Dropdown */
	jQuery(
		function($) {
			$( '.element-click' ).on(
				'click',
				'.button',
				function(event){
					$( '.element-click .dropdown' ).toggleClass( 'active' );
					event.stopPropagation();
				}
			);
			$( document ).click(
				function() {
					$( '.dropdown' ).removeClass( 'active' );
				}
			);
		}
	); /* End jQuery(function($) { */

	/* Match Height */
	jQuery(
		function($) {
			$( '.gmr-box-content, .gmr-box-blog, .gmr-item-modulepost img' ).matchHeight(
				{
					byRow: true,
					property: 'height',
					target: null,
					remove: false
				}
			);
		}
	); /* End jQuery(function($) { */

	/* Magnific Popup */
	jQuery(
		function($) {
			$( '.gmr-trailer-popup' ).magnificPopup(
				{
					type: 'iframe',
					mainClass: 'mfp-img-mobile mfp-no-margins mfp-with-zoom',
					removalDelay: 160,
					preloader: false,
					zoom: {
						enabled: true,
						duration: 300
					}
				}
			);
		}
	); /* End jQuery(function($) { */

	/* Switch Player */
	jQuery(
		function($) {
			$( '.gmr-switch-button' ).click(
				function(){
					$( '.tab-content' ).addClass( 'relative-video' );
					$( '#lightoff' ).fadeToggle();
				}
			);

			$( '#lightoff' ).click(
				function(){
					$( '.tab-content' ).removeClass( 'relative-video' );
					$( '#lightoff' ).hide();
				}
			);
		}
	); /* End jQuery(function($) { */

	/* Scroll to top */
	jQuery(
		function($) {
			var ontop = function(){
				var st = $( window ).scrollTop();
				if ( st < $( window ).height() ) {
					$( '.gmr-ontop' ).hide();
				} else {
					$( '.gmr-ontop' ).show();
				}
			}
			$( window ).scroll( ontop );
			$( '.gmr-ontop' ).click(
				function(){
					$( 'html, body' ).animate( {scrollTop:0}, 'normal' );
					return false;
				}
			);
		}
	); /* End jQuery(function($) { */

})( jQuery );

/**
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
(function() {
	var isIe = /(trident|msie)/i.test( navigator.userAgent );

	if ( isIe && document.getElementById && window.addEventListener ) {
		window.addEventListener(
			'hashchange',
			function() {
				var id = location.hash.substring( 1 ),
				element;

				if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
					return;
				}

				element = document.getElementById( id );

				if ( element ) {
					if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
						element.tabIndex = -1;
					}

					element.focus();
				}
			},
			false
		);
	}
})();