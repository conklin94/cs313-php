<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Header</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <div id='header'>
      <a href="books.php">
        <img src="https://cdn2.iconfinder.com/data/icons/blue-round-amazing-icons-1/512/home-alt-512.png"
        alt="Home Page">
      </a>
      <h1>Book Reviewer</h1>
      <h3>A place to find books to read and rate books you've read</h3>
      <?php
        if (isset($_SESSION['logged_in'])) {
          echo "  <form action=\"log_in_or_out.php\" method=\"post\">";
          echo "    <button type=\"submit\" name=\"login\" value=\"False\">
          Log out</button>";
          echo "  </form>";
        }
        elseif (basename($_SERVER['PHP_SELF'])!= 'login.php') {
          echo "  <form action=\"login.php\" method=\"post\">";
          echo "    <button type=\"submit\">Log in</button>";
          echo "  </form>";
        }
      ?>
    </div>
  </body>
</html>
