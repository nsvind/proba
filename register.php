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
		<title>Registracija za Admina | Data Investment</title>
		<!--// Browser Specical Files //-->
     
		<!--// Browser Specical CSS //-->
		<!--[if IE 8]><link href="http://www.datainvestment.rs/wp-content/themes/Edu/assets/css/ie8.css" rel="stylesheet" type="text/css" /><![endif]-->
		<!--// Site Favicon //-->
            <link rel="shortcut icon" href="http://www.datainvestment.rs/wp-content/uploads/2014/03/favicon.ico" />
        
    <!--// WP HEAD //-->
	
	<!-- All in One SEO Pack 2.3.11.1 by Michael Torbert of Semper Fi Web Design[659,741] -->
	<meta name="description"  content="Registracija za Admina" />

	<meta name="keywords"  content="registracija, admin" />
	
	<link rel="canonical" href="http://www.datainvestment.rs/delatnosti/procena-vrednosti-i-strukture-kapitala-preduzeca/" />
	<!-- /all in one seo pack -->
	<link rel='dns-prefetch' href='//maps.google.com' />
	<link rel='dns-prefetch' href='//fonts.googleapis.com' />
	<link rel='dns-prefetch' href='//s.w.org' />
	<link rel="alternate" type="application/rss+xml" title="Data Investment &raquo; Feed" href="http://www.datainvestment.rs/feed/" />
	<link rel="alternate" type="application/rss+xml" title="Data Investment &raquo; Comments Feed" href="http://www.datainvestment.rs/comments/feed/" />
	<link rel="alternate" type="application/rss+xml" title="Data Investment &raquo; Procena vrednosti i strukture kapitala preduzeća Comments Feed" href="http://www.datainvestment.rs/delatnosti/procena-vrednosti-i-strukture-kapitala-preduzeca/feed/" />
	
	<?php
		require_once 'php/main.php';
	?>
		
	</head>
	
	<body class="use-editor page-template-default page page-id-876 page-child parent-pageid-867 layout-full-width-mod">
		
		
		<div class="page-outer-wrapper">
	 
		<!-- start of header -->
		<?php
			require_once 'inc/header.php';
		?><!--// #END header-outer-container //-->
		
		<div class="layout-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 column col-sm-12 col-md-12 clearfix">
                    <h1 class="page-title">Registracija za Admina</h1>
                </div>
                <div class="col-lg-12 column col-sm-12 col-md-12 clearfix">
                    <div class="st-breadcrumb"><!-- Breadcrumb NavXT 5.5.2 -->
<a title="Go to Data Investment." href="http://www.datainvestment.rs" class="home">Data Investment</a> &gt; <a title="Go to Delatnosti." href="http://www.datainvestment.rs/delatnosti/" class="post post-page">Delatnosti</a> &gt; Registracija za Admina</div></div>
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
								
		<form action="" method="POST" >
		
		<label>Ime:</label>
		<input type="text" name="first_name" /><br />
		<label>Prezime:</label>
		<input type="text" name="last_name" /><br />
		<label>Email:</label>
		<input type="text" name="email" /><br />
		<label>Password:</label>
		<input type="password" name="password" /><br />
		<input type="submit" name="register" value="Registruj se" />
<?php
	
		require_once 'baza/db_proba.php';
		
		$db1 = new DB("localhost","lokacije_proba","root","");
		
	if(isset($_POST['register'])) {
		$errMsg = '';
		
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		if($first_name == ''){
			$errMsg = 'Enter your first_name';
		}
		if($last_name == ''){
			$errMsg = 'Enter your last_name';
		}
		if($email == ''){
			$errMsg = 'Enter your email';
		}
		if($password == ''){
			$errMsg = 'Enter password';
		}
		if($errMsg == ''){
			$db1->InsertIntoAdmin($first_name, $last_name, $email, $password);
		}
	}

?>

</div><!-- /. end post_class -->                            </div>
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

	<script href="php/second.js"></script>
		
		</form>
	</body>
</html>