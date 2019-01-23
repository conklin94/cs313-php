<!DOCTYPE html>
<html>
  <head>
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php
      include 'header.php';
      if (isset($_SESSION['cart'])) {
        echo "<h1>Your Shopping Cart</h1>";
        foreach ($_SESSION['cart'] as $key => $value) {
          echo "<h2>" . $key . "</h2>";
          echo "<h3>Price: $" . number_format($value['price'],2) .
          ", Quantity: " . $value['quantity'] . "</h3>";
        }
      }
      else {
        echo "<h1>Your Shopping cart is empty</h1>";
      }
     ?>
  </body>
</html>
