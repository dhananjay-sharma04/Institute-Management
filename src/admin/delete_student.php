<?php
// Import main class
require "../classes/admin.class.php";
require "../classes/structure.class.php";

// Start session
Session::init();

// Check if logged in otherwise redirect to login page
// Structure::checkLogin();

// Load Header
Structure::header("Delete Student - Admin");

// Main Content Goes Here
// Check if form submitted

if (isset($_GET['student_id']) ) {
    $admin = new Admin();
    

    if ($admin->delete_student(filter_input(INPUT_GET, "student_id", FILTER_DEFAULT)) == true) {
        // On success
        // Structure::successBox("Delete Student", "Successfully deleted student!", Structure::nakedURL("view_students.php"));
        ?>
        <script>
          alert('Successfully deleted Student!');
          location.href='admin/index.php';

        </script>
        <?php
    } else {
        // On failure
        Structure::errorBox("Delete Student", "Unable to delete student!");
    }
    //$admin->close_DB();
} elseif (isset($_GET['student_id']) && !empty($_GET['student_id']        )) {
    
    $admin    = new Admin();
    $student = $admin->view_student(filter_input(INPUT_GET, "student_id", FILTER_DEFAULT), true);

    if (!isset($student["student_id"])) {
        Structure::errorBox("Delete Student", "Select a valid student!");
    } else {
        // Form to fill details
        echo('<main role="main" class="container mt-3  mx-auto">');
        Structure::topHeading("Delete Student");
        echo('<hr>
        <div class="d-flex justify-content-center pb-4"> <img src="../src/img/delete.png" style="width: 15%;height: 15%;"></div>
        <div class="d-flex justify-content-center">Are you sure you want to delete&nbsp;<b>'._esc($student["student_name"]).'</b>?</div>
        <br>
        <div class="row justify-content-center">
        <form method="POST">
        <div class="">
          <input type="hidden" name="student_id" value="'._esc($student["student_id"]).'">
          <input type="hidden" name="delete_confirm" value="yes">
          <button type="submit" class="btn btn-danger btn-small">Yes</button>
          <a class="btn btn-success btn-small" href="'.Structure::nakedURL("view_students.php").'">No</a>
        </div>
        </form>
        </div>
        </main>');
    }

    $admin->close_DB();
} else {
    Structure::errorBox("Update Student", "No student selected!");
}
// Display Footer
Structure::footer();

// delete object
unset($admin);
?>
