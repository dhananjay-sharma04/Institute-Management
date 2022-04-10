<?php
// Import main class
require "../classes/admin.class.php";
require "../classes/structure.class.php";

// Start session
Session::init();

// Check if logged in otherwise redirect to login page
// Structure::checkLogin();

// Load Header
// Structure::header("View Students - Admin");

// Main Content Goes Here
$admin    = new Admin();
$students = $admin->view_student(0, false);
Structure::topHeading("View Students");
echo('<hr>
        <table class="table table-striped table-hover text-secondary">
        <caption><a href="'.Structure::nakedURL("").'" style="text-decoration: none;">Go back!</a></caption>
        <thead class="bg-dark text-white">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>');

$counter = 0;
foreach ($students as $student) {
    $counter++;
    // if ($student["subjects"] == "") {
    //     $student["subjects"] = "<span class='text-danger'>None</span>";
    // }
    // if ($student['teacher_name'] == "") {
    //     $student['teacher_name'] = "<span class='text-danger'>None</span>";
    // }

    echo('<tr>
        <td scope="row">'.$counter.'</td>
        <td>'.$student["name"].'</td>
        <td>'.$student["email"].'</td>
        <td>'.$student["phone_number"].'</td>
        <td>
        <div class="container">
            <div class="row">
              <div class="col"><a href="admin/update_student.php?student_id='.$student["uid"].'" alt="Edit"><img src="src/icons/edit-24px.svg" alt="Edit"></a></div>
              <div class="col"><a href="admin/delete_student.php?student_id='.$student["uid"].'"  alt="Delete"><img src="src/icons/delete-24px.svg" alt="Delete"></a></div>
            </div>
          </div>
        </td>
      </tr>');
}
echo('</tbody></table></main>');

$admin->close_DB();

// Display Footer
Structure::footer();

// delete object
unset($admin);
