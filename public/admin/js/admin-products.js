(function($){
	$('#productlist').sortable({
		update: function(event, ui){
			$.post("../productsort", { listItem : $('#productlist').sortable('serialize')});
		}
	});
}(jQuery))