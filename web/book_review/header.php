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
          echo "  <form class='log' action=\"log_in_or_out.php\" method=\"post\">";
          echo "    <button type=\"submit\" name=\"login\" value=\"False\">
          Log out</button>";
          echo "  </form>";
          if (basename($_SERVER['PHP_SELF'])!= 'update_user.php') {
            echo "  <form class='log' action=\"update_user.php\" method=\"post\">";
            echo "    <button type=\"submit\">Change Password</button>";
            echo "  </form>";
          }
        }
        elseif (basename($_SERVER['PHP_SELF'])!= 'login.php') {
          echo "  <form class='log' action=\"login.php\" method=\"post\">";
          echo "    <button type=\"submit\">Log in</button>";
          echo "  </form>";
        }
      ?>
      <form class="search" action="book_search.php" method="post">
        <input type="text" name="search">
        <button type="submit">Search</button>
      </form>
    </div>
  </body>
</html>
