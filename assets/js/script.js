$(".menu-form-item a").click(function(e){
	$(".menu-form-item a").removeClass("active");
   	$(this).addClass("active");
	

	let selector = $(this).data("form-id");

  	if(selector == 'form-1'){
  		$("#form-1").addClass("form-active");
  		$("#form-2").removeClass("form-active");
  	}
  	else if(selector == 'form-2'){
		$("#form-2").addClass("form-active");
  		$("#form-1").removeClass("form-active");
  	}

	e.preventDefault();
});




