<?php
	require_once 'baza/db_proba.php';	
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html" />
		<meta charset="UTF-8"/>
		<title>Demystifying Email Design</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body style="margin: 0; padding: 0;">
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td>
     <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
       <tr>
         <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0;">
          <!--<img src="images/h1.gif" alt="Creating Email Magic" width="300" height="230" style="display: block;" />-->
<?php
    require_once 'inc/header_only.html';
?>
         </td>
       </tr>
       <tr>
         <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
           <table border="0" cellpadding="0" cellspacing="0" width="100%">
<?php  
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
			echo "<p>Email: " . $new['email'] . "</p>";
			echo "<p>Grad: " . $new['location'] . "</p>";
			echo "<p>Nepokretnost: " . $new['nepokretnost'] . " - " . $new['opis'] . "</p>";		
	  }	
	}
?><br />
			
			<form action="" method="POST">
				<label>Cena:</label>
				<input type="number" name="cena" /><label>DIN</label><br />
				<p>Poslati email na:<?php echo " " . $new['email']; ?></p>
				<input type="submit" value="Posalji" /><br />
				
<?php
				
	if(isset($_POST['cena'])){
	   $cena = $_POST['cena'];
		if(!empty($cena)){
		   echo "OK";
		}else{
		   echo "NO";
		}
	}

?>
		</form>
<?php
	//echo "<p> " . $new['datum'] . "</p>";
?>
		</td>
            </tr>
           </table>
         </td>
       </tr>
       <tr>
         <td bgcolor="#ee4c50" style="padding: 30px 30px 30px 30px;">
           <table border="0" cellpadding="0" cellspacing="0" width="100%">
             <td width="75%">
              &reg; Someone, somewhere 2013<br/>
              Unsubscribe to this newsletter instantly
             </td>
             <td align="right">
              <table border="0" cellpadding="0" cellspacing="0">
               <tr>
                <td>
                 <a href="http://www.twitter.com/">
                  <img src="images/tw.png" alt="Twitter" width="38" height="38" style="display: block;" border="0" />
                 </a>
                </td>
                <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                <td>
                 <a href="http://www.facebook.com/">
                  <img src="images/fb.jpg" alt="Facebook" width="38" height="38" style="display: block;" border="0" />
                 </a>
                </td>
               </tr>
              </table>
             </td>
           </table>
         </td>
       </tr>
     </table>

 </table>		
	</body>
</html>