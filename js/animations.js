    $(document).ready(function(){
    	$(".appear").hide();
        $("textarea").focus(function (){
            $(".appear").fadeIn();
		});
    });			