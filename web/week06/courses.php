<?php
require_once('dbconnect.php');
$db = get_db();

$query = 'SELECT id, name, course_code FROM course';
$statement = $db->prepare($query);
$statement->execute();
$courses = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Courses</title>
  </head>
  <body>
    <h1>Notes App</h1>

    <h2>Courses</h2>

    <ul>
<?php
foreach ($courses as $course)
{
  $id = $course['id'];
  $name = $course['name'];
  $course_code = $course['course_code'];

  echo "<li><a href='notes.php?course_id=$id'>$course_code - $name</a></li>\n";
}

?>
    </ul>
  </body>
</html>
