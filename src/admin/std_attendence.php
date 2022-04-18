<?php
// Import main class
require "../classes/admin.class.php";
session_start();

$admin    = new Admin();

if(isset($_POST['class'])){
  $date = date('Y-m-d',time());
  foreach($_POST as $k => $v){
    $temp=$admin->attendence($k,$v,$date,$_SESSION['uid']);
  }
  return;
}

$students = $admin->view_student(0, false,isset($_POST['stdclass']) ? $_POST['stdclass'] : '%');
echo('<main role="main" class="container mt-3  mx-auto">');
echo('<form method="post" action="admin/std_attendence.php"><hr>
        <table class="table table-striped table-hover text-secondary">
        <thead class="bg-dark text-white">
        <select name="class" id="stdclass" onchange="std_attend($(this)[0].value)">
          <option value=""disabled selected>choose your class </option>
          <option value="10">10</option>
          <option value="9">9</option>
          <option value="8">8</option>
        </select> 
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th>Attendance Status</th>
            <th>Attendance Date</th>
          </tr>
        </thead>
        <tbody>');

$counter = 0
;
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
        <td><a><select id="attend" name="'.$student["uid"].'"><option  value="1">present</option><option value="0">absent</option></select></td>
        <td><input type="date" value="'.date('Y-m-d').'" readonly="readonly"/></td>
        <div class="container">
            <div class="row">
              
            </div>
          </div>
        </td>
      </tr>');
}
echo('</tbody></table>');
echo(' <button name="class" type="submit">SUBMIT</button></form></main>');

$admin->close_DB();

// Structure::footer();

// delete object
unset($admin);
?>