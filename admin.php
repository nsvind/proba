<?php
    require_once "classes/session.php";
    $sess = new Session();
   // $ = $sess->SelectFromTnepo();
?>
<!DOCTYPE html>
<html>
<head>
<title>Administracija</title>
<meta charset="UTF-8" />
<style>
	.field {
	  border: 2px #990000 solid;
	}
</style>
</head>
<body>
			
<a id="reg" href="register.php">Registracija</a><br />

<?php



		
$msg = '';
  if((isset($_POST['email'])) and (isset($_POST['password']))){
	$email = trim($_POST['email']);
	$pass = trim($_POST['password']);
	if(!empty($email) and !empty($pass)){
		require_once 'baza/db_proba.php';
		
		$db1 = new DB();
		$statement = $db1->SelectFromAdmin($email, $pass);
		
		if($statement->rowCount() > 1){
		  $msg = "System error!";
		}else if($statement->rowCount() == 0){
		  $msg = "Unknown user!";
		}else{
		  $user = $statement->fetch(PDO::FETCH_ASSOC);
			$_SESSION['id'] = $user['id'];
			$_SESSION['first_name'] = $user['first_name'];
			$_SESSION['last_name'] = $user['last_name'];
			$_SESSION['email'] = $user['email'];
		}
	}
}
					
if(isset($_SESSION['id'])){
	require_once "info.php";
	?>
						
<style>
	#reg {
	  display: none;
	}
</style>
						
<?php
}else{
						
?>
	<form action="" method="POST">
		<fieldset class="field">
			<label>Email:</label>
			<input type="text" name="email" /><br />
			<label>Password:</label>
			<input type="password" name="password" /><br />
			<input type="submit" name="login" value="Uloguj se" />
<?php
	}
?>
					
</fieldset>
			
			
</form>
</body>
</html>