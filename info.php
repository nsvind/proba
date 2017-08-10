<fieldset class="field">
<h1>Dobrodosli!</h1>
	 <p>Name: <?php echo $_SESSION['first_name'] ?></p>
	 <p>Surname: <?php echo $_SESSION['last_name'] ?></p>
	 <p>Mail: <?php echo $_SESSION['email'] ?></p><br />
	 <a href="logout.php">Izlogujte se</a>
</fieldset>