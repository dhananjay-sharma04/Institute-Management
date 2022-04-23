<?php
// Import main class
require "../classes/admin.class.php";
require "../classes/structure.class.php";

// Start session
Session::init();

// Check if logged in otherwise redirect to login page
// Structure::checkLogin();

// Load Header
Structure::header("Update Student - Admin");
require "../admin/navbar.php";

// Main Content Goes Here
// Check if form submitted
if (Structure::if_all_inputs_exists(array("student_id","student_name","student_phone_number","email","password"), "POST") == true) {
    $admin = new Admin();
    if ($admin->update_student(
        filter_input(INPUT_POST, "student_id", FILTER_DEFAULT),
        filter_input(INPUT_POST, "student_name", FILTER_DEFAULT),
        filter_input(INPUT_POST, "student_phone_number", FILTER_DEFAULT),
        filter_input(INPUT_POST, "email", FILTER_DEFAULT),
        filter_input(INPUT_POST, "password", FILTER_DEFAULT), 'student'
    ) === true) {
        // On success
        // Structure::successBox("Update Student", "Successfully updated student!", Structure::nakedURL("view_students.php"));
        ?>
        <script>
          alert('updation failed');
          location.href='admin/index.php';
        </script>
        <?php
    } else {
      // On failure
      // Structure::errorBox("Update Student", "Unable to update student!");
      echo"<script>
        alert('Successfully updated student!');
        location.href='admin/index.php';
      </script>";
    }
    //$admin->close_DB();
} elseif (isset($_GET['student_id'])) {
  $admin    = new Admin();
  $student = $admin->view_student(filter_input(INPUT_GET, "student_id", FILTER_DEFAULT), true);
  // echo'dss';die;
  
  if (!isset($student["uid"])) {
    Structure::errorBox("Update Student", "Select a valid student!");
  } else {
        // Form to fill details
        echo('<div class="title">
                <i class="uil uil-book-reader"></i>
                <span class="text">Update Students</span>
              </div>');
        echo('<main role="main" class="form-body">');
        Structure::topHeading("");
        echo('<div class="container">
                <div class="header">
                  <h3>Update Info</h3>
                </div>
                <form method="POST" class="myform" id="myform">
                  <input type="hidden" name="student_id" value="'._esc($student['uid']).'">
                  <div class="field">
                    <input type="text" name="student_name" id="name" value="'._esc($student["name"]).'">
                    <label>Name</label>
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                    <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                    <small>Error msg</small>
                  </div>
                  <div class="field">
                    <input type="number" name="student_phone_number" id="phone" value="'._esc($student["phone_number"]).'">
                    <label>Phone Number</label>
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                    <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                    <small>Error msg</small>
                  </div>
                  <div class="field">
                    <input type="email" name="email" id="email" value="'._esc($student["email"]).'">
                    <label>Email address</label>
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                    <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                    <small>Error msg</small>
                  </div>
                  <div class="field">
                    <input type="password" name="password" id="password" value="'._esc($student["password"]).'">
                    <label>Password</label>
                  </div>
                  <div class="buttons">
                    <input type="submit" class="btn" value="Update">
                  </div>
                </form>
              </div>
            <script src="theme/javascript/form.js"></script>
      </main>');
    }

    $admin->close_DB();
} else {
    Structure::errorBox("Update Student", "No student selected!");
    // echo'hello';
}
// Display Footer
Structure::footer();

// delete object
unset($admin);
unset($struct);
