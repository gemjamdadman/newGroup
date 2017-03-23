<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo 'You are logged in. <a href="logout.php">Click here to log out</a>';
}
else { 
    echo 'You are not logged in. <a href="login.php">Click here to log in</a>';
}
?>