<style>
.a {

    font-size: 200%;
    font-weight: bold;

}

a {
    padding-left: 5%;
    padding-right: 5%;
}
</style>
<?php
session_start();

if($_SESSION['active']){
include'../resources/connection.php';
$query=mysqli_query($con,"select * from completed");

echo'<center><h1>Admin Card completed project Tab</h1>';
echo'<header>

<a class="a" href="home.php">Home</a>
<a class="a" href="completed.php?addcard=1">Add a Card</a>
<a class="a" href="logout.php">Logout</a>
</header><hr>';
//fetching detail from database
while($fetch=mysqli_fetch_assoc($query)){
  $sno=$fetch['sno'];
  $title=$fetch['c_title'];
  $brief=$fetch['c_brief'];
  $link=$fetch['c_link'];
  $image=$fetch['c_image'];

  echo'
  <table>
  <tr>
      <td>Card title</td>
      <td>'.$title.'</td>
  </tr>
  <tr>
      <td>Card brief</td>
      <td>'.$brief.'</td>

  </tr>
  <tr>
      <td>Card link</td>
      <td>'.$link.'</td>
  </tr>
  <tr>
      <td>Card image name</td>
      <td>'.$image.'</td>
  </tr>
  <a href="completed.php?sno='.$sno.'">Click to edit</a>
  <a href="completed.php?delete='.$sno.'">delete</a>
</table>
  <hr>
  ';
}
//delete
if(isset($_GET['delete'])){
    $sno=$_GET['delete'];
    $query= "DELETE FROM completed WHERE sno = $sno";
    mysqli_query($con,$query) or die(mysqli_error($con));
    header("location:completed.php");
    
}
//add request in database
if(isset($_POST['add'])){
   $file_temp=$_FILES['image']['tmp_name'];
   $file_name=$_FILES['image']['name'];
   move_uploaded_file($file_temp,"../image/".$file_name);
    $title=$_POST['title'];
    $brief=$_POST['brief'];
    $link=$_POST['link'];
    
    $query="INSERT INTO completed (sno, c_title, c_brief, c_link, c_image) VALUES (NULL, '$title', '$brief', '$link', '$file_name');";
    mysqli_query($con,$query) or die(mysqli_error($con));
    header("location:completed.php");
}
//add form appear in dashboard
if(isset($_GET['addcard'])){
    
    

echo'
<form action="" method="post" enctype="multipart/form-data">
';
echo'
Card Title:- <input  type="text" name="title" required>
Card Brief:- <input type="text" name="brief" required>
Card Link:- <input  type="text" name="link" required>
Upload Image:- <input  type="file" name="image" required>

    <input type="submit" name="add" value="add">
    <input type="reset">
</form>';

}
//for editing
if(isset($_GET['sno'])){
  $sno=$_GET['sno'];
echo'
<form action="" method="post">
';
$query=mysqli_query($con,"select * from completed where sno=$sno");
$data=mysqli_fetch_assoc($query);
    $sno=$data['sno'];
    $title=$data['c_title'];
    $brief=$data['c_brief'];
    $link=$data['c_link'];
    $image=$data['c_image'];
    
echo'sno:- <input type="text" value="'.$sno.'" name="sno" required>';
    
echo'
Card Title:- <input  type="text" value="'.$title.'" name="title" required>
Card Brief:- <input type="text" value="'.$brief.'" name="brief" required>
Card Link:- <input  type="text" value="'.$link.'" name="link" required>
Card Image Name:- <input  type="text" value="'.$image.'" name="image" required>

    <input type="submit" name="submit" value="submit">
    <input type="reset">
</form>
';
}
//submission request to database
if(isset($_POST['submit'])){
    $title=$_POST['title'];
    $brief=$_POST['brief'];
    $link=$_POST['link'];
    $image=$_POST['image'];
    
    $query="UPDATE completed SET c_title = '$title', c_brief = '$brief', c_link='$link', c_image='$image' WHERE sno = '$sno'; "; 
   mysqli_query($con,$query) or die(mysqli_error($con));
   header("location:completed.php");
    }
}
else{
    header("location:error.php");
}

echo'</center>';

?>