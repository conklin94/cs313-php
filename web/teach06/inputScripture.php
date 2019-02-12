<?php
  require 'db_access.php';
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 </head>
 <body>
   <form action="insertScripture.php" method="post">
     Book: <input type="text" name="book"><br>
     Chapter: <input type="text" name="chapter"><br>
     Verse: <input type="text" name="verse"><br>
     Content: <textarea rows="4" cols="50" name="content"></textarea><br>
     <?php
       $db = get_db();
       $statement = $db->query('SELECT id, name FROM Topic');
       while ($row = $statement->fetch(PDO::FETCH_ASSOC))
       {
         $id = $row['id'];
         $name = $row['name'];
         echo "<input type='checkbox' name='topics[]' value='$id'>$name<br/>";
       }
      ?>
     <input type="submit">
   </form>


 </body>
 </html>
