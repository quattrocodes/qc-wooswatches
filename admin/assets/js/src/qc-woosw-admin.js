/**
 * Image upload / remove function for the admin area.
 * 
 * @since 1.0.0
 */
import { QcWooswAdmin } from "./classes/class-qc-woosw-admin";

(function( $ ) {
	'use strict';
 
	$( window ).load( function() {
		const qcWooswAdmin = new QcWooswAdmin;
		qcWooswAdmin.runAdmin();	
	})

})( jQuery );

