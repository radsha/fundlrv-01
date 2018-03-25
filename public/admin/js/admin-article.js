(function($){
	var editor = tiny;
	editor.section 		= '#content_detail';
	editor.content_css 	= [_base + '/public/saiimog/css/bootstrap.min.css',_base + '/public/saiimog/css/main.css',_base + '/public/saiimog/css/font.css',_base + '/public/admin/css/core.css',_base + '/public/saiimog/lib/font-awesome/css/font-awesome.min.css'];
	editor.medium();

	image.inputid 		= $('#image');
	image.previewid 	= $('.img-review');
	image.imageid 		= $('#user-image');
	image.allowfile 	= 'jpg|png|gif';
	image.inputclick();

}(jQuery));