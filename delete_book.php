<?php
require 'head.php';
if (isset($_POST['submit'])) {
	require ('db.php');
	$delete = $pdo->query('DELETE FROM BOOK WHERE ISBN =' . $_POST['CATEGORY']);

	unset($_POST['submit']);
	$delete->execute($_POST);
	
		echo '<a href="admin.php" class = "dataSearch">Book has been deleted. Click here to return to the admin page</a>';
	
	}
   else
   {
?>
<div class = "dataSearch">
	<form action="delete_book.php"? method="POST">
	<label>Select a book to delete</label>
	<select name="CATEGORY">
		<?php
			$stmt = $pdo->prepare('SELECT * FROM BOOK');
			$stmt->execute();

			foreach ($stmt as $row) {
				echo '<option value="' . $row['ISBN'] . '">' . $row['TITLE'] . '</option>';
			}
		?>
	</select>
	
	<input type="submit" name="submit" value="delete" />
</div>
<?php
   }
	require 'foot.php';
?>