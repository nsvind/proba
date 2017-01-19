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
        <title>Ponuda | Data Investment</title>
        <!--// Browser Specical Files //-->

        <!--// Browser Specical CSS //-->
        <!--[if IE 8]><link href="http://www.datainvestment.rs/wp-content/themes/Edu/assets/css/ie8.css" rel="stylesheet" type="text/css" /><![endif]-->
        <!--// Site Favicon //-->
        <link rel="shortcut icon" href="http://www.datainvestment.rs/wp-content/uploads/2014/03/favicon.ico" />

        <!--// WP HEAD //-->

        <!-- All in One SEO Pack 2.3.11.1 by Michael Torbert of Semper Fi Web Design[659,741] -->
        <meta name="description"  content="Ponuda za kupovinu nekretnina" />

        <meta name="keywords"  content="ponuda, nekretnina, nekretnine, stan, kuća" />

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

            <!-- Start of header -->
            <?php
            require_once 'inc/header.php';
            ?><!--// #END header-outer-container //-->

            <div class="layout-title">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 column col-sm-12 col-md-12 clearfix">
                            <h1 class="page-title">Ponuda za kupovinu nekretnina</h1>
                        </div>
                        <div class="col-lg-12 column col-sm-12 col-md-12 clearfix">
                            <div class="st-breadcrumb"><!-- Breadcrumb NavXT 5.5.2 -->
                                <a title="Go to Data Investment." href="http://www.datainvestment.rs" class="home">Data Investment</a> &gt; <a title="Go to Delatnosti." href="http://www.datainvestment.rs/delatnosti/" class="post post-page">Delatnosti</a> &gt; Ponuda za kupovinu nekretnina</div></div>
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

                                        <form action="" method="POST" class="clear">
                                            <label>Tip Nekretnine:</label>
                                            <select name="nepokretnost" id="nepokretnost">
                                                <option></option>
                                                <?php
                                                require_once 'classes/tip_nepo.php';
                                                $db3 = new Tip_nepo();
                                                $tnepo = $db3->createOption();

                                                while ($nepo = $tnepo->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                    <option value="<?php echo $id_nepo; ?>"></option>
                                                    <?php
                                                }
                                                ?>

                                                <!--<option value="1">Stan</option>
                                                     <option value="2">Kuća</option>
                                                     <option value="3">Zemljište</option>-->
                                            </select>
                                            <select name="opis" id="opcija1">
                                                <option></option>
                                                <option value="1">Pomocni objekti + povrišine</option>
                                                <option value="2">Plac površina</option>
                                            </select>
                                            <select id="opcija2">
                                                <option></option>
                                                <option value="1">Poljoprivredno</option>
                                                <option value="2">Gradjevinsko</option>
                                            </select>
                                            <br /><br />
                                            <label>Grad:</label>
                                            <select name="location" id="location">
                                                <option></option>
                                                <?php
                                                require_once 'classes/opstina.php';
                                                $db2 = new Opstina();
                                                $opstina = $db2->createOption();


                                                while ($ops = $opstina->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                    <option value="<?php $id_opstina; ?>"></option>
                                                    <?php
                                                }
                                                ?>
                                                <!--<option></option>
                                                <option value="1"></option>
                                                <option value="2"></option>-->
                                            </select>
                                            <!--<label>Deo Grada:</label>
                                            <select>
                                                    <option><option>
                                            </select>
                    
                                            
                                            -->
                                            <label>Email:</label>
                                            <input type="text" name="email" id="sender" /><br /><br />
                                            <label>Ostavite komentar:</label>
                                            <textarea class="comm" name="comment" id="comment"></textarea><br /><br />
                                            <input type="submit" name="send" value="Pošalji Email" />

<?php
require_once 'baza/db_proba.php';

$db1 = new DB();

if (isset($_POST['send'])) {
    $errMsg = '';

    $email = $_POST['email'];
    $nepokretnost = $_POST['nepokretnost'];
    $opis = $_POST['opis'];
    $location = $_POST['location'];
    $comment = $_POST['comment'];
    if ($email == '') {
        $errMsg = 'Uneiste email';
    }
    if ($nepokretnost == '') {
        $errMsg = 'Unesite nepokretnost';
    }
    if ($location == '') {
        $errMsg = 'Unesite lokaciju';
    }
    if ($comment == '') {
        $errMsg = 'Unesite komentar';
    }
    if ($errMsg == '') {
        $db1->InsertIntoPonuda($email, $nepokretnost, $opis, $location, $comment);
    }
}
?>

                                        </form>


                                        <p>Procena vrednosti i strukture kapitala preduzeća jedan je od najvažnijih pokazatelja koji suštinski opredeljuje donosioce poslovnih odluka da postupaju na ispravan, poslovno utemeljen na�?in. Sve najvažnije odluke u kompanijama donose se vodeći ra�?una o prethodno izvršenoj proceni vrednosti i strukture kapitala.</p>
                                        <p>Procena kapitala je krucijalna aktivnost koja, u dinami�?nom i promenljivom tržišnom okruženju, podložnom neprestanim fluktuacijama, daje pravu, reprezentativnu sliku vrednosti i strukture ukupnog kapitala privrednog subjekta. Stoga je od presudnog zna�?aja da sve procene budu sastavljene stru�?no, savesno i, pre svega, nepristrasno, kako bi slika o realnoj tržišnoj vrednosti kapitala preduzeća bila jasna, precizna i zasnovana na objektivnim, proverljivim podacima. A upravo su stru�?nost, preciznost, jasnoća i nepristrasnost osnovni postulati na kojima se temelji naš rad.</p>
                                        <p>Procene kapitala se obavljaju radi �?itavog niza razloga razli�?ite prirode (finansijsko izveštavanje i analiza, privatizacija, dokapitalizacija, statusne promene, ste�?ajni postupci), a naš tim eksperata sa dugogodišnjim iskustvom je izradio brojne procene kapitala u navedene svrhe. Metode koje se koriste prilikom izrade procene vrednosti i strukture kapitala su brojne i razli�?ite po karakteru i dužnost je procenitelja da odabere najadekvatniji postupak procene, vodeći ra�?una o mnoštvu faktora koji uti�?u na vrednost preduzeća i, na osnovu ispitivanja i analiziranja svih relevantnih informacija, sa�?ini najkvalitetniju sliku vrednosti kapitala privrednog subjekta.</p>
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

            <!-- Start of footer -->
<?php
require_once 'inc/footer.html';
?><!--// #END footer-outer-wrapper //-->

            <div id="toTop">Back to Top</div>
        </div> 
        <!--// #END page-outer-wrapper //-->
        <script src="php/second.js"></script>


        <script type="text/javascript">
            $(function () {
                $('#opcija1').hide();
                $('#opcija2').hide();
                $('#nepokretnost').on('change', function (event) {
                    var opt = this.options[ this.selectedIndex ];
                    var picked_kuca = $(opt).text().match(/Kuća/i);
                    var picked_zemlja = $(opt).text().match(/Zemljište/i);
                    if (picked_kuca) {
                        $('#opcija1').show();
                        $('#opcija2').hide();
                    } else if (picked_zemlja) {
                        $('#opcija2').show();
                        $('#opcija1').hide();
                    } else {
                        $('#opcija1').hide();
                        $('#opcija2').hide();
                    }
                });
            });
        </script>

    </body>
</html>