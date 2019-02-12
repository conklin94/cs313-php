<?php
  require 'db_access.php';
  $db = get_db();
  $book = $_POST['book'];
  $chapter = $_POST['chapter'];
  $verse = $_POST['verse'];
  $content = $_POST['content'];
  $topics = $_POST['topics'];

  try {
    $stmt = $db->prepare('INSERT INTO Scriptures (book, chapter, verse, content)
                          VALUES (:book, :chapter, :verse, :content)');
    $stmt->execute(array(':book' => $book, ':chapter' => $chapter,
                         ':verse' => $verse, ':content' => $content));
    foreach ($topics as $topic) {
      $stmt = $db->prepare('INSERT INTO Scripture_Topic (scripture_id, topic_id)
                            VALUES (:scripture_id, :topic_id)');
      $newId = $db->lastInsertId('scriptures_id_seq');
      $stmt->execute(array(':scripture_id' => $newId, ':topic_id' => $topic));
    }
  }
  catch (exception $e) {
    echo "Fail";
  }
  header('Location: scriptureList.php');
 ?>
