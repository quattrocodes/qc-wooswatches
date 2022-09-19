/**
 * Image upload / remove function for the admin area.
 * 
 * @since 1.0.0
 */

function imgSwatch () {
	const uploadWrap = document.querySelector('.qc_wooswatches_img_upload_wrap');
	
	if ( uploadWrap ) {
		const uploadBtn = uploadWrap.querySelector('.upload_img');
		const removeBtn = uploadWrap.querySelector('.remove_img');
		const previewImg = uploadWrap.querySelector('.img_preview');

		uploadBtn.addEventListener('click', (ev) => {
			ev.preventDefault();
			wp.media({
				frame: 'select',
				library: {
					type: 'image',
				},
				button: {
					text: 'Insert image'
				}
			}).open();
		})
		
		removeBtn.addEventListener('click', (ev) => {
			ev.preventDefault();
		});
	}	
}

(function( $ ) {
	'use strict';
	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 */
	$( window ).load( function() {

		/* Admin color picker */
		const colorPalette = $('#color_palette');
		colorPalette ? colorPalette.wpColorPicker() : null;
	
		/* Admin image upload */
		imgSwatch();
	})

})( jQuery );

