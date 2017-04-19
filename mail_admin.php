<?php
    session_start();
    if(!isset($_SESSION['id_admin'])){
	header('Location: login.php');
    } // na svim stranicama
    
    
require_once 'baza/db_proba.php';

$db1 = new DB; 

$realestateID = $_POST['id_realestate'];
$comment_admin = $_POST['comment_admin'];
$price = $_POST['price'];

$statement = $db1->InsertIntoComments($realestateID, $_SESSION['id_admin'], $comment_admin, $price);
//$statement = $db1->InsertIntoComments($_POST['id_realestate'], $_SESSION['id_admin'], $_POST['comment_admin'], $_POST['price']);

$statement = $db1->getDataForEmail($realestateID);

$row = $statement->fetch(PDO::FETCH_ASSOC);

if (
    $row['comment_admin'] == $_POST['comment_admin'] &&
    $price == $row['price']
) {


require 'config/PHPMailerAutoload.php';
require 'config/mailer/class.phpmailer.php';
require 'config/mailer/class.smtp.php';
require 'config/email_config_admin.php';


$emailbody = sprintf(
        "<hr><img src='http://www.datainvestment.rs/wp-content/uploads/2016/01/trans-logo-e1453907652943.png' alt='Data Investment'/></a><hr>"
        . "Poštovani/Poštovana, "
        . "<br /><br />"
        . "<p>Hvala vam na svim poslatim informacijama vezanim za vašu procenu nepokretnosti</p>"
        . "<p>Nakon pažljivo pregledanih svih vaših poslatih informacija, DATA INVESTMENT Group je procenio vašu nepokretnost na vrednost od:"
        . " <br /><h1>%s dinara</h1></p>" // cena
        . "<p><strong>Komentar:</strong></p>"
        . "<p>%s</p>", //comment
        $price,
        $comment_admin
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
$mail->AddAddress($row['email_client']);


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
//    echo "Message has been sent";
    header('Location: lista.php');
    exit(0);
 }
}

header("Location : detaljnije.php=id=" . $realestateID . '&m=f');