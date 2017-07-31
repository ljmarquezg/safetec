$('form').on('change', function(){
	var submitButton = 0;
	$('button').on('click', function(){
		var buttonType = $('button').attr('type');
		if (buttonType == 'submit'){
			submitButton = 1
		}
	});


	$(window).on("beforeunload", function() { 
		if (submitButton == 0){
			return  "Bye now!" ;
		}
	});
})
