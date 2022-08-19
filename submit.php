<?php
include'resources/connection.php';
$name=$_POST['name'];
$email=$_POST['email'];
$feedback=$_POST['feedback'];
$query="INSERT INTO feedback (sno, name, email, feedback) VALUES (NULL, '$name', '$email', '$feedback');";
if(mysqli_query($con,$query)){
    echo'<center><h1>Thanks for giving your feedback</h1>
    <h3><a href="index.php">Click here to go to portfolio page again</a></h3>
    </center>';

}
else{
    echo'<center><h1>sorry your feedback not registered please write again</h1>
    <h3><a href="index.php">Click here to go to portfolio page again</a></h3>
    </center>';
}
?>