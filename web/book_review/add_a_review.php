<?php
  session_start();
  require 'db_access.php';
  $db = get_db();
  $book_id = $_SESSION['book_id'];
  $stars = $_POST['stars'];
  $comments = htmlspecialchars($_POST['comments']);
  $username = $_SESSION['logged_in'];
  try
  {
    $stmt = $db->prepare('INSERT INTO review (reader_id, book_id, stars,
                                              comments, creation_date)
                          VALUES ((SELECT reader_id FROM reader
                                   WHERE username = :username), :book_id,
                                   :stars, :comments, current_date)');
    $stmt->execute(array(':username' => $username, ':book_id' => $book_id,
                         ':stars' => $stars, ':comments' => $comments));
    header("Location: book_reviews.php?book=$book_id", true, 301);
  }
  catch (Exception $e)
  {
    $message = htmlspecialchars($e->getMessage());
    header("Location: books.php?message=$message", true, 301);
  }
?>
