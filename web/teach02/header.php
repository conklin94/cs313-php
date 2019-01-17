<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>The Kelvan: something to do with pictures</h1>
<?php
$page = basename($_SERVER['PHP_SELF']);
if ($page == 'about-us.php') {
    echo "<div>
    <a href= 'about-us.php' style='font-weight:bold;'>About Us</a>
    <a href= 'home.php'>Home</a>
    <a href= 'login.php'>Login</a>
    </div>";
}
else if ($page == 'home.php') {
    echo "<div>
    <a href= 'about-us.php'>About Us</a>
    <a href= 'home.php' style='font-weight:bold;'>Home</a>
    <a href= 'login.php'>Login</a>
    </div>";
}
else if ($page == 'login.php') {
    echo "<div>
    <a href= 'about-us.php'>About Us</a>
    <a href= 'home.php'>Home</a>
    <a href= 'login.php' style='font-weight:bold;'>Login</a>
    </div>";
}
?>
</body>
</html>
