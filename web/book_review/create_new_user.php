<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Create User Page</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php
      include 'header.php';
    ?>
    <br>
    <h1 class='login'>Create New User</h1>
    <form class="login" action="create_user.php" method="post">
      <label for="first_name">First Name:</label><br>
      <input type="text" name="first_name"><br>
      <label for="last_name">Last Name:</label><br>
      <input type="text" name="last_name"><br>
      <label for="username">Username:</label><br>
      <input type="text" name="username"><br>
      <label for="password1">Password:</label><br>
      <input type="password" name="password1"><br>
      <label for="password2">Re-enter Password:</label><br>
      <input type="password" name="password2"><br>
      <button type="submit" name="create_user">Create</button>
    </form>

  </body>
</html>
