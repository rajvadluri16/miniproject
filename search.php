
<!DOCTYPE html>
<html>
<head>

	<title>Search your slot</title>
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

<form method="post">
  <center>
    <br>
    <br>
    <br>
<label>Search</label>
<input type="text" name="search"><br></br>
<input type="submit" name="submit">
<br></br>
<br>
<a href="index.html">Back to Home</a>
<br>
<br>
<a href="delete.php">Cancel your slot</a>
</center>
</form>

</body>
</html>

<?php
$con = new PDO("mysql:host=localhost;dbname=registrations",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `bookings` WHERE email = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();
	if($row = $sth->fetch())
	{
		?>
		<br><br><br>
		<table>
			<tr>
				<th>Name</th>
				<th>Email</th>
        <th>Date</th>
        <th>Time</th>
			</tr>
			<tr>
				<td><?php echo $row->name;?></td>
        <td><?php echo $row->email;?></td>
        <td><?php echo $row->date;?></td>
        <td><?php echo $row->timeslot;?></td>
			</tr>

		</table>
		<br>
		<center>
		<button type="button" name="button" class="btn btn-primary" onclick="window.print();">print</button>
		</center>
<?php
	}
  else{
    ?>
    <br>
    <br>
    <center>
    <?php
    echo "Details not found";
    ?>
    </center>
    <br>
    <br>
    <center>
    <h2>TO BOOK YOUR SLOT <a href="index.php">Click Here</a> </h2>
		<br>
		<h2>TO Cancel YOUR SLOT <a href="delete.php">Click Here</a> </h2>
    </center>
    <?php
  }

}

?>
