<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Header</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <div id="header">
      <h1>Our Random Stuff That Could Be Yours</h1>
      <tr>
        <?php
          $current_page = $_SERVER['REQUEST_URI'];
          $browse = "";
          $view_cart = "";
          $checkout = "";
          if ($current_page == "/prove03/browse.php") {
            $browse = " style='font-weight:bold;color:blue;' ";
          }
          elseif ($current_page == "/prove03/view_cart.php") {
            $view_cart = " style='font-weight:bold;color:blue;' ";
          }
          elseif ($current_page == "/prove03/checkout.php") {
            $checkout = " style='font-weight:bold;color:blue;' ";
          }
          echo "<th><a href='browse.php'" . $browse .">Home</a></th>";
          echo "<th><a href='view_cart.php'" . $view_cart . ">View Cart";
          if (isset($_SESSION['cart'])) {
            $quantity = 0;
            foreach ($_SESSION['cart'] as $key => $value) {
              $quantity += $value['quantity'];
            }
            echo "[$quantity]";
          }
          echo "</a></th>";
          echo "<th><a href='checkout.php'" . $checkout . ">Checkout</a></th>";
        ?>
      </tr>
    </div>
  </body>
</html>
