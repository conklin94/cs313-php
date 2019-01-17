<?php
session_start();
if(htmlspecialchars($_GET['user'] == 'admin')) {
  $_SESSION["user"] = "admin";
} elseif(htmlspecialchars($_GET['user'] == 'tester')) {
  $_SESSION["user"] = "tester";
} else {
  $_SESSION["user"] = "none";
}
print_r($_SESSION);
echo $_GET['user'];
echo htmlspecialchars($_GET['user']);
//header('Location: home.php');
?>
