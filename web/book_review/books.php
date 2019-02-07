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
      try
      {
        $dbUrl = getenv('DATABASE_URL');

        $dbOpts = parse_url($dbUrl);

        $dbHost = $dbOpts["host"];
        $dbPort = $dbOpts["port"];
        $dbUser = $dbOpts["user"];
        $dbPassword = $dbOpts["pass"];
        $dbName = ltrim($dbOpts["path"],'/');

        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      catch (PDOException $ex)
      {
        echo 'Error!: ' . $ex->getMessage();
        die();
      }
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
    <h1>This is the Books page</h1>
    <a href='login.php'>Go to login page</a>
    <a href='book_reviews.php'>Go to book review page</a>
    <a href='add_book.php'>Go to add book page</a>
  </body>
</html>
