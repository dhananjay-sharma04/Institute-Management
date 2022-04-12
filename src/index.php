<?php include('header.php'); 
require "classes/admin.class.php";
require "classes/structure.class.php";
$con = Structure::header("Login");
if($_SESSION['role']=='teacher')
{
    header('Location: /ims/src/teacher/index.php');
}
elseif($_SESSION['role']=='admin')
{
    header('Location: /ims/src/admin/index.php');
}
elseif($_SESSION['role']=='student')
{
    header('Location: /ims/src/student/index.php');
}
// echo '<pre>';
// die;
// print_r($_SESSION['uid']);

// die;
// Import main class
$users = ['admin', 'student','teacher'];
$eror='';
if(isset($_POST['login']))
{
  if(in_array($_POST['user_type'],$users))
  {
    $email=$_POST['email'];
    $password= $_POST['password'];
    $sql= "SELECT * FROM `user` WHERE email like '$email' && password like '$password' && role like'{$_POST['user_type']}'";
    if(false!== $result = mysqli_query($con, $sql)){
      $data = mysqli_fetch_assoc($result);
      if($data !== null){
        $_SESSION['uid'] = $data['uid'];
        $_SESSION['role'] = $_POST['user_type'];
        $_SESSION['name'] = $data['name'];
        header('Location: /ims/src/index.php');
      }
      else{
        $eror = 'Invalid credential';
      }
    }
    else{
      $eror = 'Invalid credential';
    }
  }
}
?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img
          src="./assets/Image/InfinityEducation.jpg"
          height="25"
          alt="InfinityEducation"
          loading="lazy"
        />Infinity Education
      </a>
      <!-- Left links
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item ">
          <a class="nav-link" href="#">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Team</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Projects</a>
        </li>
      </ul>
      Left links -->
    </div>
    <!-- Collapsible wrapper -->
    <!-- Right elements -->
      <!-- Avatar -->
        <div class="dropdown">
        <a
          class="dropdown-toggle d-flex align-items-center hidden-arrow"
          href="#"
          id="navbarDropdownMenuAvatar"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
        <a href="page/signin.php" class="nav-link">
          <i class="fa fa-user-plus" aria-hidden="true"></i>Login
        </a>
      </div>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>

<!-- content -->
<div class="d-flex shadow" style="height:500px;background:linear-gradient(-45deg, #67dcda 50%, transparent 50%)">
    <div class="container-fluid my-auto">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="display-4 font-weight-bold">About Infinity Education</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum beatae cumque provident sit voluptate voluptas harum quos aliquam impedit officiis molestias unde ipsam magnam distinctio nemo nulla sed, eius accusantium.</p>
                <a href="#" class="btn btn-lg btn-primary">Contact Us</a>
            </div>
              <div class="col-lg-6">
                <div class="w-50 mx-auto card shadow-lg">
                    <div class="card-body">
                    <div class="border rounded-circle mx-auto d-flex" style="width:100px;height:100px;"><i class="fa fa-user fa-3x m-auto"></i></div>
                        <h3 style="text-align: center">Login</h3>
                        <form action="" method="post">
                        <div class="form-group">
                              <select class="form-control" name="user_type" id="user_type" style="height: calc(2.5rem + 2px);">
                              <?php
                                foreach($users as $i => $u){
                                  if(isset($_GET['show']) && $u == $_GET['show']){
                                    echo "<option value=\"$u\" selected>$u</option></a>";
                                  }else{
                                    echo "<option value=\"$u\">$u</option></a>";
                                  }
                                }
                                  ?>
                              </select>
                            </div>
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="form2Example1" name="email" class="form-control" />
                                <label class="form-label" for="form2Example1">Email address</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" id="form2Example2" name="password" class="form-control" />
                                <label class="form-label" for="form2Example2">Password</label>
                            </div>

                            <!-- 2 column grid layout for inline styling -->
                            <div class="row mb-4">
                                <div class="col d-flex justify-content-center">
                                <!-- Checkbox -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="form2Example34"/>
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
                        </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Our Founders -->
<section class="py-5">
  <div style="text-align: center">
    <h2>Our Founder</h2>
    <img src="./assets/Image/Dhananjay.JPG" width="25%" alt="This is Dhanajay Sharma">
    <h3>Dhanajay Sharma</h3>
    <a href="https://www.facebook.com/profile.php?id=100034704289792" target="_blank">Facebook</a>&nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="https://www.instagram.com/_dhananjay__sharma_4/" target="_blank">Instagram</a>&nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="https://twitter.com/Dhananj73783448" target="_blank">Twitter</a>
    <h4>Young MATHS & Physics Teacher and #Offline Educator | Founder of Infinity Education.</h4>
    <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima fugiat explicabo facere dolor at ex reiciendis possimus quia nihil cumque odio, laboriosam quaerat sit ab assumenda voluptatibus. Nihil recusandae sit tenetur commodi, totam quo quod voluptates aspernatur blanditiis minima ex facere dignissimos, corrupti ut veritatis tempore obcaecati nemo repudiandae alias illo fugit, vel est! Iste enim sed deserunt laborum similique in incidunt, ad numquam? Omnis laboriosam sapiente repellendus rerum incidunt, ex quas alias explicabo placeat nisi doloremque, quibusdam asperiores nulla? Sequi sed enim cupiditate praesentium asperiores commodi officiis voluptatibus quasi reprehenderit, ullam consequatur. Sapiente eos vero nostrum repudiandae quam quo!</h5>
  </div>
</section>

<!-- Footer -->
<footer>
  <a href="#">Home</a>
  <a href="#">FAQ</a>
  <a href="#">Privacy Policy</a>
  <a href="#">&copy; 2022 | Infinity Education</a>
</footer>

<?php include('footer.php'); ?>