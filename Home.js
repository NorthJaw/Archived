$('.Button').mouseenter(function(){

	$(this).css('opacity','1');

}).mouseleave(function(){

	$(this).css('opacity','0.5');

}).click(function(){

	$('.Button').hide();

	if($(this).val() === 'Login'){
		$('#Login').show();
	}

});
