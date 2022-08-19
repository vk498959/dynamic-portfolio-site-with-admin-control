<?php
session_start();
include'../resources/connection.php';
$email=$_POST['email'];
$password=$_POST['password'];
$query='select * from admin where email="'.$email.'" and password="'.$password.'";';

$fetch=mysqli_query($con,$query) or die(mysqli_error($con));

if((mysqli_num_rows($fetch))>0){
    $_SESSION['active']=true;
    header("location:home.php");
}
else{
    header("location:error.php");
    
}

?>