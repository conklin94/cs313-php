<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Add Book Page</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php
      include 'header.php';
      if (isset($_SESSION['logged_in']))
      {
        echo "<h1 class='add_book'>Add a Book</h1>";
        echo "<form class='add_book' action='add_a_book.php' method='post'>";
        echo "  <label for='title'>Title</label><br>";
        echo "  <input type='text' name='title'><br>";
        echo "  <label for='author'>Author</label><br>";
        echo "  <input type='text' name='author'><br>";
        echo "  <label for='image_link'>Image Link</label><br>";
        echo "  <input type='text' name='image_link'><br>";
        echo "  <label for='description'>Description</label><br>";
        echo "  <textarea rows='4' cols='50' name='description'></textarea><br>";
        echo "  <button type='submit'>Add Book</button>";
        echo "</form>";
      }
      else
      {
        echo "<h1>You must be logged in to add a book.</h1>";
      }
    ?>
  </body>
</html>
