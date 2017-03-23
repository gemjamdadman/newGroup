<?php
session_start();

if (isset($_SESSION['loggedin']) ) {
    echo 'You are logged in as ' . $_SESSION['loggedin'] . '<a href="logout.php">Click here to log out</a>';
}
else { 
    echo 'You are not logged in. <a href="login.php">Click here to log in</a>';
}