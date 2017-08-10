<?php

require 'config/PHPMailerAutoload.php';
require 'config/mailer/class.phpmailer.php';
require 'config/mailer/class.smtp.php';
require 'config/email_config_user.php';

$email_client = $_POST['email_client'];
$realestate  = $_POST['type_realestate'];
$comment_client  = $_POST['comment_client'];
$municipality  = $_POST['municipality'];

$emailbody = sprintf(
        "<hr><img src='http://www.datainvestment.rs/wp-content/uploads/2016/01/trans-logo-e1453907652943.png' alt='Data Investment'/></a><hr>"
        . "Poštovani Admine, "
        . "<br /><br />"
        . "<p>Imate novu ponudu</p>"
        . "<p>%s</p>", //comment
        //. "<p>Email:%s</p>"
        //. "<p>Location:%s</p>"
        //. "<p>nepokretnost:%s</p>"
        //. "<p>comment:%s</p>"
        //. "<p>Cena:%s</p>", 
        //$Email, 
        //$location,
        //$nepokretnost,
        $comment_client
        . "<hr><p><strong>Kontakt:</strong></p>
        <p>DATA INVESTMENT DOO </p>
        <p>Bulevar Evrope 27, 21000 Novi Sad, Srbija</p>
        <p>Bulevar Mihajla Pupina 165b, 11070 Beograd, Srbija</p>
        <br />
        <p>Tel/fax: 381 (0) 21 401 100</p>
        <p>mob: 381 (0) 63 51 44 77</p>
        <p>E-mail: info@datainvestment.rs</p><hr>"
        );

$mail = new PHPMailer();

$mail->isSMTP();                                     
$mail->SMTPDebug = $SMTPDebug; 	
$mail->SMTPAuth = $SMTPAuth; 			
$mail->SMTPSecure = $SMTPSecure;                         
$mail->Host = $SMTPHost;  	
$mail->Port = $SMTPPort;
$mail->IsHTML($SMTPIsHTML);
$mail->Username = $MailUsername;             
$mail->Password = $MailPass;              
$mail->SetFrom($MailfFrom);
$mail->Subject = $Subject;
$mail->Body = $emailbody;
$mail->AddAddress($Email);


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


//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
//
//var_dump($_POST);
//var_dump($emailbody);
//
//die('NE SALjEMO.....');

if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
    header('Location: lista.php');
 }