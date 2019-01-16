<!DOCTYPE html>
<html>
  <head>
    <title>Home Page</title>
    <link rel="stylesheet" href="index.css">
  </head>
  <body>
    <h1>Home Page</h1>
    <h2>Click an image for more information</h2>
    <img id="batman" onclick="showBatman()" src="https://static.comicvine.com/uploads/original/11130/111300799/5440136-4977858128-batma.jpg" alt="Batman">
    <img id="spiderman" onclick="showSpiderman()"src="https://upload.wikimedia.org/wikipedia/en/2/21/Web_of_Spider-Man_Vol_1_129-1.png" alt="Spiderman">
    <div id="batmanText">
      <h3>Batman is a fictional superhero created by Bob Kane and Bill Finger in 1939.</h3>
      <h3>He first appeared in Detective Comics #27. Batman's story often begins with a</h3>
      <h3>young boy named Bruce Wayne who was born to very wealthy parents. When Bruce</h3>
      <h3>was a boy his parents were shot and killed in front of him by a mugger on the</h3>
      <h3>streets. His traumatic childhood helped shape him and led to a decision to </h3>
      <h3>dedicate his life to stopping crime. He later became the batman because he</h3>
      <h3>wanted to project his fear of bats onto the criminals of Gotham city.</h3>
      <a href="https://en.wikipedia.org/wiki/Batman">Click here for more information</a>
    </div>
    <div id="spidermanText">
      <h3>Spiderman is a fictional superhero created by Stan Lee and Steve Ditko in 1962.</h3>
      <h3>He first appeared in Amazing Fantasy #15. Spiderman's story often begins with a</h3>
      <h3>nerdy young Peter Parker who is bitten by a radioactive spider. The spider gives</h3>
      <h3>Peter the relative strength and agility of a spider. This inspires Peter to become</h3>
      <h3>Spiderman. At first Spiderman uses his powers to become a TV star, but allowing a</h3>
      <h3>mugger to escape leads to the death of Peter's uncle Ben. This tragedy helps Peter</h3>
      <h3>to recognize that "with great power comes great responsibility", and he decided to</h3>
      <h3>start to use his powers for good.</h3>
      <a href="https://en.wikipedia.org/wiki/Spider-Man">Click here for more information</a>
    </div>
    <br>
    <a href="assignments.php">Click here to go to the assignments page</a>
    <?php
      include 'header.php';
    ?>
    <script src="index.js"></script>
  </body>
</html>
