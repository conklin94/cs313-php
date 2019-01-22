<?php
echo "name: " . $_POST["name"] . "<br>";
echo "email: <a href='mailto:" . $_POST["email"] . "'>" . $_POST["email"] . "</a><br>";
echo "major: " . $_POST["major"] . "<br>";
echo "comments: " . $_POST["comments"] . "<br>";
echo "You have visited:<br>";
foreach($_POST["countries"] as $value)
{
  echo $value . "<br>";
}
 ?>
