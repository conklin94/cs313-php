<?php
  session_start();
  require 'db_access.php';
  $db = get_db();
  if ($_POST['login'] == 'True') {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $stmt = $db->prepare('SELECT reader_id FROM reader
                          WHERE username=:username AND password=:password');
    $stmt->execute(array(':username' => $username, ':password' => $password));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
      $_SESSION['logged_in'] = $username;
      header("Location: books.php", true, 301);
      exit();
    }
    header("Location: login.php?message=fail", true, 301);
    exit();
  }
  else {
    if (isset($_SESSION['logged_in'])) {
      unset($_SESSION['logged_in']);
      header("Location: login.php?message=success", true, 301);
      exit();
    }
  }

?>
