<?php
require 'bookClass.php'; // Needs to be included BEFORE head (which starts the SESSION) otherwise the session can't save the bookClass object because it doesn't know what it is!
require 'head.php';
?>

<div class = "dataSearch">
<p>
  <?php
  if(isset($_GET['ISBN']))
  {
      $stmt = $pdo->query('SELECT * FROM BOOK WHERE ISBN =' . $_GET['ISBN']);
      $result = $stmt->fetch(PDO::FETCH_ASSOC);

      $bookClass = new bookClass();
      $bookClass->ISBN = $result['ISBN'];
      $bookClass->title = $result['TITLE'];
      $bookClass->author = $result['AUTHOR'];
      $bookClass->price = $result['PRICE'];
      $bookClass->quantity = 1;

      $basket = (isset($_SESSION['basket'])) ? $_SESSION['basket'] : [];
      $basket[$bookClass->ISBN] = $bookClass;

      $basket['quantity'] = getBasketQuantity($basket);
      updateSessionBasket($basket); // Out with the old, In with the new.

    }
    elseif (isset($_GET['remove']))
    {
      $basket = $_SESSION['basket'];
      if (array_key_exists($_GET['remove'], $basket)) {
        unset($basket[$_GET['remove']]);
      }
      $basket['quantity'] = getBasketQuantity($basket);
      updateSessionBasket($basket); // Out with the old, In with the new.
    }
?>
<table cellpadding="2" cellspacing="2" border="1">
  <tr>
    <!-- <th>OPTION</th> -->
    <th>ISBN</th>
    <th>TITLE</th>
    <th>AUTHOR</th>
    <th>PRICE</th>
    <th>QUANTITY</th>
    <th>TOTAL</th>
  </tr>
<?php
  $total = 0;
  $basket = $_SESSION['basket'];

  foreach ($basket as $item)
  {
    if ($item instanceof bookClass) { // Stops Quantity array entry being shown in list - only lists books!
      $itemTotal = $item->price * $item->quantity;
      $total += $itemTotal;
?>
      <tr>
        <td><a href="basket.php?remove=<?php echo $item->ISBN; ?>">Remove</a></td>
        <td><?php echo $item->title; ?></td>
        <td><?php echo $item->author; ?></td>
        <td>
          <?php
            echo "£" . sprintf("%0.2f", $item->price); // http://php.net/manual/en/function.sprintf.php see example 10
          ?>
        </td>
        <td><?php echo $item->quantity; ?></td>
        <td>
          <?php
            echo "£" . sprintf("%0.2f", $itemTotal); // http://php.net/manual/en/function.sprintf.php see example 10
          ?>
        </td>
      </tr>
<?php
    }
  }
?>
  <tr>
    <td colspan="5" align="right">SUM</td>
    <td align="left"><?php echo "£" . sprintf("%0.2f", $total); // http://php.net/manual/en/function.sprintf.php see example 10 ?></td>
  </tr>
</table>
</br>
<a href="index.php">Continue shopping</a>
</p>
</div>

<?php

  function getBasketQuantity($basket = null) {
    if (isset($basket['quantity'])) {
      unset($basket['quantity']);
    }

    $itemsInBasket = 0;
    foreach ($basket as $item) {
      $itemsInBasket += $item->quantity;
    }

    return $itemsInBasket;
  }

  function updateSessionBasket($basket = null) {
    if (isset($_SESSION['basket'])) {
      unset($_SESSION['basket']); // Out with the old
    }
    $_SESSION['basket'] = $basket; // In with the new
  }

  require 'foot.php';
 ?>
