<?php
  require 'db_access.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <?php
      $db = get_db();
      $statement = $db->query('SELECT id, book, chapter, verse FROM Scriptures');
      while ($row = $statement->fetch(PDO::FETCH_ASSOC))
      {
        $scripture_id = $row['id'];
        $book = $row['book'];
        $chapter = $row['chapter'];
        $verse = $row['verse'];
        echo "<h1>$book $chapter:$verse</h1>";
        $stmt = $db->prepare('SELECT (SELECT name FROM Topic WHERE id = st.topic_id) AS name
                              FROM Scripture_Topic st
                              WHERE scripture_id = :scripture_id');
        $stmt->execute(array(':scripture_id' => $scripture_id));
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<ul>";
        foreach ($rows as $row2) {
          $name = $row2['name'];
          echo "<li>$name</li>";
        }
        echo "</ul>";
      }
  ?>
    <form action="insertScripture.php" method="post">
      Book: <input type="text" name="book"><br>
      Chapter: <input type="text" name="chapter"><br>
      Verse: <input type="text" name="verse"><br>
      Content: <textarea rows="4" cols="50" name="content"></textarea><br>
      <?php
        $statement = $db->query('SELECT id, name FROM Topic');
        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
        {
          $id = $row['id'];
          $name = $row['name'];
          echo "<input type='checkbox' name='topics[]' value='$id'>$name<br>";
        }
        echo "<input type='checkbox' name='topic' value='yes'>";
        echo "<input type='text' name='new_topic'><br>";
       ?>
      <input type="submit">
    </form>


  </body>
</html>
