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


$('#Home_Btn').click(function(){

	$('#Payment').show();
	$('#Balance').hide();
	$('#Profile').hide();
	$('#addMoney').hide();
	$('#History').hide();
});


$('#Balance_Btn').click(function(){

	$('#Payment').hide();
	$('#Balance').show();
	$('#Profile').hide();
	$('#addMoney').hide();
	$('#History').hide();
});


$('#Profile_Btn').click(function(){

	$('#Payment').hide();
	$('#Balance').hide();
	$('#Profile').show();
	$('#addMoney').hide();
	$('#History').hide();
});

$('#AddMoney_Btn').click(function(){

	$('#Payment').hide();
	$('#Balance').hide();
	$('#Profile').hide();
	$('#addMoney').show();
	$('#History').hide();
});


$('#History_Btn').click(function(){

	$('#Payment').hide();
	$('#Balance').hide();
	$('#Profile').hide();
	$('#addMoney').hide();
	$('#History').show();
});
