<?php
session_start();
if($_GET['user'] == 'admin') {
  $_SESSION["user"] = "admin";
} elseif($_GET['user'] == 'tester') {
  $_SESSION["user"] = "tester";
} else {
  $_SESSION["user"] = "none";
}
print_r($_SESSION);
echo $_GET['user'];
echo htmlspecialchars($_GET['user']);
//header('Location: home.php');
?>
