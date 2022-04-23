<?php
// Import main class
require "../classes/admin.class.php";
require "../classes/structure.class.php";

// Start session
Session::init();

if (Structure::if_all_inputs_exists(array("student_name", "student_phone_number","class" ,"email", "password"), "POST") == true) {
  // print_r($_POST);
    $admin = new Admin();
    if ($admin->create_student(
        filter_input(INPUT_POST, "student_name", FILTER_DEFAULT),
        filter_input(INPUT_POST, "student_phone_number", FILTER_DEFAULT),
        filter_input(INPUT_POST, "email", FILTER_DEFAULT),
        filter_input(INPUT_POST, "password", FILTER_DEFAULT),
        'student'
        ,filter_input(INPUT_POST, "class", FILTER_DEFAULT),
    ) === true) {
      echo"<script>
            alert('Successfully added student!');
            location.href='index.php';
          </script>";
    } else {
        echo"<script>
            alert('insertion failed');
            location.href='index.php';
          </script>";
    }
    $admin->close_DB();
} else {

  // Form to fill details
    echo('
    <main role="main" class="form-body">');
    Structure::topHeading("");
    echo('<div class="container">
            <div class="header">
             <h3>New Students</h3>
            </div>
          <form method="POST" action="admin/add_student.php" class="myform" id="myform">
            <div class="field">
              <input type="text" name="student_name" id="name" aria-describedby="student_name" required>
              <label>Name</label>
              <i class="fa fa-check-circle" aria-hidden="true"></i>
              <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
              <small>Error msg</small>
            </div>
            <div class="choose"> 
              <select name="class" id="std" required>
                <option value="none"disabled selected>Choose a Class</option>
                <option value="10">10</option>
                <option value="9">9</option>
                <option value="8">8</option>
              </select> 
            </div>
            <div class="field">
              <input type="number" name="student_phone_number" id="phone" aria-describedby="student_phone_number" required>
              <label for="student_phone_number">Phone Number</label>
              <i class="fa fa-check-circle" aria-hidden="true"></i>
              <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
              <small>Error msg</small>
            </div>
            <div class="field">
              <input type="email" name="email" class="form-control" id="email" aria-describedby="email" required>
              <label for="email">Email address</label>
              <i class="fa fa-check-circle" aria-hidden="true"></i>
              <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
              <small>Error msg</small>
            </div>
            <div class="field">
              <input type="password" name="password" id="password" class="form-control" id="password" required>
              <label for="password">Password</label>
              <i class="fa fa-check-circle" aria-hidden="true"></i>
              <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
              <small>Error msg</small>
            </div>
            <div class="buttons">
              <input type="submit" class="btn" value="Add">
              <input type="reset" class="btn two" value="Clear">
            </div
          </form>
        </div>
        <script src="theme/javascript/form.js"></script>
      </main>');
}
// Display Footer
Structure::footer();

// delete object
unset($admin);
?>
