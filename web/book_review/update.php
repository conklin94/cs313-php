<?php
require 'db_access.php';
$db = get_db();

$password = htmlspecialchars($_POST['password']);
$password1 = htmlspecialchars($_POST['password1']);
$password2 = htmlspecialchars($_POST['password2']);
$username = $_SESSION['logged_in'];

if ($password1 != $password2)
{
  header("Location: update_user.php?message=password");
  die();
}

if (strlen($password1) < 7 or (0 === preg_match('~[0-9]~', $password1)))
{
  header("Location: update_user.php?message=password1");
  die();
}

try {
  $stmt = $db->prepare('SELECT reader_id, password FROM reader
                        WHERE username=:username');
  $stmt->execute(array(':username' => $username));
  $row = $stmt->fetch();
  $passwordHash = $row['password'];

  if (password_verify($password, $passwordHash)) {
    // Correct Password
    $passwordHash1 = password_hash($password1, PASSWORD_DEFAULT);
    $stmt = $db->prepare('UPDATE reader SET password = :password
                          WHERE username = :username');
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':password', $passwordHash1, PDO::PARAM_STR);
    $stmt->execute();

    header("Location: books.php?message=password");
    die();
  } else {
    // Wrong password
    echo strlen($passwordHash)
    //header("Location: update_user.php?message=fail1");
    die();
  }

}
catch (Exception $e) {
  //This can be used for error checking
  //echo "Error: " . $e->getMessage();
  header("Location: update_user.php?message=fail2");
  die();
}
?>
