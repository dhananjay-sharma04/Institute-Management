<?php
// print_r($_POST);
if(isset($_POST['submit']))
{
    if(isset($_POST['email']) && !empty($_POST['email']))
    {
        session_start();
        $_SESSION['email']=$_POST['email'];
        header('Location: verify_otp.php');

    }
    else{?><script>
        alert('please enter a email');
        location.href='../page/forgotpassword.php';
        </script>
        <?php
    }

}
else
{
    echo('<form action="" method="POST">
    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" name="email"class="form-control" id="email">
    </div>
    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
    <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </form>');
}


?>