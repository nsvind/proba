<?php
require_once 'baza/db_proba.php';

$db1 = new DB();
	
$partialName = $_POST['partialName'];
	
//	echo "email:" . $partialName;
	
if( strlen($partialName) < 2){
	return;
}
	
	//$names = $conn->query("SELECT * FROM ponuda WHERE email LIKE '%$partialName%' OR location LIKE '%$partialName%'");
//$names = $conn->prepare("SELECT * FROM ponuda WHERE email LIKE :email");
	//$conn->bindParam(':name', "%$partialName%");
// $conn->execute();
// $names = $conn->fetchAll();

//SelectFromPonuda($conn, $email, $location);
/*
try {
			 $names = $conn->prepare("SELECT * FROM ponuda WHERE email LIKE '%$partialName%' OR location LIKE '%$partialName%'");
			 $names->bindParam(1, $email);
			 $names->bindParam(2, $location);
			 $names->execute();
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
*/		

$names = $db1->SelectFromPonuda($partialName);

// echo "\nnum: " . $names->fetchColumn();

if( $names->rowCount() ){
?>

<table border="0" cellpadding="0" cellspacing="0" width="100%">	   
	<tr>
		<td class="only" bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
			<table class="only">
	<?php
	while($nameArray = $names->fetch(PDO::FETCH_ASSOC)){
		echo "<tr class='only'>";
		echo "<td class='only'>" .$nameArray['id_ponuda'] . "</td>";
		echo "<td class='only'>" .$nameArray['email'] . "</td>";
		echo "<td class='only'>" .$nameArray['location'] . "</td>";
		echo "<td class='only'><a href='detaljnije.php?id=" . $nameArray['id_ponuda'] . "'>Detaljnije</a></td></tr>";
	}
	
?>
	</table>
	</td>
	</tr>
	</table>
<?php
}
