<?php
$server = '194.81.104.22';
$username = 'gp_general_1617';
$password = 'general';
$schema = 'db_general_1617';
$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
?>
