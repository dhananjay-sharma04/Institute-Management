<?php
require "../classes/structure.class.php";
require "../classes/student.class.php";
$con = Structure::header("Login");
session_start();
if(!isset($_SESSION['otp']))
{
    $_SESSION['otp']= rand(100000, 999999);
}
$email=$_SESSION['email'];
$q="SELECT * FROM `user` WHERE email='$email'";
$insert =mysqli_query($con,$q);
$temp=mysqli_fetch_array($insert);
// print_r($temp);

if(!isset($temp['email']) && !isset($_POST['submit_otp']))
{
    // session_destroy();
    ?><script>
    alert('please enter a valid email');
    // location.href='../page/forgotpassword.php';
    </script>
    
    <?php
    
}
if(isset($_POST['submit_otp']))
{
    // var_dump($_POST['otp']);
    // var_dump($_SESSION['otp']);
    if($_SESSION['otp']==is_numeric($_POST['otp'])){
        $_SESSION['verified']='verified';
        ?><script>
        alert('otp verified');
        location.href='../page/updatepass.php';
        </script>
        <?php
    }
    else{
        unset($_POST);
        unset($_SESSION);
        ?><script>
        alert('please enter correct otp');
        // location.href='../page/forgotpassword.php';
        </script>
        <?php
        // print_r($_POST);

    }
}
elseif(!isset($_POST['submit_otp'])){
    $subject="to change your pass in ims";
    $body="your otp to change the password id ".$_SESSION['otp']." enter this to change the password";
    sendmail($body,$subject,$email);
    echo('<form action="#" method="POST">
<div class="form-group">
  <label for="email">Email address:</label>
  <input type="email" name="email"class="form-control" id="email" value="'.$email.'" readonly="readonly">
  <br>
  <label for="otp">Enter otp:</label>
  <input type="number"class="form-control" name="otp" id="otp" placeholder="otp sned to your mail">
</div>
<button type="submit" name="submit_otp" class="btn btn-default">Submit</button>
</form>');
// print_r($_SESSION['otp']);

    
}


?>