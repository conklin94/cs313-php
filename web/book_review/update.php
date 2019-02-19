<?php
require 'db_access.php';
$db = get_db();

try
{
  echo "Part 1 ";
  $stmt = $db->prepare('SELECT username, password FROM reader');
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo " Part 2 ";
  foreach ($rows as $row) {
    $username = $row['username'];
    $password = $row['password'];
    echo " Part 3 ";
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $db->prepare('UPDATE reader SET password = :password
                          WHERE username = :username');
    $stmt->execute(array(':password' => $passwordHash, ':username', $username));
  }
  echo "Passwords updated successfully";
}
catch (Exception $e)
{
  echo "Error: " . $e->getMessage();
}
?>
