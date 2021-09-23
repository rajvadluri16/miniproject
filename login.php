<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon">
    <title>Login page</title>
  </head>
  <body>
    <form class="" action="" method="post">
    <center>
    <fieldset>
      <legend><h1><center> LOGIN HERE</center></h1></legend>
      <div class="">
        <h3><b><label for="email">USERNAME:</label></b></h3>
        <input type="email" name="email" id="email" value="">
      </div>
      <div class="">
        <h3><b><label for="pasw">PASSWORD:</label></b></h3>
        <input type="password" id="pasw" name="pass" value="">
      </div>
      <div class="">
        <br>
        <input style="color:blue" type="submit" name="submit" value="LOGIN">
        <br>
        <p>Create an account <a href="registration.php">Signup</a></p>

      </div>
    </fieldset>
    </center>
    </form>
    <?php
      if(isset($_POST["submit"])){
        if(!empty($_POST['email']) && !empty($_POST['pass'])){
          $user=$_POST['email'];
          $pass=$_POST['pass'];
          $con=new mysqli("localhost","root","","registrations");
          if($con->connect_error){
            die("Failed to connect..");
          }
          else {
            $statement=$con->prepare("select * from register where email = ?");
            $statement->bind_param("s",$user);
            $statement->execute();
            $statement_result=$statement->get_result();
            if($statement_result->num_rows > 0){
              $data=$statement_result->fetch_assoc();
              if($data['pass']===$pass){
                echo "login succes";
                header('Location: /Miniproject/index.html');
                exit();
              }
              else {
                echo "invalid password or email ";
              }
            }
            else {
              echo "<h2> invalid email</h2>";
            }
          }
          }
          else{
            echo "All fields are required";
          }
        }
    ?>
  </body>
</html>
