<?php 
require_once 'baza/db_proba.php';

$db1 = new DB();
	
$partialName = $_POST['partialName'];
$check = $_POST['check'];
	
//	echo "email:" . $partialName;
	
if( strlen($partialName) < 2){
	return;
}
	
$names = $db1->SelectFromRealestate($partialName, $check);
?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">	 
<?php
if( $names->rowCount() ){
?>          
    <tr>
	<td class="only" bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
          <table class="only">
            <tr class="only">    
                            
            <th class="only">RB.</th>
            <th class="only">E-mail</th>
            <th class="only">Opština</th>
            <th class="only">Grad</th>
            <th class="only"></th>
            </tr>
<?php
    $count = 1;
    while($nameArray = $names->fetch(PDO::FETCH_ASSOC)){
	echo "<tr class='only'>";
	echo "<td class='only'>" . $count . "</td>";
	echo "<td class='only'>" . $nameArray['email_client'] . "</td>";
	echo "<td class='only'>" . $nameArray['m_name'] . "</td>";
	echo "<td class='only'>" . $nameArray['community'] . "</td>";
	echo "<td class='only'><a href='detaljnije.php?id=" . $nameArray['id_realestate'] . "'>Detaljnije</a></td></tr>";
        $count++;
    }
	
?>
    </table>
    </td>
    </tr>
        <tr>
           <td>
           </td>
         </tr>
</table>
<?php
}