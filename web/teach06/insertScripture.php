<?php
  require 'db_access.php';
  $db = get_db();
  $book = htmlspecialchars($_POST['book']);
  $chapter = htmlspecialchars($_POST['chapter']);
  $verse = htmlspecialchars($_POST['verse']);
  $content = htmlspecialchars($_POST['content']);
  $topics = $_POST['topics'];

  try {
    if ($_POST['topic'] == 'yes') {
      $name = htmlspecialchars($_POST['new_topic']);
      $stmt = $db->prepare('INSERT INTO Topic (name)
                            VALUES (:name)');
      $stmt->execute(array(':name' => $name));
      $newId = $db->lastInsertId('topic_id_seq');
      $topics[] =  $newId;
    }
    $stmt = $db->prepare('INSERT INTO Scriptures (book, chapter, verse, content)
                          VALUES (:book, :chapter, :verse, :content)');
    $stmt->execute(array(':book' => $book, ':chapter' => $chapter,
                         ':verse' => $verse, ':content' => $content));
    foreach ($topics as $topic) {
      $stmt2 = $db->prepare('INSERT INTO Scripture_Topic (scripture_id, topic_id)
                            VALUES (:scripture_id, :topic_id)');
      $newId = $db->lastInsertId('scriptures_id_seq');
      $stmt2->execute(array(':scripture_id' => $newId, ':topic_id' => $topic));
    }

  }
  catch (exception $e) {
    echo "Fail";
  }
  header('Location: inputScripture.php');
 ?>
