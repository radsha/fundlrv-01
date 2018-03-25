(function($){
	var gallery 		=  uploadpl;
	gallery.btn_browse	 	= 'btn-select';
	gallery.filelist 		= '.preview';
	gallery.container_id 	= 'gallery';
	gallery.mime_types 		=	[{title : "Image files", extensions : "jpg,gif,png,jpeg"}];

	gallery.multipart 		=	true,		
	gallery.sortable 		=	false,		
	gallery.multipart_params=	{ '_token':$('#_token').val()};	
	gallery.autoupload 		= true;
	gallery.run();
	
	$('#gallery').on('click','.preview',function(e){
		$('#btn-select').trigger('click');
	});
	
	$('#preview-list').sortable({
		placeholder: "ui-state-highlight",
        update: function (event, ui) {
            var order = $(this).sortable('serialize');
                $.ajax({
                    data: order,
                    type: 'POST',
                    url: './sortable?_token='+ $('#_token').val(),
					success : function(data){
						console.log(data);
					}
                });
        }
    });
	
}(jQuery));