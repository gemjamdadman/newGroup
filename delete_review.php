<?php
require 'head.php';
if (isset($_POST['submit'])) {
	require ('db.php');
	$delete = $pdo->query('DELETE FROM REVIEW WHERE REVIEW_ID =' . $_POST['REVIEW']);

	unset($_POST['submit']);
	$delete->execute($_POST);
	
	echo '<a href="admin.php" class = "dataSearch">Review has been deleted. Click here to return to the admin page</a>';
	
	}
   else
   {
?>
<div class = "dataSearch">
	<form action="delete_review.php"? method="POST">
	<label>Select a review to delete</label>
	<select name="REVIEW">
		<?php
			$stmt = $pdo->prepare('SELECT * FROM REVIEW');
			$stmt->execute();

			foreach ($stmt as $row) {
				echo '<option value="' . $row['REVIEW_ID'] . '">' . 'User: ' .$row['USER_EMAIL'] . 'Review: ' . $row['TEXT_REVIEW'] . '</option>';
			}
		?>
	</select>
	
	<input type="submit" name="submit" value="delete" />
</div>
<?php
   }
	require 'foot.php';
?>