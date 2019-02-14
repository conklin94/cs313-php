<?php
$course_id = htmlspecialchars($_POST["course_id"]);
$date = htmlspecialchars($_POST["date"]);
$content = htmlspecialchars($_POST["content"]);

echo "Trying to insert: courseid: $course_id, date: $date, content: $content";
?>
