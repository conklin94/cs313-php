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


 </body>
 </html>
