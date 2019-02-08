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
        echo "  <form action=\"book_reviews.php\" method=\"post\">";
        echo "    <button type=\"submit\" name=\"book\" value=\"$book_id\">
        View Book Reviews</button>";
        echo "  </form>";
        echo "</div>";
      }
    ?>
    <a href="add_book.php">Add a book</a>
  </body>
</html>
