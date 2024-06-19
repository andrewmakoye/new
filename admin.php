<?php 
	session_start();
	$conn = mysqli_connect("localhost","root","","donor");
	// Prevent user to access this page if they have no session 
    if(!isset($_SESSION['id']) || !isset($_SESSION['role']) || !isset($_SESSION['username'])){
        header('Location: ingia.php');
	}

	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Page</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f4f4f9;
			color: #333;
			margin: 0;
			padding: 20px;
		}

		h2 {
			color: #007bff;
		}

		.container {
			max-width: 900px;
			margin: 0 auto;
			padding: 20px;
			background-color: #fff;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		.welcome-message {
			margin-bottom: 20px;
		}

		a.logout {
			text-decoration: none;
			color: #ff0000;
			font-weight: bold;
			float: right;
		}

		table {
			width: 100%;
			border-collapse: collapse;
			margin-top: 20px;
		}

		table, th, td {
			border: 1px solid #ddd;
		}

		th, td {
			padding: 10px;
			text-align: left;
		}

		th {
			background-color: #f2f2f2;
		}

		a.action-link {
			text-decoration: none;
			font-weight: bold;
		}

		a.edit-link {
			color: blue;
		}

		a.delete-link {
			color: red;
		}
	</style>
</head>
<body>
	<div class="container">
		<h2>Admin Page</h2>

		<a href="message.php" class="send message ">send message here</a>
		<a href="logout.php" class="logout">Logout</a>

		<table>
			<tr>
				<th>S/N</th>
				<th>User name</th>
				<th>Email</th>
				<th>Age</th>
				<th>Amount</th>
				<th>Payment</th>
			
				<th colspan="2">Action</th>
			
			</tr>

			<?php 
			$serial_no = 1;
			$sql = "SELECT * FROM donation, secondtable";
			$run_retrieve = mysqli_query($conn, $sql);

			if(mysqli_num_rows($run_retrieve) > 0){
				while($row = mysqli_fetch_assoc($run_retrieve)){ ?>
					<tr>
						<td><?php echo $serial_no++ ?></td>
						
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['username']; ?></td>
						<td><?php echo $row['age']; ?></td>
						<td><?php echo $row['amount']; ?></td>
						<td><?php echo $row['payment_method']; ?></td>
					
						<td><a class="action-link edit-link" href="edited.php?id=<?php echo $row['id']; ?>">Edit</a></td>
						<td><a class="action-link delete-link" href="deleted.php?id=<?php echo $row['id']; ?>">Delete</a></td>
					</tr>
			<?php		
				}
			} else { ?>
				<tr>
					<td colspan="7">No users found</td>
				</tr>
			<?php } ?>
		</table>
	</div>
</body>
</html>
