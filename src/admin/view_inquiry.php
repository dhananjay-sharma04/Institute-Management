<?php
// Import main class
require "../classes/admin.class.php";
require "../classes/structure.class.php";
session_start();
// Start session
// Session::init();
session_start();

// Check if logged in otherwise redirect to login page
// Structure::checkLogin();

// Load Header
// Structure::header("View Students - Admin");

// Main Content Goes Here
$admin    = new Admin();
$inqs = $admin->view_inquiry();
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
            <th scope="col">gender</th>
          </tr>
        </thead>
        <tbody>');

$counter = 0;
// print_r($students);
foreach ($inqs as $inq) {
    $counter++;
    // if ($student["subjects"] == "") {
    //     $student["subjects"] = "<span class='text-danger'>None</span>";
    // }
    // if ($student['teacher_name'] == "") {
    //     $student['teacher_name'] = "<span class='text-danger'>None</span>";
    // }

    echo('<tr>
        <td scope="row">'.$counter.'</td>
        <td>'.$inq["name"].'</td>&nbsp
        <td>'.$inq["school_name"].'</td>
        <td>'.$inq["class"].'</td>
        <td>'.$inq["p_number"].'</td>
        <td>'.$inq["email"].'</td>
        <td>'.$inq["dob"].'</td>
        <td>'.$inq["inq_date"].'</td>
        <td>'.$inq["gender"].'</td>

        <td>
        
        <div class="container">
            <div class="row">
            <div class="col"><a href="admin/delete_inquiry.php?inq_id='.$inq["ig_id"].'"  alt="Delete"><img src="theme/icons/delete-24px.svg" alt="Delete"></a></div>            </div>
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
