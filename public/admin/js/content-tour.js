(function($){
	image.inputid 		= $('#image');
	image.previewid 	= $('.img-review');
	image.imageid 		= $('#user-image');
	image.allowfile 	= 'jpg|png|gif';
	image.inputclick();

	var editor = tiny;
	editor.section 		= '#content_detail';
	editor.height 		= '220';
	editor.width 		= '100%';
	editor.content_css 	= [_base + '/public/cafeholiday/css/bootstrap.min.css',_base + '/public/cafeholiday/css/main.css',_base + '/public/cafeholiday/css/fonts.css',_base + '/public/admin/css/core.css'];
	editor.mini();

	var detail = tiny;
	detail.section 		= '#content_tour';
	detail.content_css 	= [_base + '/public/cafeholiday/css/bootstrap.min.css',_base + '/public/cafeholiday/css/main.css',_base + '/public/cafeholiday/css/fonts.css',_base + '/public/admin/css/core.css'];
	detail.medium();

        var addFormGroup = function (event) {
            event.preventDefault();

            var $formGroup = $(this).closest('tr');
            var $multipleFormGroup = $formGroup.closest('tbody');
            var $formGroupClone = $formGroup.clone();
			var $rel = $formGroupClone.find('input.travel_date').attr('rel') ;	
			var $num = parseInt($rel) + 1 ;	
			console.log('rel : ' + $rel + ' | num : ' + $num);

            $(this)
                .toggleClass('btn-success btn-add btn-danger btn-remove')
                .html('–');
			$formGroupClone.find('.travel_date')
							.removeClass("hasDatepicker")
							.attr({'id':'travel_date_' + $num,'rel' : $num});
            $formGroupClone.find('input').val('');
            $formGroupClone.insertAfter($formGroup);
			sedate();

            var $lastFormGroupLast = $multipleFormGroup.find('tr:last');
            if ($multipleFormGroup.data('max') <= countFormGroup($multipleFormGroup)) {
                $lastFormGroupLast.find('.btn-add').attr('disabled', true);
            }
        };

        var removeFormGroup = function (event) {
            event.preventDefault();

            var $formGroup = $(this).closest('tr');

           
			var url = $(this).attr('href');
			if(url !== undefined){
				if(confirm('ยืนยันการลบ')){
					$.get(url);
					console.log('url : ' + url);
				}
			}

            $formGroup.remove();
        };

        var countFormGroup = function ($form) {
            return $form.find('.form-group').length;
        };

        $(document).on('click', '.btn-add', addFormGroup);
        $(document).on('click', '.btn-remove', removeFormGroup);
		
		function sedate(){
			$('.travel_date').each(function(e){
				var $id = '#' + $(this).attr('id');
				$($id).multiDatesPicker({
					dateFormat: "yy-mm-dd",
					changeMonth: true,
					changeYear: true,
				});
			});
			$('.etravel_date').each(function(e){
				var $id = '#' + $(this).attr('id');
				$($id).datepicker({
					dateFormat: "yy-mm-dd",
					changeMonth: true,
					changeYear: true,
				});
			});
		}
		sedate();
		
}(jQuery));