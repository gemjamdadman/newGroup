<?php
require 'head.php'; ?>
<div class = "dataSearch">
<form action="list_book.php" method="POST">
	<input type="text" name="search" />
	<select name="field">
		<option value="TITLE">TITLE</option>
	
	</select>
	<input type="submit" value="Search" name="submit" />
</form>
</div>
<?php
require 'db.php';


if (isset($_POST['search'])) {
	//Prevent SQL injection by only allowing specific values for $_POST['field']
	if ($_POST['field'] == 'TITLE') {
		$stmt = $pdo->prepare('SELECT * FROM BOOK WHERE ' . $_POST['field'] . ' = :search');	

		$criteria = [
			'search' => $_POST['search']
		];

		$stmt->execute($criteria);
	}	
}
else {
	$stmt = $pdo->prepare('SELECT * from BOOK');
	$stmt->execute();
}

	
		echo '<div class = "dataSearch">';	
	foreach ($stmt as $row) {

		echo '<ul><a href="edit_book.php?book=' . $row['ISBN'] . '">' . $row['ISBN'] . ' ' . $row['TITLE'] . ' ' . $row['AUTHOR'] . "</ul>"; 

}
		echo '</div>';	

?>
<?php
require 'foot.php'; ?>