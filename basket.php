<?php
SESSION_START();
//require 'head.php';
require 'connect.php';
require 'bookClass.php';
?>

<div class = "dataSearch">
<p>
  <?php
  if(isset($_GET['ISBN']))
{

    $stmt = mysqli_query($con, 'SELECT * FROM BOOK WHERE ISBN =' . $_GET['ISBN']);
    $result = mysqli_fetch_object($stmt);

    $bookClass = new bookClass();
    $bookClass->ISBN = $result->ISBN;
    $bookClass->title = $result->title;
    $bookClass->author = $result->author;
    $bookClass->price = $result->price;
    $bookClass->quantity = 1;

    $index = -1;
    $basket = unserialize(serialize($_SESSION['loggedin']));

    for ($i=0; $i<count($basket); $i++)
    {
      if ($basket[$i]->ISBN==$_GET['ISBN'])
      {
        $index = $i;
        break;
      }

      if ($index == -1)
      {
        $_SESSION['loggedin'] [] = $item;
      }

      else
      {
        $basket[$index]->quantity++;
        $_SESSION['loggedin'] [] = $basket;
      }
    }

    if(isset($_GET['index']))
    {
      $basket = unserialize(serialize($_SESSION['loggedin']));
      unset ($basket[$_GET['index']]) ;
      $basket = array_values($basket);
      $_SESSION['loggedin'] [] = $basket;
    }
?>
<table cellpadding="2" cellspacing="2" border="1">
  <tr>
    <th>OPTION</th>
    <th>ISBN</th>
    <th>TITLE</th>
    <th>AUTHOR</th>
    <th>PRICE</th>
    <th>QUANTITY</th>
    <th>TOTAL</th>
  </tr>
<?php
  $basket = unserialize(serialize($_SESSION['loggedin']));

  $add = 0;
  $index = 0;

    for ($i=0; $i<count($basket); $i++)
    {
      $add += $basket[$i]->price * $basket[$i]->quantity;
?>

      <tr>
        <td><a href="basket.php?index=<?php echo $index; ?>"</td>
        <td><?php echo $basket[$i]->ISBN; ?></td>
        <td><?php echo $basket[$i]->title; ?></td>
        <td><?php echo $basket[$i]->author; ?></td>
        <td><?php echo $basket[$i]->price; ?></td>
        <td><?php echo $basket[$i]->quantity; ?></td>
        <td><?php echo $basket[$i]->price * $basket[$i]->quantity; ?></td>
      </tr>
<?php
        $index++;
    }
?>
  <tr>
    <td colspan="7" align="right">SUM</td>
    <td align="left"><?php echo $add; ?></td>
  </tr>
</table>
</br>
<a href="index.php">Continue shopping</a>
<?php
 }
?>
</p>
</div>

<?php
require 'foot.php';
 ?>
