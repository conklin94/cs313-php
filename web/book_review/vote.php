<?php
  session_start();
  require 'db_access.php';
  if (isset($_SESSION['logged_in']))
  {
    $username = $_SESSION['logged_in'];
    $is_up = NULL;
    if (isset($_POST['up']))
    {
      $is_up = True;
    }
    elseif (isset($_POST['down']))
    {
      $is_up = False;
    }
    $db = get_db();
    try {
      $stmt = $db->prepare('INSERT INTO vote (reader_id, book_id, is_up)
                            VALUES ((SELECT reader_id
                                     FROM reader
                                     WHERE username = :username), :book_id,
                                     :is_up)');
      $stmt->execute(array(':username' => $username, ':book_id' => $book_id,
                           ':is_up' => $is_up));
      header("Location: books.php", true, 301);
    }
    catch (Exception $e)
    {
      echo 'Exception caught:',  $e->getMessage(), "\n";
    }
  }
  else
  {
    header("Location: login.php?message=login", true, 301);
  }
?>
