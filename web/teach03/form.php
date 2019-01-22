<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <form action="results.php" method="post">
      Name: <input type="text" name="name"><br>
      Email: <input type="text" name="email"><br>
      <?php
        $majors = array("CS"=>"Computer Science", "WDD"=>"Web Design and Development",
      "CIT"=>"Computer Information Technology", "CE"=>"Computer Engineering");
      echo "Major:<br>";
      foreach($majors as $x => $x_value) {
        echo "<input type='radio' name='major' value='$x'> $x_value<br>";
      }
      ?>
      Comments:<br>
      <textarea name="comments" rows="4" cols="50"></textarea><br>
      <input type="checkbox" name="countries[]" value="NA"> North America <br>
      <input type="checkbox" name="countries[]" value="SA"> South America <br>
      <input type="checkbox" name="countries[]" value="EU"> Europe <br>
      <input type="checkbox" name="countries[]" value="AS"> Asia <br>
      <input type="checkbox" name="countries[]" value="AU"> Australia <br>
      <input type="checkbox" name="countries[]" value="AF"> Africa <br>
      <input type="checkbox" name="countries[]" value="AN"> Antartica <br>
      <input type="submit">
    </form>
  </body>
</html>
