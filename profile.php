<?php
require 'head.php';
require 'db.php';
session_start();

if (isset($_SESSION['loggedin']))
	{
		echo '<div class = "dataSearch">
			<h2>Welcome ' . $_SESSION['loggedin'] .
			'</h2><ul><h4><a href="Order_History.php">Order History</a></h4></ul>
			<ul><h4><a href="Edit_Account_Details.php">Edit Account Details</a></h4></ul>
			<ul><h4><a href="logout.php">Click here to log out</a></h4></ul>
		</div>';
	}
else { 
    echo 'You are not logged in. <a href="login.php">Click here to log in</a>';
}
?>


<?php
require 'foot.php';
 ?>
