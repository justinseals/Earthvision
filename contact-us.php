<!DOCTYPE html>

<head>

	<title>EarthVision ~ Knowledge Base</title>
	
	<?php include '_includes/header-inc.php'; ?> 
	
	<script type="text/javascript" src="_scripts/character.js"></script>
	<script type="text/javascript" src="_scripts/jquery.validate.pack.js"></script>

</head>
<body>
<?php
//If the form is submitted
if(isset($_POST['submit'])) {

	//Check to make sure that the name field is not empty
	if(trim($_POST['contactname']) == '') {
		$hasError = true;
	} 
    // The name is too short
	//else if (3 > strlen($contactname)) {
	//	$hasError = true;
	//}
	else {
		$name = trim($_POST['contactname']);
	}
	
	//Check to make sure that the subject field is not empty
	if(trim($_POST['subject']) == '') {
		$hasError = true;
	} else {
		$subject = trim($_POST['subject']);
	}


	//Check to make sure sure that a valid email address is submitted
	if(trim($_POST['email']) == '')  {
		$hasError = true;
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	//Check to make sure comments were entered
	if(trim($_POST['message']) == '') {
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['message']));
		} else {
			$comments = trim($_POST['message']);
		}
	}

	//If there is no error, send the email
	if(!isset($hasError)) {
		$emailTo = 'justin@easywebdesigning.co.uk'; //Put your own email address here
		$body = "Name: $name \n\nEmail: $email \n\nSubject: $subject \n\nComments:\n $comments";
		$headers = 'From: EarthVision Online Form <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}

}
?>


<?php include '_includes/ie6-notice.php'; ?> 

	<div id="pagewidth">
	
		<?php include '_includes/navigation.php'; ?> 
		<script type="text/javascript">$("#contact-us").addClass("active");</script>		
		
		<div id="content">
			<h1>Contact Us</h1>
			
			<div class="block">
				<div id="contact-wrapper">
				<div id="contact-box-width">
				
				<p style="margin-top:0px; padding-top:0px; font-weight:bold;" id="please-message">Please feel free to ask us anything via the form below:</p>
			
				<?php if(isset($hasError)) { //If errors are found ?>
					<p class="error">Please check if you've filled all the fields with valid information. Thank you.</p>
				<?php } ?>
				
				<form method="post" action="" id="contactform">
					<div>
						<label for="contactname">Name:</label>
						<input type="text" size="50" name="contactname" id="contactname" value="" class="required" onkeydown="return alpha(event,letter)" />
					</div>
			
					<div>
						<label for="email">Email:</label>
						<input type="text" size="50" name="email" id="email" value="" class="required email" />
					</div>
					
					<div>
						<label for="subject">Subject:</label>
						<input type="text" size="50" name="subject" id="subject" value="" class="required"/>
					</div>
			
			
					<div>
						<label for="message">Message:</label>
						<textarea rows="5" cols="50" name="message" id="message" class="required"></textarea>
					</div>
					<input type="submit" value="Send Message" name="submit" style="width:385px;" />
				</form>
				
				<?php if(isset($emailSent) && $emailSent == true) { //If email is sent ?>
					<p style="color:#F00;">Email Successfully Sent!</p>
					<p>Thank you <?php echo $name;?> for using our contact form! Your email was successfully sent and we will be in touch with you soon.</p>
					<p>Please feel free to continue browsing the site...</p>
					<script type="text/javascript">
						$("#contactform, #please-message").hide();
						$("#contact-box-width").addClass("normal-width");
						
					</script>
				<?php } ?>
				
				</div></div>
				<div style="clear:both;"></div>
			</div><!--Block end-->
			
		</div><!--Content End-->
		
		<?php include '_includes/footer.php'; ?> 
	
	</div><!--Pagewidth End-->

</body>
</html>