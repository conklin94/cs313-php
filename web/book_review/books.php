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
      if (isset($_GET['message']))
      {
        $message = $_GET['message'];
        echo "<br>";
        if ($message == 'vote')
        {
          echo "<h3 class='message2'>Each user can only vote once per book</h3>";
        }
        elseif ($message == 'book')
        {
          echo "<h3 class='message2'>There was an error when trying to add the";
          echo " book. When adding a book make sure every field is filled in ";
          echo "and the book is not already listed.</h3>";
        }
        elseif ($message == 'review')
        {
          echo "<h3 class='message2'>There was an error when trying to add the";
          echo " review. Each user can only add a review for a given book";
          echo " once</h3>";
        }
      }
    ?>
    <?php
      require 'db_access.php';
      $db = get_db();
      $statement = $db->query('SELECT b.book_id, b.title, b.author,
                              b.image_link, (SELECT COUNT(*) FROM vote v
                              WHERE v.book_id = b.book_id
                              AND is_up=\'yes\') -
                              (SELECT COUNT(*) FROM vote v
                              WHERE v.book_id = b.book_id
                              AND is_up=\'no\') AS count,
                              b.description FROM book b');
      echo "<div id='book_container'>";
      while ($row = $statement->fetch(PDO::FETCH_ASSOC))
      {
        $book_id = $row['book_id'];
        $count = $row['count'];

        $title = $row['title'];
        $author = $row['author'];
        $image_link = $row['image_link'];
        $description = $row['description'];
        echo "<div class='book'>";
        echo "  <h3>$title</h3>";
        echo "  <img src='$image_link' alt='$title'>";
        echo "  <h4>Written by $author</h4>";
        echo "  <p>$description</p>";
        echo "  <h4>Rating: $count</h4>";
        echo "  <form action=\"book_reviews.php\" method=\"get\">";
        echo "    <button type=\"submit\" name=\"book\" value=\"$book_id\">
        View Book Reviews</button>";
        echo "  </form>";
        echo "  <form action='vote.php' method='post'>";
        echo "  <button type='submit' name='up' value='$book_id'>Vote Up</button>";
        echo "  <button type='submit' name='down' value='$book_id'>Vote Down";
        echo "</button>";
        echo "  </form>";
        echo "</div>";
      }
    ?>
    </div>
    <a id='add_book' href="add_book.php">Add a book</a>
  </body>
</html>
