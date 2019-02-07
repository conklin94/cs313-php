<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Book Review Page</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php
      include 'header.php';
      $book_id = $_POST['book'];
    ?>
    <h1>This is the Book Review page</h1>
    <a href='add_review.php'>Go to add review page</a>
    <a href='books.php'>Go to main page</a>
  </body>
</html>
