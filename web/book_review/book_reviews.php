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
      require 'db_access.php';
      $db = get_db();
      $book_id = $_POST['book'];
      $stmt = $db->prepare('SELECT title, author, image_link, description
                            FROM book WHERE book_id=:book_id');
      $stmt->execute(array(':book_id' => $book_id));
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach ($rows as $row) {
        $title = $row['title'];
        $author = $row['author'];
        $image_link = $row['image_link'];
        $description = $row['description'];
        echo "<div class='book_review'>";
        echo "  <h1>$title</h1>";
        echo "  <img src='$image_link' alt='$title'>";
        echo "  <h2>Written by $author</h2>";
        echo "  <h4>$description</h4>";
        echo "  <a href='add_review.php?book_id=$book_id'>Add a review</a>";
        echo "</div>";
      }
      $stmt2 = $db->prepare('SELECT (SELECT username FROM reader rd
                                     WHERE rd.reader_id = rv.reader_id)
                                     AS username,
                                    rv.stars, rv.comments, rv.creation_date
                            FROM review rv WHERE book_id=:book_id');
      $stmt2->execute(array(':book_id' => $book_id));
      $rows2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
      foreach ($rows2 as $row) {
        $username = $row['username'];
        $stars = $row['stars'];
        $comments = $row['comments'];
        $date = $row['creation_date'];
        echo "<div class='review'>";
        echo "  <h4>$stars out of 5 stars</h4>";
        echo "  <p>$comments</p>";
        echo "  <h5>Written $date by $username</h5>";
        echo "</div>";

      }
    ?>
    <h1>This is the Book Review page</h1>
    <a href='add_review.php'>Go to add review page</a>
    <a href='books.php'>Go to main page</a>
  </body>
</html>
