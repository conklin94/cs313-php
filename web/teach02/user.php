<?php
session_start();
$user = $_GET['user'];
if(strpos($user, 'admin') !== false) {
  $_SESSION["user"] = "admin";
} elseif(strpos($user, 'tester') !== false) {
  $_SESSION["user"] = "tester";
} else {
  $_SESSION["user"] = "none";
}
header('Location: home.php');
?>
