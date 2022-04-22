<?php
require "../classes/structure.class.php";
require "../classes/student.class.php";
$con = Structure::header("Login");

if(isset($_SESSION['otp']) && $_GET['email'] && isset($_POST['submit_otp']))
{
    if($_SESSION['otp']==is_numeric($_POST['otp'])){
        if(strcmp($_POST['pass'],$_POST['repass']) === 0){
            $student=new Student();
            
            if($student->change_pass($_GET['email'], $_POST['repass']))
            {
                ?><script>
                    alert('your password has been updated');
                    location.href='../page/signin.php';
                    </script>
                
                <?php
            }else{
                echo "<script>alert('Internal error occured')</script>";        
            }
            unset($_SESSION);
        }else{
            echo "<script>alert('Password does not match!')</script>";    
        }
    }
    else{
        echo "<script>alert('please enter correct otp')</script>";
    }
}elseif(!isset($_GET['email'])){
    header("Location:signin.php");
}

?>    
<form action="#" method="POST">
<div class="form-group">
  <label for="email">Email address:</label>
  <input type="email" name="email"class="form-control" id="email" value="<?= $_GET['email'] ?>" readonly="readonly">
  <br>
  <label for="otp">Enter otp:</label>
  <input type="number"class="form-control" name="otp" id="otp" placeholder="otp sned to your mail">
  <br>
  <label for=""> enter new pasword</label>
    <input type="password" name="pass">
    <br>
    <label for=""> re-enter the password</label>
    <input type="password" name="repass">
    <br>
</div>
<button type="submit" name="submit_otp" class="btn btn-default">Submit</button>
</form>
