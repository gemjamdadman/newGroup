<?php
require 'head.php';
require 'db.php';

//If a person to edit is specified, display the form and load the persons's information into it
if (isset($_SESSION['loggedin']))
	{
	$stmt = $pdo->prepare('SELECT * FROM CUSTOMER WHERE EMAIL = :EMAIL');

	$criteria = [
		'EMAIL' => $_SESSION['loggedin']
	];
	$stmt->execute($criteria);

	$row = $stmt->fetch();
?>
<div class = "dataSearch">
      
    <form action="Edit_Account_Details.php" method="post">
	 
        <input type="hidden" name="originalEMAIL" value="<?php echo $row['EMAIL']; ?>" />
         <h2>Edit Account Details</h2>
         <br />
		 
         Email Address:
        <input name="EMAIL" type="text"  value="<?php echo $row['EMAIL']; ?>">
        <br />
		
        Password:
        <input name="PASSWORD" type="password"><br />
		 
         First Name:
        <input name="FIRST_NAME" type="text"  value="<?php echo $row['FIRST_NAME']; ?>">
        <br />
		 
        Surname:    
        <input name="SURNAME" type="text"  value="<?php echo $row['SURNAME']; ?>">
        <br />
		
         Address:
		<input name="ADDRESS" type="text"  value="<?php echo $row['ADDRESS']; ?>">
		<br />    
		
        <p>Click to submit <input name="send" type="submit" value="Save"></p>
    </form>
</div>

<?php
}
//Otherwise, the form was submitted, amend the record
else {
	$stmt = $pdo->prepare('UPDATE CUSTOMER
				 SET EMAIL = :EMAIL, 
				 PASSWORD = :PASSWORD,
				  FIRST_NAME = :FIRST_NAME,
				  SURNAME = :SURNAME,
				  ADDRESS = :ADDRESS,
				 WHERE EMAIL = :originalEMAIL
	');

	$criteria = [
		'EMAIL' => $_POST['EMAIL'],
		'FIRST_NAME' => $_POST['FIRST_NAME'],
		'PASSWORD' => $_POST['PASSWORD'],
		'SURNAME' => $_POST['SURNAME'],
		'ADDRESS' => $_POST['ADDRESS']
	];

	$stmt->execute($criteria);
	header('Location: profile.php');
}

require 'foot.php'; ?>