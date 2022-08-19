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
$query=mysqli_query($con,"select * from working");
//header
echo'<center><h1>Admin carousal Tab</h1>';
echo'<header>
<a class="a" href="home.php">Home</a>
<a class="a" href="working.php?addworking=1">Add a carousel</a>
<a class="a" href="logout.php">Logout</a>
</header><hr>'
;
//fetching data from database
while($fetch=mysqli_fetch_assoc($query)){
  $sno=$fetch['sno'];
  $src=$fetch['imgsrc'];
  $alt=$fetch['alt'];
  echo'
  <table>
  <tr>
    <td>sno:-</td>
    <td>'.$sno.'</td>
  </tr>
 <tr>
  <td>Image file name:-</td>
  <td>'.$src.'</td>
</tr>
<tr>
<td>Text in case image not load:-</td>
<td>'.$alt.'</td>
</tr>
<a href="working.php?sno='.$sno.'">Click to edit</a>

<a href="working.php?delete='.$sno.'">Click to delete</a>
  </table>
  <hr>
  ';
}
//delete request to database
if(isset($_GET['delete'])){
  $sno=$_GET['delete'];
  $query="DELETE FROM working WHERE sno = $sno";
  mysqli_query($con,$query) or die(mysqli_error($con));
  header("location:working.php");
}
//add request to database
if(isset($_POST['add'])){
  $src_name=$_FILES['src']['name'];
  $src_temp=$_FILES['src']['tmp_name'];
  move_uploaded_file($src_temp,"../image/".$src_name);
  $alt=$_POST['alt'];
  $query="INSERT INTO working (sno, imgsrc, alt) VALUES (NULL, '$src_name', '$alt');";
  mysqli_query($con,$query) or die(mysqli_error($con));
  header("location:working.php");

}
//adding form appear in dashboard
if(isset($_GET['addworking'])){
echo'
<form action="" method="post" enctype="multipart/form-data">
Upload Image:- <input  type="file"  name="src" required>
Text in case image not load:- <input type="text"  name="alt" required>
<input type="submit" name="add" value="add">
<input type="reset">

</form>
';
}
//for editing the existing details
if(isset($_GET['sno'])){
  $sno=$_GET['sno'];
echo'
<form action="" method="post">
';
$query=mysqli_query($con,"select * from working where sno=$sno");
$data=mysqli_fetch_assoc($query);
    $sno=$data['sno'];
    $src=$data['imgsrc'];
    $alt=$data['alt'];
    
echo'sno:- <input type="text" value="'.$sno.'" name="sno" required>';
    
echo'    Image File name:- <input  type="text" value="'.$src.'" name="src" required>
    Text in case image not load:- <input type="text" value="'.$alt.'" name="alt" required>
  

    <input type="submit" name="submit" value="submit">
    <input type="reset">
</form>
';
}
//updating details to database
if(isset($_POST['submit'])){
    $src=$_POST['src'];
    $alt=$_POST['alt'];
    $sno=$_POST['sno'];
    
    $query="UPDATE working SET imgsrc = '$src', alt = '$alt' WHERE sno = '$sno'; "; 
   mysqli_query($con,$query) or die(mysqli_error($con));
   header("location:working.php");
    }
  }
  else{
    header("location:error.php");
  }

echo'</center>';

?>