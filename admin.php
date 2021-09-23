<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin page</title>
  </head>
  <body>
    <form class="" action="" method="post">
    <center>
    <fieldset>
      <legend><h1><center> LOGIN HERE</center></h1></legend>
      <div class="">
        <h3><b><label for="email">USERNAME:</label></b></h3>
        <input type="text" name="email" id="email" value="">
      </div>
      <div class="">
        <h3><b><label for="pasw">PASSWORD:</label></b></h3>
        <input type="text" id="pasw" name="pass" value="">
      </div>
      <div class="">
        <br>
        <input style="color:blue" type="submit" name="submit" value="LOGIN">
        <br>

      </div>
    </fieldset>
    </center>
    </form>
    <?php
      if(isset($_POST["submit"])){
        if(!empty($_POST['email']) && !empty($_POST['pass'])){
          $user=$_POST['email'];
          $pass=$_POST['pass'];
          if($user=='admin' && $pass=='admin'){
            header("Location: nextpages.html");
            exit();
          }
          else{
            echo "Invalid credentials";
          }
          }
        }
    ?>
  </body>
</html>
