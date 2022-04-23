<?php
require "../classes/structure.class.php";
require "../classes/student.class.php";
require "../header.php";
$con = Structure::header("Login");

if(isset($_SESSION['otp']) && $_GET['email'] && isset($_POST['submit_otp']))
{
    $_POST['otp']=(int)$_POST['otp'];
    // var_dump($_SESSION['otp']);
    // var_dump($_POST['otp']);
    if($_SESSION['otp']===$_POST['otp']){
        if(strcmp($_POST['pass'],$_POST['repass']) === 0){
            $student=new Student();
            print_r(strcmp($_POST['pass'],$_POST['repass']));
            
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
        }
        else{
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
<section class="bg-light vh-100 d-flex">
  <div class="col-3 m-auto">
    <div class="card">
      <div class="card-body">
        <div class="border rounded-circle mx-auto d-flex" style="width:100px;height:100px;">
          <i class="fa fa-user-secret fa-3x m-auto"></i>
        </div>
        <h3 style="text-align: center"><a href="../index.php"><i class="fa-solid fa-infinity"></i>&nbsp;Infinity</a></h3>    
        <h6 style="text-align: center">Reset Your Password</h6>    
        <form action="#" method="POST">
            <div class="form-group">
                <!-- Email input -->
                <div class="form-outline input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                    <input type="email" id="email" name="email" class="form-control" value="<?= $_GET['email'] ?>" readonly="readonly"/>
                    <label class="form-label" for="form2Example1">Email address</label>
                </div>
                <!-- Otp input -->
                <div class="form-outline input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fa-solid fa-list-ol"></i>
                    </span>
                    <input type="number" name="otp" class="form-control"/>
                    <label class="form-label" for="form2Example1">Enter Otp</label>
                </div>
                <!-- New Password input -->
                <div class="form-outline input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">
                    <i class="fa fa-key" aria-hidden="true"></i>
                    </span>
                    <input type="password" id="password" name="pass" class="form-control" />
                    <label class="form-label" for="form2Example2">New Password</label>
                </div>
                <!-- Conform Password input -->
                <div class="form-outline input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">
                    <i class="fa fa-key" aria-hidden="true"></i>
                    </span>
                    <input type="password" id="password" name="repass" class="form-control" />
                    <label class="form-label" for="form2Example2">Conform Password</label>
                </div>
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4" name="submit_otp">Reset password</button>
        </form>
        </div>
    </div>
  </div>
</section>
<?php require "../footer.php" ?>