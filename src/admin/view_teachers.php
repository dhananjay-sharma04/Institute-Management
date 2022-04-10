<?php
// Import main class
require "../classes/admin.class.php";
require "../classes/structure.class.php";

// Start session
Session::init();

// Check if logged in otherwise redirect to login page
// Structure::checkLogin();

// Load Header
Structure::header("View Teachers - Admin");

// Main Content Goes Here
$admin    = new Admin();
$teachers = $admin->view_teacher(0, false);
echo('<main role="main" class="container mt-3  mx-auto">');
Structure::topHeading("View Teachers");
echo('<hr>
        <table class="table table-striped table-hover text-secondary">
        <caption><a href="'.Structure::nakedURL("").'" style="text-decoration: none;">Go back!</a></caption>
        <thead class="bg-dark text-white">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
           <br> 
            <th scope="col">Subjects</th>
            <th scope="col">Students</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>');

$counter = 0;
foreach ($teachers as $teacher) {
    $counter++;

    // if ($teacher["students"] == "") {
    //     $teacher["students"] = "<span class='text-danger'>None</span>";
    // } else {
    //     $teacher["students"] = str_replace(", ", "<br/>", $teacher["students"]);
    // }
    echo('<tr>
        <th scope="row">'.($counter).'</th>
        <td>'.($teacher['name']).'</td>
        <td>'.($teacher['email']).'</td>
        <td>'.($teacher['phone_number']).'</td>
        <td>'.($teacher['uid']).'</td>
        <td>'.($teacher['uid']).'</td>
        <td>
        <div class="container">
            <div class="row">
              <div class="col"><a href="admin/update_teacher.php?teacher_id='.($teacher["uid"]).'" alt="Edit"><img src="src/icons/edit-24px.svg" alt="Edit"></a></div>
              <div class="col"><a href="admin/delete_teacher.php?teacher_id='.($teacher["uid"]).'"  alt="Delete"><img src="src/icons/delete-24px.svg" alt="Delete"></a></div>
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
unset($struct);
