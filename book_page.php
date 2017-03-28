

<?php

require 'head.php';
require 'db.php';
//If a person to edit is specified, display the form and load the persons's information into it
$date = date('Y-m-d H:i:s');
if (isset($_POST['customer_submit']))
{
$stmt = $pdo->prepare('INSERT INTO REVIEW (USER_EMAIL, BOOK_ISBN, TEXT_REVIEW, REVIEW_RATING, REVIEW_DATE)
						 VALUES (:USER_EMAIL, :BOOK_ISBN, :TEXT_REVIEW, :REVIEW_RATING, :REVIEW_DATE )');
$criteria = [
'USER_EMAIL' => $_POST['USER_EMAIL'],
'BOOK_ISBN' => $_GET['ISBN'] ,
'TEXT_REVIEW' => $_POST['TEXT_REVIEW'] ,
'REVIEW_RATING' => $_POST['REVIEW_RATING'],
'REVIEW_DATE' => $date
];

$stmt->execute($criteria);
header('Location: http://194.81.104.22/~15413410/book_page.php?ISBN=' . $_GET['ISBN']);

} else if (isset($_GET['ISBN'])) {
	 $stmt = $pdo->prepare('SELECT * FROM BOOK WHERE ISBN = :ISBN');
	       $criteria = [
		                    'ISBN' => $_GET['ISBN']
	                   ];
	       $stmt->execute($criteria);
	       $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach ($results as $row)
  {
    echo '<div class = "dataSearch">
            		<div class = "bookTitle"> <b>Title: </b>'
							  		. $row['TITLE'] . " - "
							  		. $row['AUTHOR'] . '<p><b>ISBN: </b>'
										. $row['ISBN'] .
					'</div>' .
					'<div class = "bookImage"><img class="bookResize" src="'
                	. $row['IMAGE'] . '"
					</div>
					<div class = "bookBlurb"><b>Synopsis: </b>'
					. $row['SYNOPSIS'] .
		       		'
					</div>
					<div class = "bookFoot">
						<p class ="price">
								 		<b>Price :</b> £'
										. $row['PRICE'] .'.00
					 					<p class = "add"><a href="wishlist.php"><img src="images/wishlist.png" alt = "wishlist"></a>
					 					<p class = "add"><a href="basket.php?ISBN=' . $row['ISBN'] . '"><img src="images/basket.jpg" alt = "basket"></a>
										</p>
						</p>


					</div>
					</div>
        </div>';
		}


$results = $pdo->query('SELECT * FROM REVIEW WHERE BOOK_ISBN = ' . $_GET['ISBN']);
    foreach ($results as $row)
{
  echo
  '<ul>Email: ' . $row['USER_EMAIL'] .
  '<ul>Review: ' . $row['TEXT_REVIEW'] .
  '<ul>Rating: ' . $row['REVIEW_RATING'] .
  '<ul>Date of Review: ' . $row['REVIEW_DATE'] . '</p></div></a>';

}



?>
<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
	{
?>
<div class = "customer">
	<form action="" method="post">
    <!-- creates the form of a customer review -->


    <h2>Customer review</h2>
    <!-- creates heading -->
    USER_EMAIL: <!-- creates heading -->
     <input name="USER_EMAIL" type="text">
    <!-- creates a input to put data inside-->
    TEXT_REVIEW:<br />
    <!-- creates heading -->
    <textarea cols="80" name="TEXT_REVIEW" rows="10"></textarea>
    <!-- creates a input to put data inside-->
    <br />
    REVIEW_RATING:<br />
    <!-- creates heading -->
     <select name="REVIEW_RATING">
      <!-- creates a select for rating -->


      <option value="1">
        1
      </option><!-- option for select -->


      <option value="2">
        2
      </option><!-- option for select -->


      <option value="3">
        3
      </option><!-- option for select -->


      <option value="4">
        4
      </option><!-- option for select -->


      <option value="5">
        5
      </option><!-- option for select -->
    </select><!-- end select tag -->
 <br />

    <p>Click to submit <input name="customer_submit" type="submit" value="Submit"></p>
    <!-- creates a submit button -->
  </form>

</div>
<?php
}
}

require 'foot.php';
?>
