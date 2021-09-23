<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="utf-8">
        <title>Filter Booklist</title>
    </head>
    <body>

        <form action="" method="post">
           <input type = "email" class="btn" name="email" value="">
           <input type = "submit" name="search" value="SEARCH BY ID">
        </form>
        <table>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email Id</th>
        <th>Date</th>
        <th>Time</th>
			</tr>

<?php
  if(isset($_POST["submit"])){
      $email=$_POST['email'];
      $con=new mysqli("localhost","root","","registrations");

   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }

   $sql = 'SELECT * FROM bookings where email=raj@gmail.com';
   mysql_select_db('test_db');
   $retval = mysql_query( $sql, $conn );

   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }

   while($row = mysql_fetch_array($retval)) {
      echo "ID :{$row['id']}  <br> ".
         "NAME : {$row['name']} <br> ".
         "Email : {$row['email']} <br> ".
         "--------------------------------<br>";
   }

   echo "Fetched data successfully\n";

   mysql_close($conn);

    }
?>
</body>
</html>
