(function($){
	var gallery 		=  uploadpl;
	gallery.btn_browse	 	= 	'btn-select';
	gallery.filelist 		= 	'.preview';
	gallery.container_id 	= 	'gallery';
	gallery.limit 			= 	12;
	gallery.multipart 		=	true;	
	gallery.redirect 		=	'back';
	gallery.return_id 		=	$('input[name="id"]');
	gallery.image_type 		= 	'picture';
	gallery.form_btn		=	'#btn-save';
	gallery.run( $('#frm-picture') );
		
	$('#gallery').on('click','.preview',function(e){
		$('#btn-select').trigger('click');
	});
		
	var pheight = parseInt($('.product-input').height()) - 450;
	$('.preview').css('height',pheight+'px');
	
	$('#preview').sortable();
	
}(jQuery));