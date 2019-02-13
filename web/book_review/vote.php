<?php
  session_start();
  require 'db_access.php';
  $vote = $_POST['vote'];
  echo "You Voted $vote";
?>
