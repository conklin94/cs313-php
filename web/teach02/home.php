<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php
      include 'header.php';
      if (! isset($_SESSION['user'])) {
        $_SESSION['user'] = 'none';
      }

      if ($_SESSION["user"] == "admin") {
        echo "<p>Welcome, you are currently logged in as Admin.</p>";
        echo "<a href='user.php'>Log out</a>";
      } elseif ($_SESSION["user"] == "tester") {
        echo "<p>Welcome. You are currently logged in as a Tester.</p>";
        echo "<a href='user.php'>Log out</a>";
      } else {
        echo "<p>Welcome. You are not logged in.</p>";
      }

    ?>

    </body>
</html>
