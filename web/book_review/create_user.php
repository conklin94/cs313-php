<?php
require 'db_access.php';
$db = get_db();

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];

echo "Hello $first_name $last_name, How are you?";
echo " $username will be your username, and $password1 shall be your password.";
echo " Assuming that $password1 equals $password2, otherwise you are doomed.";
?>
