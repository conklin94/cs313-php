<?php
  session_start();
  require 'db_access.php';
  $db = get_db();
  $title = htmlspecialchars($_POST['title']);
  $author = htmlspecialchars($_POST['author']);
  $image_link = htmlspecialchars($_POST['image_link']);
  $description = htmlspecialchars($_POST['description']);
  $created_by = $_SESSION['logged_in'];
  try
  {
    $stmt = $db->prepare('INSERT INTO book (title, image_link, description,
                                            author, created_by, creation_date)
                          VALUES (:title, :image_link, :description, :author,
                                  (SELECT reader_id FROM reader
                                   WHERE username = :created_by),
                                   current_date)');
    $stmt->execute(array(':title' => $title, ':image_link' => $image_link,
                         ':description' => $description, ':author' => $author,
                         ':created_by' => $created_by));
    header("Location: books.php");
    die();
  }
  catch (Exception $e)
  {
    //This can be used for error checking
    //echo "Error: " . $e->getMessage();
    header("Location: books.php?message=book");
    die();
  }
?>
