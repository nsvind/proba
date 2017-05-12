<?php
    session_start();
    if(!isset($_SESSION['id_admin'])){
	header('Location: login.php');
    } // na svim stranicama
    
    require_once 'baza/db_proba.php';
?> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--// Mobile Specific //-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1" />
    <!--// Title Tags //-->
    <title>Ponuda | Data Investment</title>
    <!--// Browser Specical Files //-->
     
    <!--// Browser Specical CSS //-->
    <!--[if IE 8]><link href="http://www.datainvestment.rs/wp-content/themes/Edu/assets/css/ie8.css" rel="stylesheet" type="text/css" /><![endif]-->
    <!--// Site Favicon //-->
    <link rel="shortcut icon" href="http://www.datainvestment.rs/wp-content/uploads/2014/03/favicon.ico" />

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
        require_once 'inc/header.php';
    ?>
	
   <div class="layout-title">
      <div class="container">
        <div class="row">
         <div class="col-lg-12 column col-sm-12 col-md-12 clearfix">
            <h1 class="page-title">Ponuda</h1>
         </div>
            <div class="col-lg-12 column col-sm-12 col-md-12 clearfix">
             <div class="st-breadcrumb"><!-- Breadcrumb NavXT 5.5.2 -->
                 <a title="Go to Data Investment." href="http://www.datainvestment.rs" class="home">
                     Data Investment</a> &gt; <a title="Go to Delatnosti." href="http://www.datainvestment.rs/delatnosti/" 
                             class="post post-page">Delatnosti</a> &gt; 
                             <a href="login.php" class="post post-page"> Login za Admina </a> &gt; 
                             <a href="lista.php" class="post post-page"> E-mail lista ponuda </a> &gt; Ponuda</div></div>
        </div>            
      </div>
   </div>
    <div class="main-wrapper">
     <div class="container main-wrapper-outer">
      <div class="main-wrapper-inner">
       <div class="row" >
          <div class="col-lg-8 col-sm-8 col-md-8  column main-content"> 
            <div class="wrap-primary"> 
              <div class="use-editor post-876 page type-page status-publish hentry">
	       <h1>Detalji o Ponudi:</h1> 
<?php  

if (isset($_GET['m']) && $_GET['m'] === 'f') {
    echo "EMAIL NIJE POSLAT....";
}

    $db1 = new DB();

    if(isset($_GET['id'])){
	  $id = trim($_GET['id']);
	  $new_id = $id;
	  if(!empty($id)){
		
            $res = $db1->SelectFromDetaljnije($id);
		if($res->rowCount() != 1){
		  die("Greska");
		}
		$new = $res->fetch(PDO::FETCH_ASSOC);
                        //echo "<h1>Detalji o ponudi</h1>";
			echo "<p><strong>E-mail: </strong>" . $new['email_client'] . "</p>";
			echo "<p><strong>Opština: </strong>" . $new['m_name'] . "</p>";
                        echo "<p><strong>Grad: </strong>" . $new['community'] . "</p>";
                        echo "<p><strong>Adresa: </strong>" . $new['address_client'] . "</p>";
			echo "<p><strong>Nepokretnost: </strong>" . $new['tof_name'] . " - " . $new['o_name'] . " "
                                . $new['cl_name'] . "</p>";
                        echo "<p><strong>Kvadratura: </strong>" . $new['quadrature'] . " m<sup>2</sup></strong></p>";
                        echo "<p><strong>Komentar: </strong>" . $new['comment_client'] . "</p>";
                        
                        $res1 = $db1->SelectIDsFromImages($id);
                        
                        while($new1 = $res1->fetch(PDO::FETCH_ASSOC)){
                            echo "<img width='25%' height='25%' alt='" . $new1['image_name'] . "'  src='./getImage.php?id=" // visina ne mora, automacki ce je browser uraditi
                                    . $new1['id_images'] . "'/><br />";
                        }
                        echo "</p>";
	  }	
    }
?>
              
<br />

<form action="mail_admin.php" method="POST" autocomplete="off" >
    <label for="cena">Cena:</label>
    <input type="number" style="max-width:170px;min-height:33px;" name="price" />EUR<br />
    <br />
    
    <input type="hidden" name="id_realestate" value="<?php echo $new['id_realestate'] ; ?>" />
    <label for="comment">Komentar:</label>
    <textarea class="comm" name="comment_admin" id="comment"></textarea>   
    <br/>
    <br/>
    <p><strong>Poslati E-mail na:</strong><?php echo " " . $new['email_client']; ?></p>
    <br/>
    <input type="submit" class="btn btn-default" value="Pošalji" /><br />
</form>

<?php
				
    if(isset($_POST['price'])){
	$cena = $_POST['price'];
	if(!empty($cena)){
            echo "OK";
	}
        if(empty($cena)){
            echo "NO";
        }
    }

    //echo "<p> " . $new['datum'] . "</p>";
?>


     </div><!-- /. end post_class -->                            
   </div>
 </div>
		
    <!-- Start of sidebar -->
    <?php
	require_once 'inc/sidebar.html';
    ?><!--// #END sidebar //-->
    
           </div>
        </div>
    </div><!-- end .containner -->
</div><!-- /.main-wrapper -->
	
    <!-- start of footer -->
    <?php
	require_once 'inc/footer.html';
    ?><!--// #END footer-outer-wrapper //-->
    
    <div id="toTop">Back to Top</div>
    
</div> 
<!--// #END page-outer-wrapper //-->
	
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