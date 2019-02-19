<?php
  session_start();
  require 'db_access.php';
  $db = get_db();
  if ($_POST['login'] == 'True') {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $stmt = $db->prepare('SELECT reader_id, password FROM reader
                          WHERE username=:username');
    $stmt->execute(array(':username' => $username));
    $row = $stmt->fetch();
    $passwordHash = $row['password'];
    if (password_verify($password, $passwordHash)) {
      // Correct Password
      $_SESSION['logged_in'] = $username;
      header("Location: books.php?message=welcome");
      die();
    } else {
      // Wrong password
      header("Location: login.php?message=fail");
      die();
    }
  }
  else {
    if (isset($_SESSION['logged_in'])) {
      unset($_SESSION['logged_in']);
      header("Location: login.php?message=success");
      die();
    }
    else {
      header("Location: login.php");
      die();
    }
  }

?>
