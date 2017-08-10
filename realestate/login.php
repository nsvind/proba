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
        //header("Location: lista.php?page=0");
        header("Location: ?page_id=1374");
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

    <form action="" method="POST">
		
    <label>Email:</label>
	<input style="max-width:170px;min-height:33px;" type="text" name="email_admin" />
    <label>Password:</label>
	<input style="max-width:170px;min-height:33px;" type="password" name="password"/><br /><br />	
	<input type="submit" name="login" class="btn btn-default" value="Ulogujte se" /><br /><br />
        

								
</form>

<hr>
					
<?php
    }
?>