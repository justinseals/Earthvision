// JavaScript Document
$(document).ready(function(){
	
	//IE fixes
	$(".info-block p:last-child").addClass("no-border-bot");
	
	//Adding first actives
	$(".pagination span.button:first-child").addClass("active");
	
	$(".pagination span.button").click(function()
	{
		$(".pagination span.button").removeClass("active");
		
		blockID = $(this).attr("rel");
		
		$(".info-block,").hide();
		$("."+blockID).addClass('active');
		$("#"+blockID).fadeIn('slow');
		
	});

	
	/*	Contact form stuff	*/
	
	$("#contactform").validate({
		messages: {
			contactname: "Please specify your name",
			email: {
						required: "I need your email address to contact you",
						email: "Your email address must be in the format of name@domain.com"
					},
			subject: "Please enter a subject",
			message: "Please enter your message"
		}
	});

		
});	