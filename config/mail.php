<?php

require 'PHPMailerAutoload.php';
require 'mailer/class.phpmailer.php';
require 'mailer/class.smtp.php';

$mail = new PHPMailer();

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->SMTPDebug = 1; 									// debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; 								// Enable SMTP authentication
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Host = "smtp.gmail.com";  						// Specify main and backup SMTP servers
$mail->Port = 465; 										// or 587
$mail->IsHTML(true);
$mail->Username = 'nsvind@gmail.com';                 // SMTP username
$mail->Password = 'darkseer1122';                      // SMTP password
$mail->SetFrom("nsvind@gmail.com");
$mail->Subject = "Test";
$mail->Body = "Hello";
$mail->AddAddress("nsvind87@gmail.com");


//$mail->setFrom('nsvind87@gmail.com', 'Nenad');
//$mail->addAddress('nsvind@gmail.com', 'Nenad');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('nsvind87@gmail.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('lista.php');
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
//$mail->isHTML(true);                                  // Set email format to HTML


$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Unos</title>
	</head>
	<body>
	

		<!--<form action="" method="POST">
		<fieldset>
			<label>Grad:</label>
			<select name="option" id="option">
				<option></option>
				<option>Novi Sad</option>
				<option>Beograd</option>
			<select><br />
			<label>Email:</label>
			<input type="text" name="sender" id="sender" /><br />
			<input type="submit" name="send" value="Posalji Email" />
			</fieldset>-->
		</form>
	</body>
</html>