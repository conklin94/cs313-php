<?php
$course_id = htmlspecialchars($_POST["course_id"]);
$date = htmlspecialchars($_POST["date"]);
$content = htmlspecialchars($_POST["content"]);

echo "Trying to insert: courseid: $course_id, date: $date, content: $content";
$query = 'INSERT INTO note(date, content, course_id) VALUES
          (:date, :content, :course_id)';
$statement = $db->prepare($query);
$statement->execute(array(':course_id' => $course_id, ':date' => $date,
                          ':content' => $content));
$course = $statement->fetch(PDO::FETCH_ASSOC);

?>
