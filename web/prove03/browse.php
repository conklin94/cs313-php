<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Browsing Page</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php
      include 'header.php';

      $names = array("Mini Piano", "Kaleidoscope", "Batman Toothbrosh",
      "Novelty Socks", "Frisbee", "Golden Toilet Paper", "Fiddle", "Zebra Hat",
      "Clif Bars", "Arcade Machine");

      $images = array("https://cdn.shopify.com/s/files/1/2256/4721/products/2522R_SIDE_1600x.png?v=1547238423",
      "https://cdn.shopify.com/s/files/1/0130/8502/products/2315WJPG_1_2000x.jpg?v=1485396369",
      "https://www.fireflytoothbrush.com/wp-content/uploads/2016/10/92767_BTM_TurboStand_brush.jpg",
      "https://cdn.shopify.com/s/files/1/0569/1997/products/ozone_socks_WC1247-15_endorphic_palm_580x@2x.jpg?v=1547573919",
      "https://images-na.ssl-images-amazon.com/images/I/91x9soGBSsL._SX425_.jpg",
      "https://i.pinimg.com/originals/bc/28/88/bc28887cf47620b7a843a86f1c74d2b2.jpg",
      "https://www.twinlakesfiddler.com/s/cc_images/teaserbox_3138691904.jpg?t=1485378816",
      "https://sep.yimg.com/ay/yhst-43237354811846/zebra-print-velvet-pimp-hat-39.jpg",
      "https://snaxxonline.com/wp-content/uploads/2018/01/Clif-Bar-Chocolate-Chip-1.png",
      "https://cdn.shopify.com/s/files/1/0030/4227/9494/products/pac-man-arcade-machine-01_20895432-a1a4-4bc8-acab-e444c27ec6b4_800x.progressive.jpg?v=1544633761");

      $prices = array(49.99, 4.99, 3.99, 9.99, 2.99, 1376900, 149.99, 4.99,
      11.99, 299.99);

      $size = sizeof($names);

      if (is_set($_POST['add'])) {
        $add = $_POST['add'];
        if (is_set($_SESSION['cart'])) {
          if (is_set($_SESSION['cart'][$names[$add]])) {
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
      elseif (is_set($_POST['remove'])) {
        $remove = $_POST['remove'];
        if ($_SESSION['cart'][$names[$remove]]['quantity'] == 1)
        {
          unset($_SESSION['cart'][$names[$remove]]);
        }
        else {
          $_SESSION['cart'][$names[$remove]]['quantity'] -= 1;
        }
      }



      for ($x = 0; $x < $size; $x++) {
        echo "<div class='item'>";
        echo "  <h2>" . $names[$x] . "</h2>";
        echo "  <img src='" . $images[$x] . "' alt='" . $names[$x] . "'>";
        echo "  <p>Price: $" . number_format($prices[$x],2) . "</p>";
        echo "  <form action='browse.php' method='post'>";
        echo "    <button type='submit' name='add' value='" . $x . "'>
        Add to cart</button>";
        if (is_set($_SESSION['cart'] && is_set($_SESSION['cart'][$names[$x]]))) {
          echo "    <button type='submit' name='remove' value='" . $x . "'>
          Remove from cart</button>";
        }
        echo "  </form>";
        echo "</div>";
      }
     ?>
  </body>
</html>
