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
      require 'db_access';
      $book_id = htmlspecialchars($_GET['book_id']);
      if (isset($_SESSION['logged_in']))
      {
        $book = '';
        $db = get_db();
        $stmt = $db->prepare('SELECT title FROM book WHERE book_id=:book_id');
        $stmt->execute(array(':book_id' => $book_id));
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row)
        {
          $book = $row['title'];
        }
        $_SESSION['book_id'] = $book_id;
        echo "<h1>Add a Book Review for $book</h1>";
        echo "<form class='add_book_review' action='add_a_review.php'";
        echo " method='post'>";
        echo "  <label for='stars'>Number of Stars</label><br>";
        echo "  <select name='stars'>";
        for ($x = 0; $x <= 10; $x++)
        {
          $current = $x * 0.5;
          echo "    <option value='$current'>$current</option>";
        }
        echo "  </select>";
        echo "  <label for='comments'>Comments</label><br>";
        echo "  <textarea rows='4' cols='50' name='comments'></textarea><br>";
        echo "  <button type='submit'>Add Review</button>";
        echo "</form>";
      }
      else
      {
        echo "<h1>You must be logged in to add a book review.</h1>";
      }
    ?>
  </body>
</html>
