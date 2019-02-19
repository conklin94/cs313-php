<?php
require 'myDb.sql';
$db = get_db();

try
{
  $stmt = $db->prepare('SELECT username, password FROM reader');
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach ($rows as $row) {
    $username = $row['username'];
    $password = $row['password'];
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
