<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Book Search</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php
      include 'header.php';
      require 'db_access.php';
      $db = get_db();
      $search = htmlspecialchars($_POST['search']);
      $stmt = $db->prepare('SELECT b.book_id, b.title, b.author, b.image_link,
                            b.description, (SELECT COUNT(*) FROM vote v
                            WHERE v.book_id = b.book_id
                            AND is_up=\'yes\') -
                            (SELECT COUNT(*) FROM vote v
                            WHERE v.book_id = b.book_id
                            AND is_up=\'no\') AS count
                            FROM book b WHERE title LIKE \'%\' || :search || \'%\'
                            OR author LIKE \'%\' || :search || \'%\'');
      $stmt->execute(array(':search' => $search));
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach ($rows as $row) {
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
        echo "  <form action='vote.php' method='post'>";
        echo "  <button type='submit' name='up' value='$book_id'>Vote Up</button>";
        echo "  <button type='submit' name='down' value='$book_id'>Vote Down";
        echo "</button>";
        echo "  </form>";
        echo "</div>";
      }

    ?>
    <a class='link' href="add_book.php">Add a book</a>
  </body>
</html>
