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
    <main role="main" class="wrapper">');
    Structure::topHeading("");
    echo('
          <form method="POST" action="admin/add_student.php" >
            <div class="field">
              <input type="text" name="student_name" class="form-control" id="student_name" aria-describedby="student_name" required>
              <label for="name">Name</label>
            </div>
            <div class="">
              <label for="Clas">Class</label>
                <div class="class-list">
                  <select name="class" id="std" required>
                    <option value=""disabled selected>choose your class </option>
                    <option value="10">10</option>
                    <option value="9">9</option>
                    <option value="8">8</option>
                  </select> 
                </div>
            </div>
            <div class="field">
              <input type="number" name="student_phone_number" class="form-control" id="student_phone_number" aria-describedby="student_phone_number" required>
              <label for="student_phone_number">Phone Number</label>
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
              <input type="submit" value="Add">
            </div>
            <div class="field">
              <input type="reset" value="Clear">
            </div>
          </form>
      </main>');
}
// Display Footer
Structure::footer();

// delete object
unset($admin);
?>
