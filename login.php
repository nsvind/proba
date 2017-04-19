<?php
    session_start();
    $_SESSION = array();
    session_unset();
    session_destroy();

    session_start();
	
$msg = '';
  if((isset($_POST['email_admin'])) and (isset($_POST['password']))){
        $email_admin = trim($_POST['email_admin']);
	$password = trim($_POST['password']);
        
	if(!empty($email_admin) and !empty($password)){
            require_once 'baza/db_proba.php';
		
            $db1 = new DB();
            $statement = $db1->SelectFromAdmin($email_admin, $password);
		
            if($statement->rowCount() > 1){
		$msg = "System error!";
            }else if($statement->rowCount() == 0){
		$msg = "Unknown user!";
            }else{
		$user = $statement->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['id_admin'] = $user['id_admin'];
                    $_SESSION['first_name'] = $user['first_name'];
                    $_SESSION['last_name'] = $user['last_name'];
                    $_SESSION['email_admin'] = $user['email_admin'];
                    //$_SESSION['w'] = "info"; 
            }
	}
 }
					
if(isset($_SESSION['id_admin'])){
        session_commit();
        header("Location: lista.php?page=0");
        exit(0);
        /*
        if (headers_sent()) {
            echo("<script>location.href = 'lista.php';</script>");
        }
        
        if (!headers_sent()) {
            die("Redirect failed. Please click on this link: <a href='login.php'>Login</a>");
        } */

}else{						
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Login | Data Investment</title>
    <link rel="shortcut icon" href="http://www.datainvestment.rs/wp-content/uploads/2014/03/favicon.ico" />
    <meta charset="UTF-8" />

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
<link rel='shortlink' href='http://www.datainvestment.rs/?p=1350' />
<link rel="alternate" type="application/json+oembed" href="http://www.datainvestment.rs/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fwww.datainvestment.rs%2Fevidencija-nepokretnosti%2F" />
<link rel="alternate" type="text/xml+oembed" href="http://www.datainvestment.rs/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fwww.datainvestment.rs%2Fevidencija-nepokretnosti%2F&#038;format=xml" />

    <link href="css/style.css" rel="stylesheet" type="text/css"/>
   <link href="css/style2.css" rel="stylesheet" type="text/css"/>
   <script type='text/javascript' src='js/main.js'></script>
   						
</head>
<body class="use-editor page-template page-template-mapa-nepokretnosti-template page-template-mapa-nepokretnosti-template-php page page-id-1350 layout-full-width-mod">

<div class="page-outer-wrapper">
    
<?php
    require_once 'inc/administracija.php';        
?><!--// #END header-outer-container //-->
		
<div class="layout-title">
 <div class="container">
   <div class="row">
     <div class="col-lg-12 column col-sm-12 col-md-12 clearfix">
          <h1 class="page-title">Login za Admina</h1>
     </div>
      <div class="col-lg-12 column col-sm-12 col-md-12 clearfix">
        <div class="st-breadcrumb"><!-- Breadcrumb NavXT 5.5.2 --> 
            <a title="Go to Data Investment." href="http://www.datainvestment.rs" class="home">Data Investment</a> &gt; <a title="Go to Delatnosti." href="http://www.datainvestment.rs/delatnosti/" class="post post-page">Delatnosti</a> &gt; Login za Admina</div>              
		</div>
      </div>            
    </div>
</div>

	
<div class="main-wrapper">
  <div class="container main-wrapper-outer">
    <div class="main-wrapper-inner">
      <div class="row">
        <div class="col-md-12 main-content">
          <div class="wrap-primary">
			<div class="use-editor post-876 page type-page status-publish hentry">
    <form action="" method="POST">
		
    <label>Email:</label>
	<input style="max-width:170px;min-height:33px;" type="text" name="email_admin" />
    <label>Password:</label>
	<input style="max-width:170px;min-height:33px;" type="password" name="password"/><br /><br />	
	<input type="submit" name="login" class="btn btn-default" value="Ulogujte se" /><br /><br />
        

								
</form>

<hr>
	</div>
            </div>    
          </div>
	</div>    
      </div>
    </div>    
  </div>

<?php
    require_once 'inc/footer.html';
?>
    
    </div>
<script type='text/javascript' src='http://www.datainvestment.rs/wp-content/plugins/contact-form-7/includes/js/jquery.form.min.js?ver=3.51.0-2014.06.20'></script>

<script type='text/javascript' src='http://www.datainvestment.rs/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=4.6'></script>
<script type='text/javascript' src='http://www.datainvestment.rs/wp-content/plugins/stToolKit/frontend/js/bootstrap.js?ver=3.0'></script>
<script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=true&#038;ver=4.7'></script>
<script type='text/javascript' src='http://www.datainvestment.rs/wp-includes/js/jquery/ui/core.min.js?ver=1.11.4'></script>
<script type='text/javascript' src='http://www.datainvestment.rs/wp-includes/js/jquery/ui/datepicker.min.js?ver=1.11.4'></script>
<script type='text/javascript' src='http://www.datainvestment.rs/wp-content/plugins/stToolKit/frontend/js/toolkit.min.js?ver=4.7'></script>
<script type='text/javascript' src='http://www.datainvestment.rs/wp-content/plugins/stToolKit/frontend/js/st-user.js?ver=4.7'></script>
<script type='text/javascript' src='http://www.datainvestment.rs/wp-includes/js/underscore.min.js?ver=1.8.3'></script>
<script type='text/javascript' src='http://www.datainvestment.rs/wp-includes/js/shortcode.min.js?ver=4.7'></script>
<script type='text/javascript' src='http://www.datainvestment.rs/wp-content/plugins/stMegaMenu/site/js/stmenu.js?ver=4.7'></script>
<script type='text/javascript' src='http://www.datainvestment.rs/wp-content/themes/Edu/assets/js/ddsmoothmenu.js?ver=1.5'></script>
<script type='text/javascript' src='http://www.datainvestment.rs/wp-content/themes/Edu/assets/js/custom.js?ver=1.0'></script>
<script type='text/javascript' src='http://www.datainvestment.rs/wp-includes/js/comment-reply.min.js?ver=4.7'></script>
<script type='text/javascript' src='http://www.datainvestment.rs/wp-includes/js/wp-embed.min.js?ver=4.7'></script>

<link rel="stylesheet" href="http://www.datainvestment.rs/wp-content/themes/Edu/assets/css/datepicker.css">
<link rel="stylesheet" href="http://www.datainvestment.rs/wp-content/themes/Edu/assets/css/datepicker3.css">
<link rel="stylesheet" href="http://www.datainvestment.rs/wp-content/themes/Edu/assets/css/leaflet.css">
<link rel="stylesheet" href="http://www.datainvestment.rs/wp-content/themes/Edu/assets/css/jquery-multiselect.css">
<link rel="stylesheet" href="http://www.datainvestment.rs/wp-content/themes/Edu/assets/css/MarkerCluster.css">
<link rel="stylesheet" href="http://www.datainvestment.rs/wp-content/themes/Edu/assets/css/MarkerCluster.Default.css">
<script src="http://www.datainvestment.rs/wp-content/themes/Edu/assets/js/leaflet.js"></script>
<script src="http://www.datainvestment.rs/wp-content/themes/Edu/assets/js/leaflet-providers.js"></script>
<script src="http://www.datainvestment.rs/wp-content/themes/Edu/assets/js/leaflet.markercluster-src.js"></script>
<script src="http://www.datainvestment.rs/wp-content/themes/Edu/assets/js/jquery-ui.min.js"></script>
<script src="http://www.datainvestment.rs/wp-content/themes/Edu/assets/js/jquery-multiselect.js"></script>
<script src="http://www.datainvestment.rs/wp-content/themes/Edu/assets/js/bootstrap-datepicker.js"></script>

</body>
</html>	
					
<?php
    }
?>