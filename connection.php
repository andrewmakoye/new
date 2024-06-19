<?php
$conn = mysqli_connect("localhost","root","","donor");
if(isset($_POST['save']))
{
$un = $_POST['username'];
$em = $_POST['email'];
$ag = $_POST['age'];
$p = $_POST['password'];

$ins = "INSERT INTO donation(username,email,age,password)
VALUES ('$un','$em','$ag','$p')";

$runn=mysqli_query($conn,$ins);

if ($runn)
 {
    echo "New donor registered successfully";
} 
else {
    echo "please repeat again later";
}
}
mysqli_close($conn);

?>