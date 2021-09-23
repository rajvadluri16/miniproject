
<!DOCTYPE html>
<html>
<head>
	<title>Cancel your slot</title>
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
<label>Cancel</label>
<input type="text" name="search"><br></br>
<input type="submit" name="submit">
<br></br>
<br>
<a href="index.html">Back to Home</a>
</center>
</form>

</body>
</html>

<?php
$con = new PDO("mysql:host=localhost;dbname=registrations",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("DELETE FROM `bookings` WHERE email = '$str'");
  echo "Your slot is cancel";
	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

  }


?>
