<?php

require_once 'baza/db_proba.php';
if (isset($_GET['m']) && $_GET['m'] === 'f') {
    echo "EMAIL NIJE POSLAT....";
}

    $db1 = new DB();
    $comments = null;

    if(isset($_GET['id'])){
	  $id = trim($_GET['id']);
	  $new_id = $id;
	  if(!empty($id)){
	
            $resComments = $db1->SelectFromComments($id);
            if($resComments->rowCount() == 1){
                $comments = $resComments->fetch(PDO::FETCH_ASSOC);
            }
            
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
                        echo "<p><strong>Komentar: </br> </strong>" . $new['comment_client'] . "</p>"; 

                        
                        $res1 = $db1->SelectIDsFromImages($id);
                        
                        while($new1 = $res1->fetch(PDO::FETCH_ASSOC)){
                            echo "<img width='25%' height='25%' alt='" . $new1['image_name'] . "'  src='/realestate/getImage.php?id=" // visina ne mora, automacki ce je browser uraditi
                                    . $new1['id_images'] . "'/><br />";
                        }
                        echo "</p>";
	  }	
    }

    $comments_price = 0;
    $comments_comment_admin = "Nema komentara...";
    $disabled = '';
    $color = '';
    
    if ($comments != null) {
        $comments_price = $comments['price'];
        $comments_comment_admin = $comments['comment_admin'];
        $disabled = 'disabled';
        $color = '#f2f2f2';
    }
?>
              
<br />

<form action="mail_admin.php" method="POST" autocomplete="off" >
    <label for="cena">Cena:</label>
    <input type="number" style="max-width:170px;min-height:33px;background-color: <?php echo $color ?>;" 
           value="<?php echo $comments_price; ?>" name="price" <?php echo $disabled; ?>/>EUR<br />
    <br />
    
    <input type="hidden" name="id_realestate" value="<?php echo $new['id_realestate'] ; ?>" />
    <label for="comment">Komentar:</label>
    <textarea style="min-height:200px;min-width:200px;background-color: <?php echo $color ?>;" 
              class="comm" name="comment_admin" id="comment" 
                  <?php echo $disabled; ?> /><?php echo $comments_comment_admin; ?></textarea>   
    <br/>
    <br/>
    <p><strong>Poslati E-mail na:</strong><?php echo " " . $new['email_client']; ?></p>
    <br/>
    <input type="submit" class="btn btn-default" value="Pošalji" />


<!-- <a href="javasctipt: window.history.back();" onclick="window.history.back();">Nazad</a> -->

<button class="btn btn-default" onclick="window.history.back();">Nazad</button><br />
</form>
