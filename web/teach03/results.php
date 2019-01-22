<?php
  echo "name: " . htmlspecialchars($_POST["name"]) . "<br>";
  echo "email: <a href='mailto:" . htmlspecialchars($_POST["email"]) . "'>" .
  htmlspecialchars($_POST["email"]) . "</a><br>";
  echo "major: " . htmlspecialchars($_POST["major"]) . "<br>";
  echo "You have visited:<br>";
  echo "Comments:<br>"
  echo htmlspecialchars($_POST["comments"]) . "<br>";
  $country = array("NA" => "North America", "SA" => "South America",
  "EU" => "Europe", "AS" => "Asia", "AU" => "Australia", "AF" => "Africa",
  "AN" => "Antartica");
  foreach($_POST["countries"] as $value)
  {
    echo $country[htmlspecialchars($value)] . "<br>";
  }
 ?>
