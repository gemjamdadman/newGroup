
<?php
require 'head.php';
require ('db.php');

if (isset($_POST['send']))
   {
   $stmt = $pdo->prepare('INSERT INTO BOOK (ISBN, TITLE, AUTHOR, PRICE, SYNOPSIS, IMAGE, CATEGORY, PUBLICATION_DATE, QUANTITY)
								 VALUES (:ISBN, :TITLE, :AUTHOR, :PRICE, :SYNOPSIS, :IMAGE, :CATEGORY, :PUBLICATION_DATE, :QUANTITY )');
	$criteria = [
	'ISBN' => $_POST['ISBN'], 
	'TITLE' => $_POST['TITLE'] , 
	'AUTHOR' => $_POST['AUTHOR'] , 
	'PRICE' => $_POST['PRICE'],
	'SYNOPSIS' => $_POST['SYNOPSIS'], 
	'IMAGE' => 'images/' . $_POST['IMAGE'] . '.jpg', 	
	'CATEGORY' => $_POST['CATEGORY'],
	'PUBLICATION_DATE' => $_POST['PUBLICATION_DATE'],
	'QUANTITY' => $_POST['QUANTITY']];
	$stmt->execute($criteria);
	
		echo '<a href="admin.php" class = "dataSearch">Book has been added. Click here to return to the admin page</a>';
   }
   else
   {
?>


<div class = "dataSearch">
      
     <form action="" enctype="multipart/form-data" method="post">
        
        <h2>insert new book here</h2>
        <br/>
        ISBN: <input name="ISBN" type="text">
        <br/>
        TITLE: <input name="TITLE" type="text">
		<br/>
        AUTHOR: <input name="AUTHOR" type="text">
        <br/>
        PRICE: <input name="PRICE" type="text">
        <br/>
        SYNOPSIS:
        <br/>
        <textarea cols="80" name="SYNOPSIS" placeholder="write a comment" rows="10"></textarea>
		<br/>
		IMAGE: <input name="IMAGE" type="text">
        <br/>
		CATEGORY: <input name="CATEGORY" type="text">
        <br/>
		PUBLIC_DATE: <input name="PUBLICATION_DATE" type="date">
        <br/>
		QUANTITY: <input name="QUANTITY" type="text">
		<br/>
        <p>Click to submit <input name="send" type="submit" value="Submit"></p>
      </form>
  </div>

   <?php
   }

?>
<?php require 'foot.php'; ?>