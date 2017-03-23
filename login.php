<?php
	require 'head.php';
	require 'db.php';
	session_start();
	if (isset($_POST['LOGIN']))
		{
			$stmt = $pdo->prepare('SELECT * FROM CUSTOMER WHERE EMAIL = :EMAIL');  
			
			$criteria = [
				'EMAIL' => $_POST['EMAIL']
			];

			$stmt->execute($criteria);

			$row = $stmt->fetch();

			if (password_verify($_POST['PASSWORD'], $row['PASSWORD'])) {
				$_SESSION['loggedin'] = $row['EMAIL'];
				header('Location: http://194.81.104.22/~15413410/profile.php ');
			}
			else
			{
				echo '<a href="login.php" class = "dataSearch">Incorrect username or password. Click here to try again</a>';
			}
		}
		if (isset($_POST['LOGIN']))
		{
			$stmt = $pdo->prepare('SELECT * FROM STAFF WHERE EMAIL = :EMAIL');  
			
			$criteria = [
				'EMAIL' => $_POST['EMAIL']
			];

			$stmt->execute($criteria);

			$row = $stmt->fetch();

			if (password_verify($_POST['PASSWORD'], $row['PASSWORD'])) {
				$_SESSION['loggedin'] = $row['EMAIL'];
				 header('Location: http://194.81.104.22/~15413410/admin.php ');//goes to the admin area 
			}
		}
	else
	{

?>
<div class = "dataSearch">

  <form action ="login.php" method = "POST" class = "log">
    <label>Existing Members please sign in below</label><br>
    <input type = "text" name = "EMAIL" placeholder = "Username">
    <input type = "password" name = "PASSWORD" placeholder = "Password">
    <input type = "submit" name = "LOGIN" value= "Log In">
  </form>

</div>
<?php
   }
?>
<?php
require 'foot.php';
 ?>
