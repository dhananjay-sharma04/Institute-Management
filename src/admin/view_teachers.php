<?php
// Import main class
require "../classes/admin.class.php";
require "../classes/structure.class.php";

// Start session
Session::init();

// Check if logged in otherwise redirect to login page
// Structure::checkLogin();

// Load Header
// Structure::header("View Teachers - Admin");

// Main Content Goes Here
$admin    = new Admin();
$teachers = $admin->view_teacher(0, false);
echo('<main role="main">');
// Structure::topHeading("View Teachers");
echo('<table class="content-table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Subjects</th>
            <th scope="col">Students</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>');

$counter = 0;
foreach ($teachers as $teacher) {
    $counter++;
    echo('<tr>
        <th scope="row">'.($counter).'</th>
        <td>'.($teacher['name']).'</td>
        <td>'.($teacher['email']).'</td>
        <td>'.($teacher['phone_number']).'</td>
        <td>'.($teacher['uid']).'</td>
        <td>'.($teacher['uid']).'</td>
        <td>
          <div><a href="admin/update_teacher.php?teacher_id='.($teacher["uid"]).'" alt="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
          <div><a href="admin/delete_teacher.php?teacher_id='.($teacher["uid"]).'"  alt="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
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
