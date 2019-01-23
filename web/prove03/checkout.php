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
        echo "  <form action='confirmation.php' method='post'>";
        echo "Name: <input type='text' name='name'><br>";
        echo "Street Address: <input type='text' name='street_address'><br>";
        echo "City: <input type='text' name='city'><br>";
        echo "State: <input type='text' name='state'><br>";
        echo "Zip Code: <input type='text' name='zip_code'><br>";
        echo "<input type='submit'>";
      }
      else {
        echo "<h1>You cannot checkout because your shopping cart is empty</h1>";
      }
     ?>
  </body>
</html>
