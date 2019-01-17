<?php
session_start();
$user = $_GET['user'];
if($user == 'admin') {
  $_SESSION["user"] = "admin";
} elseif($user == 'tester') {
  $_SESSION["user"] = "tester";
} else {
  $_SESSION["user"] = "none";
}
print_r($_SESSION);
echo "$user";
echo "admin";
echo $_SESSION["user"];
echo $_GET['user'];
echo htmlspecialchars($_GET['user']);
//header('Location: home.php');
?>
