<?php
// Import main class
require "../classes/admin.class.php";
require "../classes/structure.class.php";

// Start session
Session::init();

// Check if logged in otherwise redirect to login page
// Structure::checkLogin();

// Load Header
// Structure::header("Add Teacher - Admin");


// Main Content Goes Here
// Check if form submitted
if (Structure::if_all_inputs_exists(array("teacher_name", "teacher_phone_number", "email", "password"), "POST") == true) {
    $admin = new Admin();
    if (is_bool($admin->create_teacher(
        filter_input(INPUT_POST, "teacher_name", FILTER_DEFAULT),
        filter_input(INPUT_POST, "teacher_phone_number", FILTER_DEFAULT),
        filter_input(INPUT_POST, "email", FILTER_DEFAULT),
        filter_input(INPUT_POST, "password", FILTER_DEFAULT)
    )) === true) {
        // On success
        echo"<script>
        alert('Successfully added teacher!');
        location.href='index.php';
      </script>";   
      } else {
    // On failure 
        echo"<script>
        alert('insertion failed');
        location.href='index.php';
      </script>";
    }
    $admin->close_DB();
} else {

  // Form to fill details
    echo('<main role="main" class="form-body">');
    // Structure::topHeading("");
    echo('
          <div class="container">
          <div class="header">
          <h3>New Teacher</h3>
          </div>
          <form method="POST" action="admin/add_teacher.php" class="myform" id="myform">
            <div class="field">
              <input type="text" name="teacher_name" id="name" required>
              <label for="name">Name</label>
              <i class="fa fa-check-circle" aria-hidden="true"></i>
              <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
              <small>Error msg</small>
            </div>
            <div class="field">
              <input type="number" name="teacher_phone_number" id="phone" required>
              <label for="teacher_phone_number">Phone Number</label>
              <i class="fa fa-check-circle" aria-hidden="true"></i>
              <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
              <small>Error msg</small>
            </div>
            <div class="field">
              <input type="email" name="email" id="email" required>
              <label for="email">Email address</label>
              <i class="fa fa-check-circle" aria-hidden="true"></i>
              <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
              <small>Error msg</small>
            </div>
            <div class="field">
              <input type="password" name="password" id="password" required>
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
          <script src="theme/javascript/form.js"></script>
        </div>
      </main>');
}
// Display Footer
Structure::footer();

// delete object
unset($admin);
