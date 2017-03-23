
<?php
require 'head.php';
require 'db.php';

//If a person to edit is specified, display the form and load the persons's information into it
if (isset($_GET['FIRST_NAME']))
{
	 $stmt = $pdo->prepare('SELECT * FROM CUSTOMER WHERE FIRST_NAME = :FIRST_NAME');

	       $criteria = [
		                    'FIRST_NAME' => $_GET['FIRSTNAME']
	                   ];
	       $stmt->execute($criteria);
	       $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach ($results as $row)
  {
    echo '<div class = "dataSearch">
            		<div class = "bookTitle"> <b>Title: </b>'
							  		. $row['FIRST_NAME'] . " - "
							  		. $row['SURNAME'] . '<p><b>ISBN: </b>'
										. $row['ADDRESS'] .
								'</p>
					</div>';
  }
}

require 'foot.php';
?>
