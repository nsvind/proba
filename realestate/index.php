<head>
    <meta charset="UTF-8">
</head>
<?php
 require_once 'baza/db_proba.php';
 $db1 = new DB();  

 
if (isset($_POST['send'])) {
   
    $errMsg = '';

    $email_client = $_POST['email_client'];
    $quadrature = $_POST['quadrature'];
    $comment_client = $_POST['comment_client'];
    $address_client = $_POST['address_client'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $typeID = $_POST['type_realestate'];
    $municipalityID = $_POST['municipality'];
    $catastralID = $_POST['katopstinaId'];
    
    $optionID = $_POST['optionId'];
    $classID = $_POST['classId'];
    
    if ($errMsg == '') {
        $db1->InsertIntoRealestate($email_client, $address_client, $quadrature, $comment_client,
                $ip, $typeID, $municipalityID, $catastralID, $optionID, $classID);
        
        $realestateID = $db1->getLastRealestateID();
            
    foreach ($_FILES['img']['name'] as $key => $image_name) {
    $img_tmp = $_FILES['img']['tmp_name'][$key];
    $image_type = $_FILES['img']['type'][$key];
    $image_size = $_FILES['img']['size'][$key];
    $img_error = $_FILES['img']['error'][$key];

    $content = file_get_contents($img_tmp);
    // insert to imgs with $realestateId
    $db1->InsertIntoImages($content, $image_name, $image_type, $image_size, $realestateID);
    
    }
    }
    
    // Poslati email ako nema gresaka u upisu u bazu...
    require 'config/PHPMailerAutoload.php';
    require 'config/mailer/class.phpmailer.php';
    require 'config/mailer/class.smtp.php';
    require 'config/email_config_user.php';

$emailbody = sprintf(
        "<hr><img src='http://www.datainvestment.rs/wp-content/uploads/2016/01/trans-logo-e1453907652943.png' alt='Data Investment'/></a><hr>"
        . "<strong>Poštovani Admine,</strong> "
        . "<br /><br />"
        . "<p><strong>Imate novu poruku za ponudu</strong></p>"
        . "<br /><br />"
        . "<p><strong>Možete je pogledati na http://www.datainvestment.rs/lista/</strong></p>"
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
$mail->SetFrom('postmaster@datainvestment.com', 'Post master', false);
$mail->Subject = $Subject;
$mail->Body = $emailbody;
$mail->AddAddress('kolikovredi@datainvestment.rs');

if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Ponuda je uspešno poslata";
 }

    
}
?>

<script type='text/javascript' src='/realestate/js/main.js'></script>
<link href="/realestate/css/style.css" rel="stylesheet" type="text/css"/>
<link href="/realestate/css/style2.css" rel="stylesheet" type="text/css"/>

<div class="main-wrapper-inner">
<div class="row">
<div class="col-md-12 main-content">
<div class="wrap-primary">

<!-- form -->                                       
<form class="form-inline" method="POST" enctype="multipart/form-data"> 
   <div class="row">
    
     <!-- Email -->
    <div class="form-group nepokretnosti-group">
        <label>Email:</label>
        <input style="min-height:33px" type="text" name="email_client" id="email_client" />
    </div>
     
     <!-- Kvadratura -->
    <div class="form-group nepokretnosti-group">
        <label for="kvadraturaId">Kvadratura:</label>
        <input style="min-height:33px" type="number" name="quadrature" id="quadrature" min=15 />m<sup>2</sup>
    </div>                         											 
    
     <!-- Opština -->
    <div class="form-group nepokretnosti-group">
        <label for="opstinaId">Opština:</label>
        <select 
            style="min-width:170px" 
            class="wpcf7-form-control wpcf7-text" 
            onchange="updateKatastar(false);validate();" 
            name="municipality" 
            id="opstinaId"
        >
           <option value="">Izaberite opštinu</option>
           <optgroup label="Opština" >
    <?php
        
        require_once 'classes/opstina.php';
                                                
        $opstina = $db1->SelectFromMunicipality();

            while ($ops = $opstina->fetch(PDO::FETCH_ASSOC)) {
                $oOpstina = new Opstina($ops['id_municipality'], $ops['name']);
                echo $oOpstina->createOption();
            }
    ?>
               </optgroup>
        </select>
    </div>
     
     <!-- Adresa. -->     
     <div class="form-group nepokretnosti-group">
       <label>Adresa:</label>
       <input style="min-height:33px" type="text" name="address_client" id="address_client" />
     </div>
       
     <!-- Katastarska Opština -->
    <div class="form-group nepokretnosti-group">
        <label for="katopstinaId">Katastarska opština:</label>
        <select onChange="validate();" disabled="disabled" class="wpcf7-form-control wpcf7-text" name="katopstinaId" id="katopstinaId">
           <option value="">Izaberite katastarsku opštinu</option>
         
        </select>
    </div>
								
    <div class="form-group nepokretnosti-group">
        <label for="vrstanepokretnosti">Vrste nepokretnosti:</label>
        <select 
            style="min-width:170px" 
            name="type_realestate" 
            class="wpcf7-form-control wpcf7-text"
            id="vrstaID"
            onChange="updateOption();validate();"  
        >
          <option value="">Izaberite vrstu nepokretnosti</option>        
          
    <?php  
        /* Tip Nepokretnosti */
        require_once 'classes/tip_nepo.php';
                                                
        $tnepo = $db1->SelectFromType();
                                                
            while ($nepo = $tnepo->fetch(PDO::FETCH_ASSOC)) {
                                                    
                $oTipNepo = new Tip_nepo($nepo['id_type'], $nepo['name']);
                echo $oTipNepo->createOption();                                 
            }
    ?>
    </select>
        
        <select onChange="updateClass();validate();" disabled="disabled" id="optionId" name="optionId">
            <option value="">Izaberite opciju</option>
        </select>
   
        <select disabled="disabled" id="classId" name="classId" onChange="validate();" >
            <option value="">Izaberite klasu zemljista</option>
        </select>
   <br/>
		
    <div class="form-group nepokretnosti-group">
        <label for="komentarId">Dodatni opis - Komentar:</label>
        <textarea onChange="validate();" style="min-height:200px;min-width:300px" class="comm" name="comment_client" id="comment"></textarea>
    </div>
    
    <div class="form-group nepokretnosti-group">
        <label for="slika">Slika nekretnine:</label>
        <input onChange="validate();" type="file" id="img" name="img[]" accept="image/x-png,image/gif,image/jpeg" multiple max/>
    </div><br/>
    
    <div class="form-group pull-right nepokretnosti-buttons">
        <input disabled="disabled" type="submit" id="submit" class="btn btn-default"
                name="send"  value="Pošalji Ponudu">
        <input type="reset" class="btn btn-default" value="Resetuj">
    </div>
        
   </div>
<hr>
   </div>
    </form>
</div></div></div></div>