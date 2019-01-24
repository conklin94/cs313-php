<?php
  session_start();

  $names = array("Mini Piano", "Kaleidoscope", "Batman Toothbrosh",
  "Novelty Socks", "Frisbee", "Golden Toilet Paper", "Fiddle", "Zebra Hat",
  "Clif Bars", "Arcade Machine");

  $prices = array(49.99, 4.99, 3.99, 9.99, 2.99, 1376900, 149.99, 4.99,
  11.99, 299.99);

  if (isset($_POST['add'])) {
    $add = $_POST['add'];
    if (isset($_SESSION['cart'])) {
      if (isset($_SESSION['cart'][$names[$add]])) {
        $_SESSION['cart'][$names[$add]]['quantity'] += 1;
      }
      else {
        $_SESSION['cart'][$names[$add]] = array("price" =>
        $prices[$add], 'quantity' => 1);
      }
    }
    else {
      $_SESSION['cart'] = array($names[$add] => array('price' =>
      $prices[$add], 'quantity' => 1));
    }
  }
  elseif (isset($_POST['remove'])) {
    $remove = $_POST['remove'];
    if (isset($_SESSION['cart']) && isset($_SESSION['cart'][$names[$remove]])) {
      if ($_SESSION['cart'][$names[$remove]]['quantity'] == 1)
      {
        unset($_SESSION['cart'][$names[$remove]]);
      }
      else {
        $_SESSION['cart'][$names[$remove]]['quantity'] -= 1;
      }
      if(empty($_SESSION['cart'])) {
        unset($_SESSION['cart']);
      }
    }
  }

  header("Location: browse.php");
?>
