<!DOCTYPE html>
<html>
  <head>
    <title>Header</title>
    <link rel="stylesheet" href="header.css">
  </head>
  <body>
    <div class="header">
      <a href=index.php>
        <img id="home" src="https://image.flaticon.com/icons/svg/25/25694.svg">
      </a>
      <h1 id="headerTitle">My super cool website</h1>
      <?php
        $timeDate = date("M d, Y, h:i:s A");
        echo "<p>Time: $timeDate</p>";
      ?>
    </div>

  </body>
</html>
