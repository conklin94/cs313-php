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
      $message = htmlspecialchars($_GET['message']);
      echo "<br>";
      if ($message == 'password') {
        echo "<h3 class='message'>The passwords must match</h3>";
      } elseif ($message == 'password1') {
        echo "<h3 class='message'>The password must be at least 7 characters";
        echo " long and contain at least 1 number</h3>";
      } elseif ($message == 'fail') {
        echo "<h3 class='message'>Unable to create user, make sure all fields";
        echo " are filled in. You may also need to try a different username";
        echo "</h3>";
      }
    ?>
    <br>
    <h1 class='login'>Create New User</h1>
    <form id="new_user" class="login" action="create_user.php" method="post">
      <label for="first_name">First Name:</label><br>
      <input type="text" name="first_name" required><br>
      <label for="last_name">Last Name:</label><br>
      <input type="text" name="last_name" required><br>
      <label for="username">Username:</label><br>
      <input type="text" name="username" required><br>
      <label for="email">Email:</label><br>
      <input type="text" name="email" oninput="validatePassword()"
      required><br>
      <label for="password1">Password:</label><br>
      <input type="password" name="password1" oninput="validatePassword()"
      required><br>
      <label for="password2">Re-enter Password:</label><br>
      <input type="password" name="password2" oninput="validatePassword()"
      required>
      <div id="password_text">Passwords must match</div><br>
      <button type="submit" name="create_user">Create</button>
    </form>
    <script src="script.js"></script>
  </body>
</html>
