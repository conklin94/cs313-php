<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Checkout Page</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body id="checkout">
    <?php
      include 'header.php';

      if (isset($_SESSION['cart'])) {
        echo "<br><br>";
        echo "  <form action='confirmation.php' method='post'>";
        echo "Name: <input type='text' name='name'><br><br>";
        echo "Street Address: <input type='text' name='street_address'><br><br>";
        echo "City: <input type='text' name='city'><br><br>";
        echo "State: <input type='text' name='state'><br><br>";
        echo "Zip Code: <input type='text' name='zip_code'><br><br>";
        echo "<input type='submit' value='Complete Purchase'>";
        echo "</form>";
        echo "<form action='view_cart.php' method='post'>";
        echo "<input type='submit' value='Return to Cart'>";
        echo "</form>";
      }
      else {
        echo "<h1>You cannot checkout because your shopping cart is empty</h1>";
      }
     ?>
  </body>
</html>
