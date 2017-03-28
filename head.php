<?php
$server = '194.81.104.22';
$username = 'gp_general_1617';
$password = 'general';

$schema = 'db_general_1617';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
session_start();
 ?>


<!DOCTYPE html>
<head>
  <meta charset = "utf-8">
  <link rel = 'stylesheet' type = 'text/css' href = 'group.css'>
</head>
  <title>
    Codex Books
  </title>
</head>
<body>

  <div class = "header">
    <h1>CODEX</h1>
    <h3>Computer books for students!<h3>
  </div>

  <div class = 'search'>
      <form action = "dataSearch.php" method = "POST">
          <input type = "search" name = "search" placeholder="Search">
          <input type = "submit" value = "Go" name = "submit">
      </form>
  </div>

<?php
if (isset($_SESSION['loggedin']))
	{
?>
	<p class = "register">
        <a href = "profile.php">Profile</a>
        <a href = "logout.php">Log out</a>
<?php
	}
	else
	{
?>
    </p>
    <p class = "register">
        <a href = "login.php">Sign in</a>
        <a href = "register.php">Sign up</a>
<?php
	}
?>
    </p>
    <p class = "basket">
        <a href = "basket.php">
            <img src = "images/basket.jpg" alt = "basket"><br>Basket
        </a>
    </p>

<?php
  $bookCat= ['Databases', 'Networking', 'Java', 'Systems', 'Web Design', 'Software Engineering', 'Problem Solving', 'Other'];
?>
  <div class = "nav">
    <ul>
      <li><a class="active" href="index.php">Home</a> </li>
      <li><a href="dataSearch.php?bookCat=Databases"><?php echo $bookCat[0] ?></a></li>
      <li><a href="dataSearch.php?bookCat=Networking"><?php echo $bookCat[1] ?></a></li>
      <li><a href="dataSearch.php?bookCat=Java"><?php echo $bookCat[2] ?></a></li>
      <li><a href="dataSearch.php?bookCat=Systems"><?php echo $bookCat[3] ?></a></li>
      <li><a href="dataSearch.php?bookCat=WebDesign"><?php echo $bookCat[4] ?></a></li>
      <li><a href="dataSearch.php?bookCat=SoftEng"><?php echo $bookCat[5] ?></a></li>
      <li><a href="dataSearch.php?bookCat=Problem"><?php echo $bookCat[6] ?></a></li>
      <li><a href="dataSearch.php?bookCat=Other"><?php echo $bookCat[7] ?></a></li>
    </ul>
  </div>
