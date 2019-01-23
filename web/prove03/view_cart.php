<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body id="view_cart">
    <?php
      include 'header.php';

      if (isset($_POST['remove'])) {
        $name = $_POST['remove'];
        if (isset($_SESSION['cart']) && isset($_SESSION['cart'][$name])) {
          if ($_SESSION['cart'][$name]['quantity'] == 1)
          {
            unset($_SESSION['cart'][$name);
          }
          else {
            $_SESSION['cart'][$name['quantity'] -= 1;
          }
        }
      }

      if (isset($_SESSION['cart'])) {
        echo "<h1>Your Shopping Cart</h1>";
        foreach ($_SESSION['cart'] as $key => $value) {
          echo "<h2>" . $key . "</h2>";
          echo "<h3>Price: $" . number_format($value['price'],2) .
          ", Quantity: " . $value['quantity'] . "</h3>";
          echo "<form action='view_cart.php' method='post'>";
          echo "  <button type='submit' name='remove' value='" . $key . "'>
          Remove item</button>";
          echo "  </form>";
        }
      }
      else {
        echo "<h1>Your Shopping cart is empty</h1>";
      }
     ?>
  </body>
</html>
