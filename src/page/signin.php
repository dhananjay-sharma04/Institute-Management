<?php
require "../classes/admin.class.php";
require "../classes/structure.class.php";

$con = Structure::header("Login");
if (isset($_SESSION['role'])) {

  if ($_SESSION['role'] == 'teacher') {
    header('Location: /ims/src/teacher/index.php');
  } elseif ($_SESSION['role'] == 'admin') {
    header('Location: /ims/src/admin/index.php');
  } elseif ($_SESSION['role'] == 'student') {
    header('Location: /ims/src/student/index.php');
  }
}
if (isset($_SESSION['uid'])) {
  if ($_SESSION['role'] == 'teacher')
    header('Location: ../teacher/index.php');
}
$users = ['admin', 'student', 'teacher'];
$eror = '';
if (isset($_POST['login'])) {
  if (in_array($_POST['user_type'], $users)) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `user` WHERE email like '$email' && password like '$password' && role like'{$_POST['user_type']}'";
    if (false !== $result = mysqli_query($con, $sql)) {
      $data = mysqli_fetch_assoc($result);
      if ($data !== null) {
        $_SESSION['uid'] = $data['uid'];
        $_SESSION['role'] = $_POST['user_type'];
        $_SESSION['name'] = $data['name'];
        // echo $_SESSION['role'];die;
        if ($_SESSION['role'] == 'teacher') {
          header('Location: ../teacher/index.php');
        } elseif ($_SESSION['role'] == 'admin') {
          header('Location: ../admin/index.php');
        } else {
          header('Location: ../student/index.php');
        }
      } else {
        $eror = 'Invalid credential';
      }
    } else {
      $eror = 'Invalid credential';
    }
  }
}
?>
<?php include('../header.php'); ?>
<section class="bg-light vh-100 d-flex">
  <div class="col-3 m-auto">
    <div class="card">
      <div class="card-body">
        <div class="border rounded-circle mx-auto d-flex" style="width:100px;height:100px;">
          <i class="fa fa-user-secret fa-3x m-auto"></i>
        </div>
        <h3 style="text-align: center"><a href="../index.php"><i class="fa-solid fa-infinity"></i>&nbsp;Infinity</a></h3>
        <form action="" method="post">
          <div class="form-group input-group">
            <span class="input-group-text mb-3" id="basic-addon1">
              <i class="fa fa-user-secret" aria-hidden="true"></i>
            </span>
            <select class="form-select mb-3" name="user_type" id="user_type">
              <?php
              foreach ($users as $i => $u) {
                if (isset($_GET['show']) && $u == $_GET['show']) {
                  echo "<option value=\"$u\" selected>$u</option></a>";
                } else {
                  echo "<option value=\"$u\">$u</option></a>";
                }
              }
              ?>
            </select>
          </div>
          <!-- Email input -->
          <div class="form-outline input-group mb-3">
            <span class="input-group-text" id="basic-addon1">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
            <input type="email" id="form2Example1" name="email" class="form-control" />
            <label class="form-label" for="form2Example1">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline input-group mb-3">
            <span class="input-group-text" id="basic-addon1">
              <i class="fa fa-key" aria-hidden="true"></i>
            </span>
            <input type="password" id="form2Example2" name="password" class="form-control" />
            <label class="form-label" for="form2Example2">Password</label>
          </div>

          <!-- 2 column grid layout for inline styling -->
          <div class="row mb-4">
            <div class="col d-flex justify-content-center">
              <!-- Checkbox -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="form2Example34" />
                <label class="form-check-label" for="form2Example34">Remember Me</label>
              </div>
            </div>
            <div class="col">
              <!-- Simple link -->
              <a href="#!">Forgot password?</a>
            </div>
          </div>
          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-block mb-4" name="login">Login</button>

          <!-- Register buttons -->
          <div class="text-center">
            <p>Not a member? <a href="#!">Register</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<?php include('../footer.php'); ?>