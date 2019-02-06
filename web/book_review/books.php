<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Books Page</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php
      include 'header.php';
    ?>
    <h1>This is the Books page</h1>
    <a href='login.php'>Go to login page</a>
    <a href='book_reviews.php'>Go to book review page</a>
    <a href='add_book.php'>Go to add book page</a>
  </body>
</html>
