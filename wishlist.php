<?php
require 'head.php';
session_start();


?>

<div class = "dataSearch">
<p> This service is currently unavailable</p>
</div>
<?php
/*
if (isset($_SESSION['loggedin']) ) {
    if (isset($_GET(['ISBN']))){

     $stmt = $pdo->prepare('INSERT INTO WISHLIST (IMAGE, TITLE, AUTHOR, PRICE, QUANTITY)
                    VALUES (:IMAGE, :TITLE, :AUTHOR, :PRICE, :QUANTITY)')
                    WHERE USER_EMAIL = :$_SESSION['loggedin'];
     $criteria = [
     'IMAGE' => 'images/' . $_POST['IMAGE'] . '.jpg',
     'TITLE' => $_POST['TITLE'] ,
     'AUTHOR' => $_POST['AUTHOR'] ,
     'PRICE' => $_POST['PRICE'],
     'QUANTITY' => $_POST['QUANTITY']
      ];
     $stmt->execute($criteria);
}
}

echo '<div class = "dataSearch">';
foreach ($stmt as $row) {

echo '<ul><a href="book.php?book=' . $row['ISBN'] . '">' . $row['ISBN'] . ' ' . $row['TITLE'] . ' ' . $row['AUTHOR'] . "</ul>";

}
echo '</div>';

 ?>
</p>
</div>

<?php
*/
require 'foot.php';

 ?>
