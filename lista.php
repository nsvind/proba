<?php
    session_start();
    if(!isset($_SESSION['id_admin'])){
	header('Location: login.php');
    } // na svim stranicama	
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
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--// Mobile Specific //-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1" />
    <!--// Title Tags //-->
    <title>E-mail lista ponuda | Data Investment</title>
    <link rel="shortcut icon" href="http://www.datainvestment.rs/wp-content/uploads/2014/03/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		
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
        	
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript">
            function searchMe() {
                var partialName = $("#partialName").val(), 
                    checked = $("#check")[0].checked;
            
                $.post("search.php", {partialName: partialName, check: checked}, function (data) {
                    if (data.length > 0) {
                        $("#all_data").hide();
                        $("#results").html(data);
                    } else {
                        $("#results").html('');
                       $("#all_data").show();
                    }
				
                });
            }
            
            function getChecked(){
                $("#formPagination").submit();
                return true;
            }
            
            function paginate(obj){
                $("#page").val(obj);
                $("#formPagination").submit();
                return true;
            }
    </script>
		
   <link href="css/style.css" rel="stylesheet" type="text/css"/>
   <link href="css/style2.css" rel="stylesheet" type="text/css"/>
   <link href="css/lista.css" rel="stylesheet" type="text/css"/>
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
             <h1 class="page-title">E-mail lista ponuda</h1>
          </div>
             <div class="col-lg-12 column col-sm-12 col-md-12 clearfix">
                <div class="st-breadcrumb"><!-- Breadcrumb NavXT 5.5.2 -->
                  <a title="Go to Data Investment." href="http://www.datainvestment.rs" class="home">Data Investment</a>
                   &gt; <a title="Go to Delatnosti." href="http://www.datainvestment.rs/delatnosti/" class="post post-page">
                      Delatnosti</a> &gt; <a href="login.php" class="post post-page"> Login za Admina </a>
                        &gt; E-mail lista ponuda</div></div>
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
	        
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
 <?php
    require_once "info.php";
    require_once 'baza/db_proba.php';

    $db1 = new DB();
    $checked = false;
    $partialName = '';
    if (isset($_POST['check']) && $_POST['check'] == 'on') {
        $checked = true;
    }
    if (isset($_POST['partialName'])) {
        $partialName = $_POST['partialName'];
    }
    $ukupnoIhIma = 0;
    $res = $db1->CountFromRealestateCheckbox($checked, $partialName);
     while ($new = $res->fetch(PDO::FETCH_ASSOC)) {
         $ukupnoIhIma = $new['broj'];
     }
     
    $limit = 2;
    $offset = 0;
    $first = 0;
    $last = (INT)($ukupnoIhIma / $limit);
    $page = 0;
    $next = 0;
    $previous = 0;
    
    if (isset($_POST['page'])) {
        $page = $_POST['page'];
        $offset = $limit * $page;
              
        $previous = $page - 1;
        $next = $page + 1;
    }
//    $offset = ((int)($ukupnoIhIma / $limit)) * $limit;
     
    $res = $db1->SelectFromRealestateCheckbox($limit, $offset, $checked, $partialName);
 ?>
        <tr>
        <td class="only" bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
            
        <form id="formPagination" name="formPagination" method="POST" action="">
            
         <table id="all_data" class="only">
          <tr class="only">
              <input <?php if ($checked) echo 'checked' ?> type="checkbox" id="check" name="check"
                    onChange="getChecked(this)">Prikazati obradjene<br /><br />
            <label>Search: </label>
            <input type="text" value="<?php echo $partialName?>" id="partialName" name="partialName"
                   style="max-width:170px;min-height:33px;" onkeyUp="searchMe()" /><br /><br />
            <input type="hidden" id="page" name="page" value="0">
             
			 
            <th class="only">RB.</th>
            <th class="only">E-mail</th>
            <th class="only">Opština</th>
            <th class="only">Grad</th>
            <th class="only"></th>

           </tr>
          <?php
          $count = 1;
            while ($new = $res->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr class='only'>";
                echo "<td class='only'>" . $count . "</td>";
                echo "<td class='only'>" . $new['email_client'] . "</td>";
                echo "<td class='only'>" . $new['m_name'] . "</td>";
                echo "<td class='only'>" . $new['community'] . "</td>";
                echo "<td class='only'><a href='detaljnije.php?id=" . $new['id_realestate'] . "'>Detaljnije</a></tr>";
                $count++;
            }
          ?>	

           <tr>
               <td colspan="5" style="text-align: center;">
                   <!-- >>> PAGINATOR <<< -->
                   
                   <a class='first' onclick="paginate(0);" href="#"> << </a>
                   <a class='first' onclick="paginate(<?php echo $previous ?>);" href="#"> < </a>
                   <?php
                    
                       for( $i = 0; $i < $last; $i++){ // SKINUO $last + 1
                        //   if($i == $first){
                            echo '<a onclick="paginate('.$i.');" href="#"> ' . ($i + 1) . ' </a>';
                        //   }    //echo 'Ukupno ih ima: ' . $ukupnoIhIma . ' a offset je: ' .$offset. ' a to je strnica br: ' . ($offset+1) . ' <br/>';
                       }
           
                   ?>
                   <a class='last' onclick="paginate(<?php echo $next ?>);" href="#"> > </a>
                   <a class='last' onclick="paginate(<?php echo $last - 1 ?>);" href="#"> >> </a>
                   <?php
                        
                        if($page == $first){
                            ?>
                                <style>
                                    .first {
                                        display: none;
                                    }
                                </style>
                            <?php
                        }else {
                            ?>
                                <style>
                                    .first {
                                        display: inline;
                                    }
                                </style>
                   <?php
                        }               
                   ?>
                    <?php
                   
                        if($page == ($last - 1)){
                            ?>
                                <style>
                                    .last {
                                        display: none;
                                    }
                                </style>
                    <?php
                        }else {
                    ?>
                                <style>
                                    .last {
                                        display: inline;
                                    }
                                </style>
                   <?php
                        }               
                   ?>
               </td>
           </tr>
           
           
         </table>
            </form>
        </td>
        </tr>

         <tr>
           <td id="results">
           </td>
         </tr>
    </table>   
          
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