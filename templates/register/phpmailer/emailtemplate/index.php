<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>PHP Mailer</title>
</head>

<body>
<?php
	if (isset($_POST['submit'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		
		$to = 'mustfeed69@gmail.com';
		$subject = "Auto Info Form";
		// Get HTML contents from file
		$htmlContent = file_get_contents("autoinfotemplate.php");

		// Set content-type for sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// Additional headers
		$headers .= 'From: Texas Insurance Discounts<admin@txinsurancediscounts.com>' . "\r\n";
		$headers .= 'Cc: admin@txinsurancediscounts.com' . "\r\n";

		// Send email
		if(mail($to,$subject,$htmlContent,$headers)):
			$successMsg = 'Email has sent successfully.';
		else:
			$errorMsg = 'Some problem occurred, please try again.';
		endif;
	}
?>
<form method="post">
		<label>Name</label><br />
		<input type="text" name="name" /><br /><br />
		<label>Email</label><br />
		<input type="text" name="email" /><br /><br />
		<label>Phone</label><br />
		<input type="text" name="phone" /><br /><br />
		<input type="submit" name="submit" value="Send" />
	</form>
</body>
</html>