/**
 * Image upload / remove function for the admin area.
 * 
 * @since 1.0.0
 */
 export default function imgSwatch () {
	const uploadWrap = document.querySelector('.qc_wooswatches_img_upload_wrap');
	
	if ( uploadWrap ) {
		const uploadBtn = uploadWrap.querySelector('.upload_img');
		const removeBtn = uploadWrap.querySelector('.remove_img');
		const previewImg = uploadWrap.querySelector('.img_preview');

		uploadBtn.addEventListener('click', (ev) => {
			ev.preventDefault();
			wp.media({

				// Accepts [ 'select', 'post', 'image', 'audio', 'video' ]
				// Determines what kind of library should be rendered.
				frame: 'select',
			
				// Modal title.
				title: "'Select Images',",
			
				// Enable/disable multiple select
				multiple: true,
			
				// Library wordpress query arguments.
				library: {
					order: 'DESC',
			
					// [ 'name', 'author', 'date', 'title', 'modified', 'uploadedTo', 'id', 'post__in', 'menuOrder' ]
					orderby: 'date',
			
					// mime type. e.g. 'image', 'image/jpeg'
					type: 'image',
			
					// Searches the attachment title.
					search: null,
			
					// Includes media only uploaded to the specified post (ID)
					uploadedTo: null // wp.media.view.settings.post.id (for current post ID)
				},
			
				button: {
					text: 'Done'
				}
			
			}).open();
		console.log(wp.media.controller);
		})
		
		removeBtn.addEventListener('click', (ev) => {
			ev.preventDefault();
		});
	}
	
}