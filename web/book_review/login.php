<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php
      include 'header.php';
      $message = htmlspecialchars($_GET['message']);
      if ($message == 'success') {
        echo "<h2>You have successfully logged out</h2>";
      } elseif ($message == 'fail') {
        echo "<h2>Incorrect username and/or password</h2>";
      }
    ?>
    <form action="log_in_or_out.php" method="post">
      Username: <input type="text" name="username"><br>
      Password: <input type="text" name="password"><br>
      <button type="submit" name="login" value="True">Log in</button>
    </form>

  </body>
</html>
