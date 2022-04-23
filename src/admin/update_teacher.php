<?php
// Import main class
require "../classes/admin.class.php";
require "../classes/structure.class.php";

// Start session
Session::init();

// Check if logged in otherwise redirect to login page
// Structure::checkLogin();

// Load Header
Structure::header("Update Teacher - Admin");
require "../admin/navbar.php";

// Main Content Goes Here
// Check if form submitted
if (Structure::if_all_inputs_exists(array("teacher_id", "teacher_name", "teacher_phone_number", "email", "password"), "POST") == true) {
  $admin = new Admin();
  
  if (is_bool($admin->update_teacher(
    filter_input(INPUT_POST, "teacher_id", FILTER_DEFAULT),
    filter_input(INPUT_POST, "teacher_name", FILTER_DEFAULT),
    filter_input(INPUT_POST, "teacher_phone_number", FILTER_DEFAULT),
    filter_input(INPUT_POST, "email", FILTER_DEFAULT),
    filter_input(INPUT_POST, "password", FILTER_DEFAULT)
    )) === true) {
      // On success
      // Structure::successBox("Update Teacher", "Successfully updated teacher!", Structure::nakedURL("view_teachers.php"));
      ?>
        <script>
          alert('Successfully updated teacher!');
          location.href='admin/index.php';
          
          </script>
        <?php
    } else {
      // On failure
      Structure::errorBox("Update Teacher", "Unable to update teacher!");
    }
    
    //$admin->close_DB();
  } elseif (isset($_GET['teacher_id'])) {
    $admin    = new Admin();
    $teacher  = $admin->view_teacher(filter_input(INPUT_GET, "teacher_id", FILTER_DEFAULT), true);
    
    if (!isset($teacher["uid"])) {
      Structure::errorBox("Update Teacher", "Select a valid teacher!");
    } else {
      // Form to fill details
      Structure::topHeading("");
      echo('<div class="title">
              <i class="uil uil-users-alt"></i>
              <span class="text">View Teachers</span>
            </div>');
      echo('<main role="main" class="form-body">');
      echo('<div class="container">
              <div class="header">
              <h3>Update Info</h3>
            </div>
          <form method="POST" class="myform" id="myform">
            <input type="hidden" name="teacher_id" value="'._esc($teacher["uid"]).'">
            <div class="field">
              <input type="text" name="teacher_name" id="name" value="'._esc($teacher["name"]).'">
              <label for="name">Name</label>
              <i class="fa fa-check-circle" aria-hidden="true"></i>
              <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
              <small>Error msg</small>
            </div>
            <div class="field">
              <input type="number" name="teacher_phone_number" id="phone" value="'._esc($teacher["phone_number"]).'">
              <label>Phone Number</label>
              <i class="fa fa-check-circle" aria-hidden="true"></i>
              <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
              <small>Error msg</small>
            </div>
            <div class="field">
              <input type="email" name="email" id="email" value="'._esc($teacher["email"]).'">
              <label for="email">Email address</label>
              <i class="fa fa-check-circle" aria-hidden="true"></i>
              <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
              <small>Error msg</small>
            </div>
            <div class="field">
              <input type="password" name="password" id="password" value="'._esc($teacher["password"]).'">
              <label>Password</label>
              <i class="fa fa-check-circle" aria-hidden="true"></i>
              <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
              <small>Error msg</small>
            </div>
            <div class="buttons">
              <input type="submit" class="btn" value="Update">
            </div>
          </form>
        <script src="theme/javascript/form.js"></script>
      </main>');
    }

    $admin->close_DB();
} else {
    Structure::errorBox("Update Teacher", "No teacher selected!");
}
// Display Footer
Structure::footer();

// delete object
unset($admin);
