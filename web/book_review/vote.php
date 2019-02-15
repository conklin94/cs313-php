<?php
  session_start();
  require 'db_access.php';
  if (isset($_SESSION['logged_in']))
  {
    $username = $_SESSION['logged_in'];
    $book_id = 0;
    $is_up = NULL;
    if (isset($_POST['up']))
    {
      $is_up = True;
      $book_id = $_POST['up'];
    }
    elseif (isset($_POST['down']))
    {
      $is_up = False;
      $book_id = $_POST['down'];
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
      header("Location: books.php");
      die();
    }
    catch (Exception $e)
    {
      echo "error: " . $e->getMessage();
      //header("Location: books.php?message=vote");
      die();
    }
  }
  else
  {
    header("Location: login.php?message=login");
    die();
  }
?>
