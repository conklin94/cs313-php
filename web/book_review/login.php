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
    ?>
    <h2>Login</h2>
    <?php
      $message = htmlspecialchars($_GET['message']);
      if ($message == 'success') {
        echo "<h3>You have successfully logged out</h3>";
      } elseif ($message == 'fail') {
        echo "<h3>Incorrect username and/or password</h3>";
      }
    ?>
    <br>
    <form id="login" action="log_in_or_out.php" method="post">
      <label for="username">Username</label><br>
      <input type="text" name="username"><br>
      <label for="password">Password</label><br>
      <input type="password" name="password"><br>
      <button type="submit" name="login" value="True">Log in</button>
    </form>

  </body>
</html>
