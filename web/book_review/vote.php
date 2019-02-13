<?php
  session_start();
  require 'db_access.php';
  $vote = $_POST['vote'];
  echo "You Voted $vote";
  if (isset($_SESSION['logged_in']))
  {

  }
  else
  {
    header("Location: login.php?message=login", true, 301);
  }
?>
