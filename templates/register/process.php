<?php
header('content-type: application/json; charset=utf-8');
include('../../myPHPLibraries/controller/connection.php');

require("phpmailer/PHPMailer/class.phpmailer.php");

	
	if (isset($_POST['submit'])){

		$obj->connection->query("INSERT INTO tbl_user SET username = '".$_POST["username"]."', password = '".$_POST["password"]."', access = '2'");
		$id = $obj->connection->insert_id;

			$mail = new PHPMailer();
			
			$name = $_POST['fullname'];
			$email = $_POST['email'];
			$subject = "Email Verification From CapGem";
			//$uploaddir = 'uploads/';
			//$uploadfile = $uploaddir . basename($_FILES['file_attach']['name']);
			//move_uploaded_file($_FILES['file_attach']['tmp_name'], $uploadfile);
			
			$mail->From="capgem@capgem.com.ph";
			$mail->FromName="CapGem";
			$mail->Sender=$email;
			$mail->AddReplyTo($email, "No Reply");

			$mail->AddAddress($email);
			$mail->Subject = $subject;

			$mail->IsHTML(true);
			$mail->AddEmbeddedImage('../../../assets/img/logo.jpg', 'logoimg', 'logo.jpg'); // attach file logo.png, and later link to it using identfier logoimg
			//$mail->AddAttachment($uploadfile);
			$mail->Body = "
				<div style='background-color: #FFFFFF;' class='heading-wrapper'>
					<h1 style='margin: 0 0 5px; text-align: center; color: #3e3e3e;'>RideNRelax Contact Message</h1>
					<h3 style='text-align: center; color: #3e3e3e;'>(Auto Info Form)</h3>
				</div>
				<table>
					<thead>
						<th colspan='4'><img src=\"cid:logoimg\" width='40%' height='auto'/></th>
					</thead>
					<tbody>
						<tr>
							<td>Name: </td>
							<td>$name</td>
						</tr>

						<tr>
							<td>Email: </td>
							<td>$email</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>Click here to verify your login! --->> <a href='".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"]."?p=verify-id=".$id."'>".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"]."?p=verify&codeid=".$id."</a></td>
						</tr>
					</tbody>
				</table>
			";
			$mail->AltBody=$comment;

			if(!$mail->Send()) {
			   echo "Error sending: " . $mail->ErrorInfo;;
			}
			else {
				$InsColumnVal = array("user_id"=>$id,"memName"=>$_POST["fullname"],"memGender"=>$_POST["gender"],"memAddress"=>$_POST["address"],"memEmail"=>$_POST["email"],"memBirtdate"=>$_POST["dob"],"memSpouse"=>$_POST["spouse"],"memPicture"=>$_POST["pp"]);
				//Call insert function to insert record
				$obj->insert("tbl_members", $InsColumnVal, "../../?p=register", 'Registration successfully save. please check your email for verification! Thank you', '', 'true');
				
				move_uploaded_file($_FILES["file"]["tmp_name"], "../../assets/img/" . $_FILES["file"]["name"]);
			}
	}
?>