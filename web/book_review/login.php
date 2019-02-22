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
    <h2 class="login">Login</h2>
    <?php
      $message = htmlspecialchars($_GET['message']);
      if ($message == 'success') {
        echo "<h3 class='message'>You have successfully logged out</h3>";
      } elseif ($message == 'fail') {
        echo "<h3 class='message'>Incorrect username and/or password</h3>";
      } elseif ($message == 'login') {
        echo "<h3 class='message'>You must log in to perform this action</h3>";
      } elseif ($message == 'user') {
        echo "<h3 class='message'>New user successfully created</h3>";
      }
    ?>
    <br>
    <form class="login" action="log_in_or_out.php" method="post">
      <label for="username">Username</label><br>
      <input type="text" name="username" required><br>
      <label for="password">Password</label><br>
      <input type="password" name="password" required><br>
      <button type="submit" name="login" value="True">Log in</button>
    </form>
    <form class="login" action="create_new_user.php" method='post'>
      <button type="submit" name="create_new_user">Create New User</button>
    </form>


    </form>

  </body>
</html>
