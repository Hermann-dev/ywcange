/**
 * jquery.pixi_core.admin.js
 * Author: pixi
 * Author Uri: http://pixi.com
 * Email: pixi@gmail.com
 * Version: 1.0
 */

! ( function( $ ) {
	'use strict';

	var pixiAPI = function() {
		this.init();
	}

	pixiAPI.prototype = {
		init: function() {
			this.accordionHandle();
			this.backupdatabaseHandle();
		},
		accordionHandle: function() {
			$( '.pixi-block-accordion-wrap' ).each( function() {
				var $accordionWrap = $( this );

				$accordionWrap.find( '.pixi-block-accordion-body' ).slideUp( 0 );
				$accordionWrap.find( '.pixi-block-accordion' ).first().find( '.pixi-block-accordion-body' ).slideDown( 'slow' );

				$accordionWrap.on( 'click', '.pixi-block-accordion > .title', function() {
					var $accordionItem = $( this ).parent( '.pixi-block-accordion' );
					$accordionWrap.find( '.pixi-block-accordion-body' ).slideUp( 'slow' );
					$accordionItem.find( '.pixi-block-accordion-body' ).slideDown( 'slow' );
				} )
			} )
		},
		backupdatabaseHandle: function() {
			$( 'body' ).on( 'click', '#pixi-backupdatabase-handle', function( e ) {
				e.preventDefault();
				var $this = $( this ),
					path = $( this ).data( 'path' ),
					uri = $( this ).data( 'uri' );

				$this.addClass( 'pixi-ajax-loading' );

				$.ajax( {
					type: 'POST',
					url: pixi_object.ajax_url,
					data: { action: 'pixi_backupDatabase_handle', path: path, uri: uri },
					success: function( result ) {
						// console.log( result );
						$this.removeClass( 'pixi-ajax-loading' );
						$this.parents( '.pixi-block-accordion-body' ).append( $( result ).css( 'display', 'none' ).fadeIn( 'slow' ) );
					},
					error: function( e ) {
						alert( JSON.stringify( e ) );
						console.log( e )
					}
				} )
			} )

			/* Restore */
			$( 'body' ).on( 'click', 'a.pixi-restore-database', function( e ) {
				e.preventDefault();

				var $this = $( this ),
					$rowElem = $( this ).parents( '.table-row' ),
					file = $( this ).data( 'file' ),
					ask = confirm( 'Do you want RESTORE database?' );

				if( ask == true ) {
				    $rowElem.addClass( 'pixi-ajax-loading' );

				    $.ajax( {
						type: 'POST',
						url: pixi_object.ajax_url,
						data: { action: 'pixi_restoreDatabase_handle', file: file },
						success: function( result ) {
							alert( result );
							$rowElem.removeClass( 'pixi-ajax-loading' );
							console.log( result );
						},
						error: function( e ) {
							alert( JSON.stringify( e ) );
							console.log( e )
						}
					} )
				}
			} )

			/* Delete */
			$( 'body' ).on( 'click', 'a.pixi-delete-database', function( e ) {
				e.preventDefault();

				var $rowElem = $( this ).parents( '.table-row' ),
					file = $( this ).data( 'file' ),
					ask = confirm( 'Do you want DELETE this file?' );

				if( ask == true ) {
				    $rowElem.addClass( 'pixi-ajax-loading' );

				    $.ajax( {
						type: 'POST',
						url: pixi_object.ajax_url,
						data: { action: 'pixi_deleteDatabase_handle', file: file },
						success: function( result ) {
							alert( result );
							$rowElem.fadeOut( 'slow', function() { $( this ).remove() } );
							console.log( result );
						},
						error: function( e ) {
							alert( JSON.stringify( e ) );
							console.log( e )
						}
					} )
				}
			} )
		}
	}

	/* DOM Reaady */
	$( function() {

		/* use pixiAPI */
		new pixiAPI();
	} ) 
} )( jQuery )
