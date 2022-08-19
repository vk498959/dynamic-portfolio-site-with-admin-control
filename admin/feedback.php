<?php
include'../resources/connection.php';
$query="select * from feedback";
$fetch=mysqli_query($con,$query) or die(mysqli_error($con));
echo'<center>
<header>Feedbacks <a href="logout.php">Logout</a></header>
<table>';
echo'
    <tr>
        <td>sno</td>
        <td>name</td>
        <td>email</td>
        <td>feedback</td>
    </tr>
';
while($data=mysqli_fetch_assoc($fetch)){
    $sno=$data['sno'];
    $name=$data['name'];
    $email=$data['email'];
    $feedback=$data['feedback'];
echo'<tr>
<td>'.$sno.'</td>
<td>'.$name.'</td>
<td>'.$email.'</td>
<td>'.$feedback.'</td>

</tr>
';
}
echo'</table></center>';
?>