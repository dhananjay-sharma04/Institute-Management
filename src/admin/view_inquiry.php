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
$student = $admin->view_inquiry();
Structure::topHeading("INQUIRIES");
echo('<hr>
        <table class="table table-striped table-hover text-secondary">
       
        <thead class="bg-dark text-white">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>&nbsp
            <th scope="col">School Name</th>&nbsp
            <th scope="col">Class</th>
            <th scope="col">phone number</th>
            <th scope="col">Email</th>
            <th scope="col">date of birth</th>
            <th scope="col">students date</th>
          </tr>
        </thead>
        <tbody>');

$counter = 0;
// print_r($students);
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
        <td>'.$students["name"].'</td>&nbsp
        <td>'.$students["school_name"].'</td>
        <td>'.$students["class"].'</td>
        <td>'.$students["p_number"].'</td>
        <td>'.$students["email"].'</td>
        <td>'.$students["dob"].'</td>
        <td>'.$students["inq_date"].'</td>

        <td>
        <div class="container">
            <div class="row">
              <div class="col"><a href="admin/update_student.php?student_id='.$student["ig_id"].'" alt="Edit"><img src="theme/icons/edit-24px.svg" alt="Edit"></a></div>
              <div class="col"><a href="admin/delete_student.php?student_id='.$student["ig_id"].'"  alt="Delete"><img src="theme/icons/delete-24px.svg" alt="Delete"></a></div>
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
