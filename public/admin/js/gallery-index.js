(function(){
	$('#cate-list').sortable({
		placeholder: "ui-state-highlight",
        update: function (event, ui) {
            var order = $(this).sortable('serialize');
                $.ajax({
                    data: {'_token' : $('input[name="_token"]').val(), order},
                    type: 'POST',
                    url: baseurl + '/admin/images/csortable',//?_token='+ $('#_token').val(),
					success : function(data){
						console.log(data);
					}
                });
        }
    });
	
}(jQuery));