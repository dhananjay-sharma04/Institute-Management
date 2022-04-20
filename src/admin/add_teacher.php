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
    echo('<main role="main" class="wrapper">');
    // Structure::topHeading("");
    echo('
          <form method="POST" action="admin/add_teacher.php">
            <div class="field">
              <input type="text" name="teacher_name" class="form-control" id="teacher_name" aria-describedby="teacher_name" required>
              <label for="name">Name</label>
            </div>
            <div class="field">
              <input type="number" name="teacher_phone_number" class="form-control" id="teacher_phone_number" aria-describedby="teacher_phone_number" required>
              <label for="teacher_phone_number">Phone Number</label>
            </div>
            <div class="field">
              <input type="email" name="email" class="form-control" id="email" aria-describedby="email" required>
              <label for="email">Email address</label>
            </div>
            <div class="field">
              <input type="password" name="password" id="password" class="form-control" id="password" required>
              <label for="password">Password</label>
            </div>
            <div class="field">
                <input type="submit" Value="Add"></input>
            </div>
            <div class="field">
                <input type="reset" Value="Clear"></input>
            </div>
          </form>
      </main>');
}
// Display Footer
Structure::footer();

// delete object
unset($admin);
