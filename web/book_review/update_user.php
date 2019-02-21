<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Update User Page</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php
      include 'header.php';
      $message = htmlspecialchars($_GET['message']);
      echo "<br>";
      if ($message == 'password')
      {
        echo "<h3 class='message2'>The new passwords must match</h3>";
      }
      elseif ($message == 'password1')
      {
        echo "<h3 class='message2'>The new password must be at least 7 ";
        echo "characters long and contain at least 1 number</h3>";
      }
      elseif ($message == 'fail1')
      {
        echo "<h3 class='message2'>Invalid password</h3>";
      }
      elseif ($message == 'fail2')
      {
        echo "<h3 class='message2'>Unable to change password</h3>";
      }

      echo "<h1 class='login'>Change Password for User ";
      echo $_SESSION['logged_in'] . "</h1>";
    ?>
    <br>
    <form class="login" action="update.php" method="post">
      <label for="password"> Old Password:</label><br>
      <input type="password" name="password" required><br>
      <label for="password1">New Password:</label><br>
      <input type="password" name="password1" oninput="validatePassword()"
      id="pass1" required>
      <div id="password_text1">Password must be at least 7 characters and
      contain at least 1 number</div><br>
      <label for="password2">Re-enter New Password:</label><br>
      <input type="password" name="password2" oninput="validatePassword()"
      id="pass1" required>
      <div id="password_text2">Passwords must match</div><br>
      <button type="submit" name="change">Change</button>
    </form>
    <script src="script.js"></script>
  </body>
</html>
