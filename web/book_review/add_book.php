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
        echo "  <input type='text' name='title' required><br>";
        echo "  <label for='author'>Author</label><br>";
        echo "  <input type='text' name='author' required><br>";
        echo "  <label for='image_link'>Image Link</label><br>";
        echo "  <input type='text' name='image_link' required><br>";
        echo "  <label for='description'>Description</label><br>";
        echo "  <textarea rows='5' cols='100' name='description' required>";
        echo "</textarea>";
        echo "  <br><br>";
        echo "  <button type='submit'>Add Book</button>";
        echo "</form>";
      }
      else
      {
        header("Location: login.php?message=login");
        die();
      }
    ?>
  </body>
</html>
