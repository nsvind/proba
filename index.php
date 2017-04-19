<?php
 require_once 'baza/db_proba.php';
 $db1 = new DB();  
//nsvind.hopto.org:8081/datainvestment/
if (isset($_POST['send'])) {
   
    $errMsg = '';

    $email_client = $_POST['email_client'];
    $quadrature = $_POST['quadrature'];
    $comment_client = $_POST['comment_client'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $typeID = $_POST['type_realestate'];
    $municipalityID = $_POST['municipality'];
    $catastralID = $_POST['katopstinaId'];
    
    $optionID = $_POST['optionId'];
    $classID = $_POST['classId'];
    
    if ($errMsg == '') {
        $db1->InsertIntoRealestate($email_client, $quadrature, $comment_client,
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
  /*  
    if ($image_size > 11) {
        echo "Sorry, your file is too large.";
    }*/
    
        // insert to comments with $realestateId
        //$db1->InsertIntoComments($realestateID, $adminID, $comment_admin, $price);
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
        . "<p><strong>Možete je pogledati na http://localhost/datainvestment/lista.php</strong></p>"
       // . "<p>%s</p>", //comment
       // $comment_client
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
$mail->SetFrom('postmaster@datainvestment.com', 'Post master');
$mail->Subject = $Subject;
$mail->Body = $emailbody;
$mail->AddAddress('nsvind@gmail.com');

if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }

    
}
?>
<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" lang="en-US">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" lang="en-US">
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html lang="en-US">
<!--<![endif]-->
<head>
<title>Evidencija nepokretnosti | Data Investment</title>
  <link rel="shortcut icon" href="http://www.datainvestment.rs/wp-content/uploads/2014/03/favicon.ico" />
	<meta charset="UTF-8"/>

<link rel='stylesheet' id='layerslider-css'  href='http://www.datainvestment.rs/wp-content/plugins/LayerSlider/static/css/layerslider.css?ver=5.0.2' type='text/css' media='all' />
<link rel='stylesheet' id='ls-google-fonts-css'  href='http://fonts.googleapis.com/css?family=Lato:100,300,regular,700,900|Open+Sans:300|Indie+Flower:regular|Oswald:300,regular,700&#038;subset=latin,latin-ext' type='text/css' media='all' />
<link rel='stylesheet' id='contact-form-7-css'  href='http://www.datainvestment.rs/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=4.6' type='text/css' media='all' />
<link rel='stylesheet' id='fontello-css'  href='http://www.datainvestment.rs/wp-content/plugins/stToolKit/assets/css/fontello.css?ver=4.7' type='text/css' media='all' />
<link rel='stylesheet' id='fontello-animation-css'  href='http://www.datainvestment.rs/wp-content/plugins/stToolKit/assets/css/animation.css?ver=4.7' type='text/css' media='all' />
<link rel='stylesheet' id='fontello-ie7-css'  href='http://www.datainvestment.rs/wp-content/plugins/stToolKit/assets/css/fontello-ie7.css?ver=4.7' type='text/css' media='all' />
<link rel='stylesheet' id='bootstrap-css'  href='http://www.datainvestment.rs/wp-content/themes/Edu/assets/css/bootstrap.css?ver=3.0' type='text/css' media='all' />
<link rel='stylesheet' id='st_menu-css'  href='http://www.datainvestment.rs/wp-content/themes/Edu/assets/css/stmenu.css?ver=1.0' type='text/css' media='all' />
<link rel='stylesheet' id='jquery-ui-css'  href='http://www.datainvestment.rs/wp-content/themes/Edu/st-framework/assets/css/smoothness/jquery-ui-1.7.3.custom.css?ver=1.7.3' type='text/css' media='all' />
<link rel='stylesheet' id='st_style-css'  href='http://www.datainvestment.rs/wp-content/themes/Edu/style.css?ver=1.0' type='text/css' media='all' />
<link rel='stylesheet' id='st_toolkit-css'  href='http://www.datainvestment.rs/wp-content/themes/Edu/assets/css/sttoolkit.css?ver=1.0' type='text/css' media='all' />
<link rel='stylesheet' id='magnific-popup-css'  href='http://www.datainvestment.rs/wp-content/themes/Edu/assets/css/magnific-popup.css?ver=1.0' type='text/css' media='all' />
<script type='text/javascript' src='http://www.datainvestment.rs/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>
<script type='text/javascript' src='http://www.datainvestment.rs/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1'></script>
<script type='text/javascript' src='http://www.datainvestment.rs/wp-content/plugins/LayerSlider/static/js/layerslider.kreaturamedia.jquery.js?ver=5.0.2'></script>
<script type='text/javascript' src='http://www.datainvestment.rs/wp-content/plugins/LayerSlider/static/js/greensock.js?ver=1.11.2'></script>
<script type='text/javascript' src='http://www.datainvestment.rs/wp-content/plugins/LayerSlider/static/js/layerslider.transitions.js?ver=5.0.2'></script>
<link rel='https://api.w.org/' href='http://www.datainvestment.rs/wp-json/' />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://www.datainvestment.rs/xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://www.datainvestment.rs/wp-includes/wlwmanifest.xml" />
<meta name="generator" content="WordPress 4.7" />
<!--<link rel='shortlink' href='http://www.datainvestment.rs/?p=1350' />
<!--<link rel="alternate" type="application/json+oembed" href="http://www.datainvestment.rs/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fwww.datainvestment.rs%2Fevidencija-nepokretnosti%2F" />
<!--<link rel="alternate" type="text/xml+oembed" href="http://www.datainvestment.rs/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fwww.datainvestment.rs%2Fevidencija-nepokretnosti%2F&#038;format=xml" />-->

   <link href="css/style.css" rel="stylesheet" type="text/css"/>
   <link href="css/style2.css" rel="stylesheet" type="text/css"/>
   <script type='text/javascript' src='js/main.js'></script>
   
</head>
<body class="use-editor page-template page-template-mapa-nepokretnosti-template page-template-mapa-nepokretnosti-template-php page page-id-1350 layout-full-width-mod">
<div class="page-outer-wrapper">

    <?php
      require_once 'inc/header.php';
    ?>
    
<div class="layout-title">
 <div class="container">
   <div class="row">
     <div class="col-lg-12 column col-sm-12 col-md-12 clearfix">
         <h1 class="page-title">Evidencija nepokretnosti</h1>
     </div>
   <div class="col-lg-12 column col-sm-12 col-md-12 clearfix">
     <div class="st-breadcrumb"><!-- Breadcrumb NavXT 5.5.2 -->
<a title="Go to Data Investment." href="http://www.datainvestment.rs" class="home">Data Investment</a> &gt; Evidencija nepokretnosti</div>                </div>
    </div>            
 </div>
</div>
	
<div class="main-wrapper">
  <div class="container main-wrapper-outer">
    <div class="main-wrapper-inner">
      <div class="row">
        <div class="col-md-12 main-content">
          <div class="wrap-primary">
              
<!-- form -->                                       
<form class="form-inline" action="index.php" method="POST" enctype="multipart/form-data">
    

    
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
        <label for="komentarId">Komentar:</label>
        <textarea onChange="validate();"  class="comm" name="comment_client" id="comment"></textarea>
    </div>
    
    <div class="form-group nepokretnosti-group">
        <label for="slika">Slika:</label> <!-- onChange="validate();" -->
        <input onChange="validate();" type="file" id="img" name="img[]" accept="image/x-png,image/gif,image/jpeg" multiple max/>
    </div><br/>
    
    <div class="form-group pull-right nepokretnosti-buttons">
        <input disabled="disabled" type="submit" id="submit" name="send" class="btn btn-default" value="Pošalji Email">
        <!--<input type="button" class="btn btn-default" onclick="resetuj()" value="Resetuj">-->
        <input type="reset" class="btn btn-default" value="Resetuj">
    </div>
        
   </div>
<hr>
            </div></form>
    
          </div>
	</div>    
      </div>
    </div>    
</div>
	

	
<?php
    require_once 'inc/footer.html';
?>
</div>

<!--<script type='text/javascript' src='http://www.datainvestment.rs/wp-content/plugins/contact-form-7/includes/js/jquery.form.min.js?ver=3.51.0-2014.06.20'></script>

<!--<script type='text/javascript' src='http://www.datainvestment.rs/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=4.6'></script>
<!--<script type='text/javascript' src='http://www.datainvestment.rs/wp-content/plugins/stToolKit/frontend/js/bootstrap.js?ver=3.0'></script>
<!--<script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=true&#038;ver=4.7'></script>
<!--<script type='text/javascript' src='http://www.datainvestment.rs/wp-includes/js/jquery/ui/core.min.js?ver=1.11.4'></script>
<!--<script type='text/javascript' src='http://www.datainvestment.rs/wp-includes/js/jquery/ui/datepicker.min.js?ver=1.11.4'></script>
<!--<script type='text/javascript' src='http://www.datainvestment.rs/wp-content/plugins/stToolKit/frontend/js/toolkit.min.js?ver=4.7'></script>
<!--<script type='text/javascript' src='http://www.datainvestment.rs/wp-content/plugins/stToolKit/frontend/js/st-user.js?ver=4.7'></script>
<!--<script type='text/javascript' src='http://www.datainvestment.rs/wp-includes/js/underscore.min.js?ver=1.8.3'></script>
<!--<script type='text/javascript' src='http://www.datainvestment.rs/wp-includes/js/shortcode.min.js?ver=4.7'></script>
<!--<script type='text/javascript' src='http://www.datainvestment.rs/wp-content/plugins/stMegaMenu/site/js/stmenu.js?ver=4.7'></script>
<!--<script type='text/javascript' src='http://www.datainvestment.rs/wp-content/themes/Edu/assets/js/ddsmoothmenu.js?ver=1.5'></script>
<!--<script type='text/javascript' src='http://www.datainvestment.rs/wp-content/themes/Edu/assets/js/custom.js?ver=1.0'></script>
<!--<script type='text/javascript' src='http://www.datainvestment.rs/wp-includes/js/comment-reply.min.js?ver=4.7'></script>
<!--<script type='text/javascript' src='http://www.datainvestment.rs/wp-includes/js/wp-embed.min.js?ver=4.7'></script>

<!--<link rel="stylesheet" href="http://www.datainvestment.rs/wp-content/themes/Edu/assets/css/datepicker.css">
<!--<link rel="stylesheet" href="http://www.datainvestment.rs/wp-content/themes/Edu/assets/css/datepicker3.css">
<!--<link rel="stylesheet" href="http://www.datainvestment.rs/wp-content/themes/Edu/assets/css/leaflet.css">
<!--<link rel="stylesheet" href="http://www.datainvestment.rs/wp-content/themes/Edu/assets/css/jquery-multiselect.css">
<!--<link rel="stylesheet" href="http://www.datainvestment.rs/wp-content/themes/Edu/assets/css/MarkerCluster.css">
<!--<link rel="stylesheet" href="http://www.datainvestment.rs/wp-content/themes/Edu/assets/css/MarkerCluster.Default.css">
<!--<script src="http://www.datainvestment.rs/wp-content/themes/Edu/assets/js/leaflet.js"></script>
<!--<script src="http://www.datainvestment.rs/wp-content/themes/Edu/assets/js/leaflet-providers.js"></script>
<!--<script src="http://www.datainvestment.rs/wp-content/themes/Edu/assets/js/leaflet.markercluster-src.js"></script>
<!--<script src="http://www.datainvestment.rs/wp-content/themes/Edu/assets/js/jquery-ui.min.js"></script>
<!--<script src="http://www.datainvestment.rs/wp-content/themes/Edu/assets/js/jquery-multiselect.js"></script>
<!--<script src="http://www.datainvestment.rs/wp-content/themes/Edu/assets/js/bootstrap-datepicker.js"></script>-->

</body>
</html>	