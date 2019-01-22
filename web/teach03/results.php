<?php
echo "name: " . $_POST["name"] . "<br>";
echo "email: <a href='mailto:" . $_POST["email"] . "'>" . $_POST["email"] . "</a><br>";
echo "major: " . $_POST["major"] . "<br>";
echo "comments: " . $_POST["comments"] . "<br>";
echo "You have visited:<br>";
$country = array("NA" => "North America", "SA" => "South America",
"EU" => "Europe", "AS" => "Asia", "AU" => "Australia", "AF" => "Africa",
"AN" => "Antartica");
foreach($_POST["countries"] as $value)
{
  echo $country[$value] . "<br>";
}
 ?>
