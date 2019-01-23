<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Confirmation Page</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php
      include 'header.php';
      $name = htmlspecialchars($_POST['name']);
      $street_address = htmlspecialchars($_POST['street_address']);
      $city = htmlspecialchars($_POST['city']);
      $state = htmlspecialchars($_POST['state']);
      $zip_code = htmlspecialchars($_POST['zip_code']);
      $total_price = 0;

      echo "<h2>Your Address</h2>";
      echo "<h3>$name</h3>";
      echo "<h3>$street_address</h3>";
      echo "<h3>$city, $state $zip_code</h3>";
      if (isset($_SESSION['cart'])) {
        echo "<h2>Your Shopping Cart:</h2>";
        foreach ($_SESSION['cart'] as $key => $value) {
          echo "<h3>" . $key . "</h3>";
          echo "<h3>Price: $" . number_format($value['price'],2) .
          ", Quantity: " . $value['quantity'] . "</h3>";
          $total_price += $value['quantity'] * $value['price'];
        }
        echo "<h2>The total price is: $total_price</h2>";
      }
    ?>
  </body>
</html>
