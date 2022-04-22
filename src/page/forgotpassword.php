<?php
require "../classes/structure.class.php";
$con = Structure::header("Login");
// print_r($_POST);
if(isset($_POST['submit']))
{
    if(isset($_POST['email']) && !empty($_POST['email'])){
      $email = $_POST['email'];
      $q="SELECT * FROM `user` WHERE email='$email'";
      $insert=mysqli_query($con,$q);
      $temp=mysqli_fetch_array($insert);
      // print_r($temp);
      
      if(!isset($temp['email']))
      {
          echo "<script>
            alert('please enter a valid email');
          </script>";
      }else{
        $_SESSION['otp'] = rand(1000,9999);
        $subject="to change your pass in ims";
        $body="your otp to change the password id ".$_SESSION['otp']." enter this to change the password";
        sendmail($body,$subject,$email);
        header("Location:verify_otp.php?email=".$email);
      }
    }else{
      echo '<script>
        alert("please enter a email");
        </script>';
    }

}
?>
<form action="" method="POST">
    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" name="email"class="form-control" id="email">
    </div>
    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
    <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </form>

