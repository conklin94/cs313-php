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
      "Novelty Socks");
      $images = array("https://cdn.shopify.com/s/files/1/2256/4721/products/2522R_SIDE_1600x.png?v=1547238423",
      "https://cdn.shopify.com/s/files/1/0130/8502/products/2315WJPG_1_2000x.jpg?v=1485396369",
      "https://www.fireflytoothbrush.com/wp-content/uploads/2016/10/92767_BTM_TurboStand_brush.jpg",
      "https://cdn.shopify.com/s/files/1/0569/1997/products/ozone_socks_WC1247-15_endorphic_palm_580x@2x.jpg?v=1547573919");
      for ($x = 0; $x < 4; $x++) {
        echo "<div class='item'>";
        echo "<h2>" . $names[$x] . "</h2>";
        echo "<img src='" . $images[$x] . "' alt='" . $names[$x] . "'>";
        echo "</div>";
      }
     ?>
  </body>
</html>
