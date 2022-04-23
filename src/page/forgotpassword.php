<?php
require "../classes/structure.class.php";
require "../header.php";
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
<section class="bg-light vh-100 d-flex">
  <div class="col-3 m-auto">
    <div class="card">
      <div class="card-body">
        <div class="border rounded-circle mx-auto d-flex" style="width:100px;height:100px;">
          <i class="fa fa-user-secret fa-3x m-auto"></i>
        </div>
        <h3 style="text-align: center"><a href="../index.php"><i class="fa-solid fa-infinity"></i>&nbsp;Infinity</a></h3>
        <h6 style="text-align: center">Enter your email to reset your password</h6>
        <form action="" method="POST">
          <div class="form-group">
            <!-- Email input -->
            <div class="form-outline input-group mb-3">
              <span class="input-group-text" id="basic-addon1">
                <i class="fa fa-envelope" aria-hidden="true"></i>
              </span>
              <input type="email" id="email" name="email" class="form-control" />
              <label class="form-label" for="form2Example1">Email address</label>
            </div>
          </div>
          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-block mb-4" name="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</section>
<?php require "../footer.php"?>
