<?php
require_once('dbconnect.php');
$db = get_db();

$course_id = $_GET['course_id'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Notes</title>
  </head>
  <body>
<?php
echo "<h1> Notes for $course_id</h1>"; 
?>
    <h1>Notes for XXXX - XXXXXXX</h1>

  </body>
</html>
