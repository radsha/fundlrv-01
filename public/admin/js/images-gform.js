(function() {
	$('.alert').hide();
	var uploader = new plupload.Uploader({
	    runtimes : 'html5,flash,silverlight,html4',
	     
	    browse_button : 'btn-select', // you can pass in id...
	    container: document.getElementById('gallery'), // ... or DOM Element itself
	     
	    url : baseurl + '/admin/images/gupload',
	     
	    filters : {
	        max_file_size : '15mb',
	    },
	    // Flash settings
	    flash_swf_url : path + 'Moxie.swf', 
	    // Silverlight settings
	    silverlight_xap_url : path + 'Moxie.xap',
		//multi_selection : true,
		multipart     	: true,
	    init: {
	        PostInit: function() {
	           // document.getElementById('preview').innerHTML = '';
	 
	            document.getElementById('btn-save').onclick = function() {
				console.log('click start upload');
				$.ajax({
					url: baseurl + '/admin/images/gform',
					method:'POST',
					data : {'_token' : $('input[name="_token"]').val(),'category_subject' : $('#category_subject').val(),'id' : $('input[name="id"]').val()},
					success : function(data){
						console.log(data);
						$('input[name="id"]').val(data);
						uploader.start();
					}
				});

				var $qr = uploader.files.length;
				console.log('return id is ' + $('input[name="id"]').val() );
				/*
				 if($('input[name="category_subject"]').val() == '' || $('input[name="id"]').val() == 0){
					alert('กรุณาป้อนชื่ออัลับ้มภาพก่อนทำการบันทึก');
					$('input[name="category_subject"]').focus();
				}else{
					uploader.start();
				}
				*/
	                return false;
	            };
	        },
	 
	        FilesAdded: function(up, files) {
				var filelist = '.preview';
				var no = $(filelist).length;
				for ( var i = 0 ; i < files.length ; i++ ) {
					preview( files[ i ] ,'img-' + (parseInt(no) + parseInt(i)));
				}
				removeg();
				imgsortable();
				function preview(file,id){
					var tag = '<li id="thumbs-'+ file.id + '">'
								+'<a href="'+ file.id +'" class="color-red del-preview glyphicon glyphicon-off"></a>'
								+'<span class="filename">' + file.name + ' (' + plupload.formatSize(file.size) + ') </span>'
								+'<b class="percent"></b><div class="upload-progress"><div class="upload-progress-bar"></div></div>'
							+'</li>';
					var preID = '#gallery .preview';
					var item = $( tag ).prependTo( preID );
					var image = $( new Image() ).prependTo(item);
					var preloader = new mOxie.Image();
					preloader.onload = function() {
						preloader.downsize( 100, 100 );
						image.prop({ "src": preloader.getAsDataURL(),'id':id,'class':'img-preview'} );
					};
					preloader.load( file.getSource() );	
				}
				function removeg(){
						$('.del-preview').on('click',function(e){
							e.preventDefault();
							
							var dlink = $(this).attr('href');
							uploader.removeFile(dlink);
							/*
							if(dlink != ''){
								console.log('remove link image');
								if(!confirm('Please confirm delete this!!')){
									return false;
								}
								$.get(dlink);
							}
							*/
							var thumb  = $(this).closest('li');
							console.log('Click Remove ');
							thumb.remove();
						});
					};
					
					function imgsortable(){
						if(this.sortable == true){
							return $('#gallery .preview').sortable();
						}
					};
	
	        },
	
			 BeforeUpload: function(up, file) {
                // Called right before the upload for a given file starts, can be used to cancel it if required
				uploader.settings.multipart_params = {'id' : $('input[name="id"]').val(),
													'_token'	: $('input[name="_token"]').val(),
													 };
            },
	 
	        UploadProgress: function(up, file) {
				console.log('Loading... ' + file.id);
				$('#thumbs-' + file.id +' > .percent').text( file.percent + '');
				$('#thumbs-' + file.id +' > .upload-progress >.upload-progress-bar').css('width',file.percent+'%');
	        },

			FilesRemoved: function(up, files) {
					// Called when files are removed from queue
					//log('[FilesRemoved]');
	  
					plupload.each(files, function(file) {
						console.log('  File:', file);
					});
			},

			UploadComplete: function(up, files) {
				console.log('upload complete');
				window.location.href = baseurl + '/admin/images/album';
			},
				
	        Error: function(up, err) {
	            document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
	        }
	    }
	});
	/*
	$('#btn-save').on('click',function(e){
		e.preventDefault();
		$.ajax({
			url: baseurl + '/admin/images/gform',
			
			method:'POST',
			data : {'_token' : $('input[name="_token"]').val(),'category_subject' : $('#category_subject').val(),'id' : $('input[name="id"]').val()},
			success : function(data){
				console.log(data);
			}
		});
	});
	*/
	uploader.init();

$('#preview').sortable({
		placeholder: "ui-state-highlight",
        update: function (event, ui) {
            var order = $(this).sortable('serialize');
                $.ajax({
                    data: {'_token' : $('input[name="_token"]').val(), order},
                    type: 'POST',
                    url: baseurl + '/admin/images/gsortable',//?_token='+ $('#_token').val(),
					success : function(data){
						console.log(data);
					}
                });
        }
    });
	
	// Delete Image Gallery 
	$('.img-del').on('click',function(e){
		e.preventDefault();
		
		$.ajax({
				url : $(this).attr('href'),
				success:function(data){
					console.log(data);
				}
				});
			$(this).closest('li').remove();
	});

}(jQuery));