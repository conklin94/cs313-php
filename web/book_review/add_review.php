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
      echo "<h1>The book_id is $book_id</h1>";
    ?>
    <h1>This page is currently under construction, please come back later</h1>
  </body>
</html>
