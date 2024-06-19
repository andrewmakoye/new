<?php
session_start();
$conn = mysqli_connect("localhost","root","","donor");
session_destroy();
session_unset();
header('location: ingia.php');
?>