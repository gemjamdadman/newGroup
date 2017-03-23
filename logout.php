<?php
require 'head.php';
session_start();
unset($_SESSION['loggedin']);
echo '<p class = "dataSearch"> You are now logged out <a href="index.php">Go to homepage</a> </p>';
require 'foot.php';
 ?>