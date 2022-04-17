<?php
require "../classes/teacher.class.php";
session_start();
$id =$_SESSION['uid'];
$teacher = new Teacher();
$homeworks= $teacher->view_homework($id);
// print_r($id);
// print_r($homeworks);
if($homeworks==true)
{

    echo('<hr>
    <table class="table table-striped table-hover text-secondary">
    
    <thead class="bg-dark text-white">
    <tr>
    <th scope="col">#</th>
    <th scope="col">class</th>&nbsp
    <th scope="col">date</th>
    <th scope="col">description</th>
    <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>');
    $counter = 0;
    // print_r($students);
    foreach ($homeworks as $homework) {
        $counter++;
        echo('<tr>
        <td scope="row">'.$counter.'</td>
        <td>'.$homework["class"].'</td>&nbsp
        <td>'.$homework["date"].'</td>
        <td>'.$homework["description"].'</td>
        <td>
        <div class="container">
        <div class="row">
        <div class="col"><a href="admin/update_student.php?student_id='.$homework["hw_id"].'" alt="Edit"><img src="theme/icons/edit-24px.svg" alt="Edit"></a></div>
        <div class="col"><a href="admin/delete_student.php?student_id='.$homework["hw_id"].'"  alt="Delete"><img src="theme/icons/delete-24px.svg" alt="Delete"></a></div>
        </div>
        </div>
        </td>
        </tr>');
    }
    echo('</tbody></table></main>');
    
}
$teacher->close_DB();

// Display Footer
// Structure::footer();

// delete object
unset($teacher);

?>
