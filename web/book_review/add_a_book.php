<?php
  session_start();
  require 'db_access.php';
  $db = get_db();
  $title = htmlspecialchars($_POST['title']);
  $author = htmlspecialchars($_POST['author']);
  $image_link = htmlspecialchars($_POST['image_link']);
  $description = htmlspecialchars($_POST['description']);
  $created_by = $_SESSION['logged_in'];
  echo "Title: $title";
  echo "Author: $author";
  echo "Image Link: $image_link";
  echo "Description: $description";
  echo "Created by: $created_by";
?>
