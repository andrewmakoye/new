<!DOCTYPE html>
<html>
<head>
    <title>Make a Donation</title>
    <style>
form input
{
    color:brown;
    margin:10px;
    padding:20px;
}
form
{
border:solid;
width:300px;
background:green:
}
body
{
    background-color:pink;
}
        </style>
</head>
<body>
    <h2>Donate Now</h2>

    <a href="logout.php">log out</a>
    <form action="#" method="post">
        
        Amount: <input type="number" step="0.01" name="amount"placeholder="write amount here"required><br>
        Payment Method: 
        <select name="payment_method"required>
            <option value="CRDB">CRDB</option>
            <option value="M-Pesa">M-Pesa</option>
            <option value="Tigo Pesa">Tigo Pesa</option>
            <option value="Airtel Money">Airtel Money</option>
            <option value="Airtel Money">TTCL</option>
            <option value="Airtel Money">NBC</option>
            <option value="Airtel Money">NMB</option>
        </select><br>
        <input type="submit" value="Donate" name="amounti">
        <input type="submit" value="reset">
    </form>
</body>
</html>
<?php
$conn = mysqli_connect("localhost","root","","donor");
session_start();
if(!isset($_SESSION['id'] )|| !isset($_SESSION['username'])){
    header('location:ingia.php');
}

if (isset($_POST['amounti']))
{

$amountI = $_POST['amount'];
$payment = $_POST['payment_method'];

$ins = "INSERT INTO secondtable(amount,payment_method) VALUES ( '$amountI', '$payment')";
$runn=mysqli_query($conn,$ins);
if ($runn)
{
    echo "Donation processed successfully";
    header('location: thanks.php');
} 

else {
    echo"repeat again later";
}
}
mysqli_close($conn);
?>
