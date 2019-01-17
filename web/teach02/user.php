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
print_r($_SESSION);
echo "$user";
echo "admin";
echo $_SESSION["user"];
echo $_GET['user'];
echo htmlspecialchars($_GET['user']);
//header('Location: home.php');
?>
