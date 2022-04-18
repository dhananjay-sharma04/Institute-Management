<?php
require "../classes/teacher.class.php";
// require "../classes/database.class.php";
session_start();
$id =$_SESSION['uid'];
$role =$_SESSION['role'];
$teacher = new Teacher();
$homeworks= $teacher->view_homework($id,$role);
// print_r($id);
// print_r($homeworks);
if($homeworks==true)
{
    echo('<table class="content-table">
    <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">Class</th>
    <th scope="col">Date</th>
    <th scope="col">Description</th>
    <th scope="col">Given by</th>
    <th scope="col">HW</th>
    <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>');
    $counter = 0;
    // print_r($students);
    foreach ($homeworks as $homework) {
        $counter++;
        $result=$teacher->view_hw_sender($homework['id']);
        // print_r($result);
        // $q="SELECT `name` FROM `user` WHERE uid=1"
        // $result=$this->db->query("SELECT `name` FROM `user` WHERE uid=?",$homework['id']);
        echo('<tr>
        <td scope="row">'.$counter.'</td>
        <td>'.$homework["class"].'</td>
        <td>'.$homework["date"].'</td>
        <td>'.$homework["description"].'</td>
        <td>'.$result['name'].'</td>
        <td ><a href="file/'.$homework['location'].'" style="display:flex;    justify-content: center;"><i class="fa-solid fa-file-arrow-down fa-lg"></i></a></td>
        <td><a href="teacher/delete_hw.php?hw_id='.$homework["hw_id"].'"  alt="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
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
