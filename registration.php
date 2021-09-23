<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration page</title>
    <link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon">
  </head>
  <body>


    <center>
    <h1>Signup</h1>
    <p>Fill this to Create your account here</p>
    </center>
    <form class="registration" action="" method="post">
    <center>
    <table>
      <tr>
        <td>Name:</td>
        <td><input type="text" name="name" value=""></td>
      </tr>
      <tr>
        <td>Surname:</td>
        <td><input type="text" name="sname" value=""></td>
      </tr>
      <tr>
        <td>Email:</td>
        <td><input type="email" name="email" value="" required></td>
      </tr>
      <tr>
        <td>Raithu bandhu id:</td>
        <td><input type="text" name="rid" value=""></td>
      </tr>
      <tr>
        <td>Password:</td>
        <td><input type="password" name="pass" value=""></td>
      </tr>
      <tr>
        <td>Confirm Password:</td>
        <td><input type="text" name="cpass" value=""></td>
      </tr>
      <tr>
        <td>Mobile number</td>
        <td><input type="number" name="num" value=""></td>
      </tr>
      <tr>
        <td>Address:</td>
        <td><textarea name="add" rows="5" cols="18"></textarea></td>
      </tr>
      <tr>
        <td><input type="submit" name="submit" value="SUBMIT"></td>
        <td><input type="reset" name="reset" value="RESET"></td>
      </tr>
    </table>
    </center>
  </form>
  <?php
  if(isset($_POST["submit"])){
    $name=$_POST['name'];
    $sname=$_POST['sname'];
    $email=$_POST['email'];
    $rid=$_POST['rid'];
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];
    $num=$_POST['num'];
    $addr=$_POST['add'];
    $conn = new mysqli('localhost','root','','registrations');
    if($conn->connect_error){
      die('Connection Failed :'.$conn->connect_error);
    }
    else {
      $statement=$conn->prepare("insert into register(name,sname,email,rid,pass,cpass,num,addr)
      values(?, ?, ?, ?, ?, ?, ?, ?)");
      $statement->bind_param("ssssssis", $name, $sname, $email, $rid, $pass, $cpass, $num, $addr);
      $statement->execute();
      echo "Registration Successfully....";
      header("Location:login.php");
      exit();
      $statement->close();
      $conn->close();
    }
  }
   ?>
  </body>
</html>
