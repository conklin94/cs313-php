<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Add Review</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php
      include 'header.php';
      $book_id = htmlspecialchars($_GET['book_id']);
    ?>
    <h1>This is the page to add a review</h1>
    <h2>It is currently under construction, please come back later</h2>
  </body>
</html>
