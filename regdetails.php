
<?php
/*
// Username is root
$user = 'root';
$password = '';

// Database name is gfg
$database = 'registration';

// Server is localhost with
// port number 3308
$servername='localhost:808';
$mysqli = new mysqli($servername, $user,
				$password, $database);

// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}
*/
// SQL query to select data from database
$conn = new mysqli('localhost','root','','registrations');
if($conn->connect_error){
  die('Connection Failed :'.$conn->connect_error);
}
else{
$sql = "SELECT * FROM register";
$result = $conn->query($sql);
$conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registration details</title>
	<meta charset="UTF-8">
	<title>Registration details</title>
  <link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon">
	<!-- CSS FOR STYLING THE PAGE -->
	<style>
		table {
			margin: 0 auto;
			font-size: large;
			border: 1px solid black;
		}

		h1 {
			text-align: center;
			color: #006600;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
		}
    a{
      color: #006600;
    }
    a:hover{
      color: grey;
    }

		td {
			background-color: #E4F5D4;
			border: 1px solid black;
		}

		th,
		td {
			font-weight: bold;
			border: 1px solid black;
			padding: 10px;
			text-align: center;
		}

		td {
			font-weight: lighter;
		}
	</style>
</head>

<body>
	<section>
		<h1>Agriculture Market Slotbooking Registration Details <a href="index.html">Home</a> <a href="nextpages.html">Back</a></h1>
		<!-- TABLE CONSTRUCTION-->
		<table>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Surname</th>
				<th>Email Id</th>
        <th>Raithu Bandhu id</th>
        <th>Password</th>
        <th>Confirm Password</th>
        <th>Phone Number</th>
        <th>Address of the register</th>
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS-->
			<?php // LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<!--FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN-->
				<td><?php echo $rows['id'];?></td>
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['sname'];?></td>
        <td><?php echo $rows['email'];?></td>
				<td><?php echo $rows['rid'];?></td>
        <td><?php echo $rows['pass'];?></td>
        <td><?php echo $rows['cpass'];?></td>
        <td><?php echo $rows['num'];?></td>
        <td><?php echo $rows['addr'];?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</section>
</body>

</html>
