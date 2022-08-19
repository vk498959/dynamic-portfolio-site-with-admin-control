<?php
session_start();
if($_SESSION['active']){
echo'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
    a{
        padding: 5%;
      font-size: 200%;
      font-weight: bold;
      display: block;
        }
        
    </style>
</head>
<body>
<center>
<header>
    <h1>Admin home page</h1>
    <a href="working.php">Working on</a>
    <a href="completed.php">completed project</a>
    <a href="feedback.php">Feedback/Contact us</a>
    <a href="important.php">Important link</a>
    <a href="logout.php">Logout</a>
</header>
</center>
</body>
</html>
';
}
else{
    header("location:error.php");
}
?>