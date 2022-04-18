<?php
include('header.php');
require "classes/admin.class.php";
require "classes/structure.class.php";
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
if(isset($_POST['submit']))
{
    $name= addslashes($_POST['name']); 
    $gender=$_POST['options'];
    $schoo_name=addslashes($_POST['schl_name']); 
    $class=$_POST['class']; 
    $p_num=$_POST['ph_no']; 
    $email=$_POST['email']; 
    $dob=$_POST['dob']; 
    $date = date('Y-m-d',time());
    // print_r($con);
    $q="INSERT INTO inquiry_table (`name`, `school_name`, `class`, `p_number`, `email`, `dob`, `inq_date`,gender) VALUES ('$name', '$schoo_name', $class, $p_num, '$email', $dob, $date,'$gender')";
    $insert = mysqli_query($con,$q);
    if(false != $insert){
      echo 'yess';
    }else{
      print_r($con);
    }
}
?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <i class="fa-solid fa-infinity"></i>&nbsp;Infinity
      </a>
    </div>
    <!-- Collapsible wrapper -->
    <!-- Right elements -->
    <a href="page/signin.php" class="nav-link">
      <i class="fa fa-user-secret" aria-hidden="true"></i>Login
    </a>
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
        <h1 class="display-4 font-weight-bold">About Infinity</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum beatae cumque provident sit voluptate voluptas harum quos aliquam impedit officiis molestias unde ipsam magnam distinctio nemo nulla sed, eius accusantium.</p>
        <a href="#" class="btn btn-lg btn-primary">Contact Us</a>
      </div>
      <div class="col-lg-6">
        <div class="w-50 mx-auto card shadow-lg">
          <div class="card-body">
            <div class="border rounded-circle mx-auto d-flex" style="width:50px;height: 50px;">
              <i class="fa fa-user-secret fa-2x m-auto"></i>
            </div>
            <h3 style="text-align: center">Admission Inquiry</h3>
            <form action="index.php" method="post">
              <!-- Name input -->
              <div class="form-outline input-group mb-3">
                <span class="input-group-text" id="basic-addon1">
                  <i class="fa fa-user" aria-hidden="true"></i>
                </span>
                <input type="text" name="name" id="form12" class="form-control" required/>
                <label class="form-label" for="form12">Your Name</label>
              </div>
              <!-- Date of Birth selector -->
              <div class="form-outline input-group mb-3">
                <span class="input-group-text" id="basic-addon1">
                  <i class="fa fa-calendar" aria-hidden="true"></i>
                </span>
                <input type="date" name="dob" id="form12" class="form-control" max="<?php echo date("Y-m-d"); ?>" required/>
                <label class="form-label" for="form12">Date of Birth</label>
              </div>
              <!-- Gender selector -->
              <div class="btn-group input-group mb-3">
                <span class="input-group-text" id="basic-addon1">
                  <i class="fa fa-users" aria-hidden="true"></i>&nbsp;Gender
                </span>
                <input type="radio" class="btn-check" value="male" name="options" id="option1" autocomplete="off" required/>
                <label class="btn btn-info" for="option1">Male</label>
                <input type="radio" class="btn-check" value="female" name="options" id="option2" autocomplete="off" required/>
                <label class="btn btn-info" for="option2">Female</label>
              </div>
              <!-- Standard selector -->
              <div class="form-group input-group">
                <span class="input-group-text mb-3" id="basic-addon1">
                  <i class="fa fa-desktop" aria-hidden="true"></i>
                </span>
                <select class="form-select mb-3" name="class" id="std"required>                 
                  <option value="" disabled selected>choose your class </option>
                  <option value="10">10</option>
                  <option value="9">9</option>
                  <option value="8">8</option>
                </select>
              </div>
              <!-- School Name input -->
              <div class="form-outline input-group mb-3">
                <span class="input-group-text" id="basic-addon1">
                  <i class="fa fa-building" aria-hidden="true"></i>
                </span>
                <input type="text" id="form12" name="schl_name" class="form-control" required/>
                 <label class="form-label" for="form12">School Name</label>
              </div>
              <!-- Phone Number input -->
              <div class="form-outline input-group mb-3">
                <span class="input-group-text" id="basic-addon1">
                  <i class="fa fa-address-book" aria-hidden="true"></i>
                </span>
                <input type="number" name="ph_no" id="form12" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" required/>
                <label class="form-label" for="form12">Phone number</label>
              </div>
              <!-- Email input -->
              <div class="form-outline input-group mb-3">
                <span class="input-group-text" id="basic-addon1">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
                <input type="email" id="form2Example1" name="email" class="form-control" required />
                <label class="form-label" for="form2Example1">Email address</label>
              </div>
              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block mb-4" name="submit">Submit Inquiry</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Footer -->
<footer>
  <a href="#">&copy; 2022 | Infinity</a>
</footer>

<?php include('footer.php'); ?>