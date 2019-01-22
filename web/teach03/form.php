<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <form action="results.php" method="post">
      Name: <input type="text" name="name"><br>
      Email: <input type="text" name="email"><br>
      Major:<br>
      <input type="radio" name="major" value="Computer Science"> Computer Science<br>
      <input type="radio" name="major" value="Web Design and Development"> Web Design and Development<br>
      <input type="radio" name="major" value="Computer Information Technology"> Computer Information Technology<br>
      <input type="radio" name="major" value="Computer Engineering"> Computer Engineering<br>
      Comments:<br>
      <textarea name="comments" rows="4" cols="50"></textarea><br>
      <input type="checkbox" name="countries" value="North America"> North America <br>
      <input type="checkbox" name="countries" value="South America"> South America <br>
      <input type="checkbox" name="countries" value="Europe"> Europe <br>
      <input type="checkbox" name="countries" value="Asia"> Asia <br>
      <input type="checkbox" name="countries" value="Australia"> Australia <br>
      <input type="checkbox" name="countries" value="Africa"> Africa <br>
      <input type="checkbox" name="countries" value="Antartica"> Antartica <br>
      <input type="submit">
    </form>
  </body>
</html>
