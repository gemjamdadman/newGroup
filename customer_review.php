	  <?php
  /*

if (isset($_POST['customer_submit']))
{
 $stmt = $pdo->prepare('INSERT INTO REVIEW (USER_EMAIL, BOOK_ISBN, TEXT_REVIEW, REVIEW_RATING, REVIEW_DATE)
 VALUES (:USER_EMAIL, :BOOK_ISBN, :TEXT_REVIEW, :REVIEW_RATING, :REVIEW_DATE)');
$criteria = [
 'USER_EMAIL' => $_POST['USER_EMAIL'],
 'BOOK_ISBN' => $_POST['BOOK_ISBN'],
 'TEXT_REVIEW' => $_POST['TEXT_REVIEW'],
 'REVIEW_RATING' => $_POST['REVIEW_RATING'],
'REVIEW_DATE' => $_POST['REVIEW_DATE']
 ];

stmt->execute($criteria);
 echo 'Registration successful'; //says the data was submitted
   }
  else
   { //else will get the form*/
?>

			<form action="" method="post">
    <!-- creates the form of a customer review -->


    <h2>Customer review</h2>
    <!-- creates heading -->
    USER_EMAIL: <!-- creates heading -->
     <input name="USER_EMAIL" type="text">
    <!-- creates a input to put data inside-->
     BOOK_ISBN: <!-- creates heading -->
<input name="ISBN" type="text"  value="<?php echo $row['ISBN']; ?>">
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
    REVIEW_DATE:<br />
   <input type = "date" name = "REVIEW_DATE"></br>
    <p>Click to submit <input name="customer_submit" type="submit" value=
    "Submit"></p>
    <!-- creates a submit button -->
  </form>
  <!-- closes form tagt -->
<?php/*
   }
*/
?>
