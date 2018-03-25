function base_path(){
	var path = $(location).attr('pathname');
	path.indexOf(1);
	path.toLowerCase();
	return '/' + path.split("/")[1]+'/'+path.split("/")[2];
}
(function($){   
	var sideslider = $('[data-toggle=collapse-side]');
	var sel = sideslider.attr('data-target');
	var sel2 = sideslider.attr('data-target-2');
	sideslider.click(function(event){
		$(sel).toggleClass('in');
		$(sel2).toggleClass('out');
	});
}(jQuery));