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
// Structure::topHeading("MY students");
echo('<table class="content-table">  
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Class</th>
          <th scope="col">Email</th>
          <th scope="col">Phone Number</th>
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
        <td>'.$student["name"].'</td>
        <td>'.$student["class"].'</td>
        <td>'.$student["email"].'</td>
        <td>'.$student["phone_number"].'</td>
      </tr>');
}
echo('</tbody></table></main>');

$admin->close_DB();

// Display Footer
Structure::footer();

// delete object
unset($admin);
