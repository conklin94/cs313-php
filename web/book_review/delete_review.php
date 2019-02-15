<?php
session_start();
require 'db_access.php';
$db = get_db();

$book_id = $_POST['delete'];
$username = $_SESSION['logged_in'];

try {
  $stmt = $db->prepare('DELETE FROM book_review WHERE book_id = :book_id
                        AND reader_id = (SELECT reader_id FROM reader
                                         WHERE username = :username)');
  $stmt->execute(array(':book_id' => $book_id, ':username' => $username));
  header("Location: book_reviews.php?book=$book_id");
  die();
}
catch (Exception $e) {
  echo "Error: " . $e->getMessage();
  die();
}



?>
