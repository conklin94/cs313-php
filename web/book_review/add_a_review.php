<?php
  session_start();
  require 'db_access.php';
  $db = get_db();
  $book_id = $_SESSION['book_id'];
  $stars = $_POST['stars'];
  $comments = htmlspecialchars($_POST['comments']);
  $username = $_SESSION['logged_in'];
  echo "Book ID: $book_id";
  echo "Stars: $stars";
  echo "Comments: $comments";
  echo "Created by: $username";
?>
