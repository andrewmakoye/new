
<!DOCTYPE html>
<html>
<head>
    <title>Donor Registration</title>
    <style>
form input
{
    color:blue;
    margin:10px;
    padding:20px;
}
form input[type="Password"]{
    margin-left:80px;
}
form input[type="email"]{
    margin-left:80px;
}
form input[type="number"]{
    margin-left:40px;
}
body{
    background-color:lightblue;
}
form{
    border:solid;
    width:1500px;
}
form input[type="age"]{
    margin-left:80px;
}
body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color:pink;
        }
        .container {
            background-color: #fff;
            padding: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
        }
        h1 {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input, textarea {
            width: 40%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }

        </style>
</head>
<body>
  
  <fieldset>
        <legend style="text-align:center">group 47 project</legend>

    <h2>Register here </h2>
    <form action="#" method="POST">
    
    <div>  
    <label for="username">username</label>
     <input type="username" name="username"required>
</div>  
        <div>  
        <label for="email">email</label>
         <input type="email" name="email"required>
</div>
<div>  
        <label for="email">Phone number</label>
         <input type="number" name="number"required>
</div>
<div>        <label for="age">Age</label>
 <input type="age" name="age"required>
</div>
<div>    
<label for="Password">password </label>
<input type="password" name="password"required>
</div>  
<div>    
<label for="Password">role </label>
<select name="role"required>
            <option >admin</option>
            <option >donor</option>
            
        </select><br>
        
</div>  
    
<button name="save">submission</button>
</fieldset>

    </form>
    
</body>
</html>
<?php
session_start();
$conn = mysqli_connect("localhost","root","","donor");
if(isset($_POST['save']))
{
$un = $_POST['username'];
$em = $_POST['email'];
$ag = $_POST['age'];
$p = $_POST['password'];
$r=$_POST['role'];

$ins = "INSERT INTO donation(username,email,age,password,role)
VALUES ('$un','$em','$ag','$p','$r')";

$runn=mysqli_query($conn,$ins);

if ($runn)
 {
    echo "New donor registered successfully";
    header('location:ingia.php');
} 
else {
    echo "please repeat again later";
}
}


mysqli_close($conn);

?>