(function($){
	var gallery 		=  uploadpl;
	gallery.btn_browse	 	= 	'btn-select';
	gallery.filelist 		= 	'.preview';
	gallery.container_id 	= 	'gallery';
	gallery.limit 			= 	12;
	gallery.multipart 		=	true;	
	gallery.redirect 		=	'back';
	gallery.return_id 		=	$('input[name="id"]');
	gallery.image_type 		= 	'product';
	gallery.form_btn		=	'#btn-save';
	gallery.run( $('#frm-product') );
		
	$('#gallery').on('click','.preview',function(e){
		$('#btn-select').trigger('click');
	});
		
	var pheight = parseInt($('.product-input').height()) - 40;
	$('.preview').css('height',pheight+'px');
	
	var editor = tiny;
	editor.section 		= '#detail2';
	editor.base_url 	= _base;
	editor.content_css 	= _base + '/public/banteedin/css/layout.css, ' + _base + '/public/banteedin/css/bootstrap.min.css';
	editor.medium();
	
	$('#preview').sortable({
		update: function(event, ui){
			$.post( _base + "/admin/news/sorting", 
					{'id' : $('input[name="id"]').val() ,'_token' : $('input[name="_token"]').val(), listItem : $('#preview').sortable('serialize')});
		}
	});
	


}(jQuery));