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
            $browse = " style='text-decoration:bold;' ";
          }
          elseif ($current_page == "/prove03/.php") {
            $view_cart = " style='text-decoration:bold;' ";
          }
          elseif ($current_page == "/prove03/browse.php") {
            $checkout = " style='text-decoration:bold;' ";
          }
          echo "<th><a href='browse.php'" . $browse .">Home</a></th>";
          echo "<th><a href='view_cart.php'" . $view_cart . ">View Cart</a></th>";
          echo "<th><a href='checkout.php'" . $checkout . ">Checkout</a></th>";
        ?>
      </tr>
    </div>
  </body>
</html>
