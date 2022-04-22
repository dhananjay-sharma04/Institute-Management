<?php
// Import main class
require "../classes/admin.class.php";
session_start();

$admin    = new Admin();

if(isset($_POST['class'])){
  $date = date('Y-m-d',time());
  unset($_POST['class']); 
  foreach($_POST as $k => $v){
    $temp=$admin->attendence($k,$v,$date,$_SESSION['uid']);
  }
  ?><script>
    alert('attendence submit successfully');
    location.href='../admin/index.php';
    </script>
    <?php
  return;
}

$students = $admin->view_student(0, false,isset($_POST['stdclass']) ? $_POST['stdclass'] : '%');
echo('<main role="main" style="display: flex;justify-content: center;">');
echo('<form method="post" action="admin/std_attendence.php" class="myform">
        <table class="content-table">
        <thead>
        <div class="choose">
          <select name="class"  id="stdclass" onchange="std_attend($(this)[0].value)">
            <option value=""disabled selected>choose your class </option>
            <option value="10">10</option>
            <option value="9">9</option>
            <option value="8">8</option>
          </select>
        </div> 
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th>Attendance Status</th>
            <th>Attendance Date</th>
          </tr>
        </thead>
        <tbody>');

$counter = 1;
foreach ($students as $student) {
  echo"<pre>";
  // print_r($student);
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
      </tr>');
}
echo('</tbody></table>');
echo(' <button name="class" class="btn" type="submit">SUBMIT</button></form></main>');

$admin->close_DB();

// Structure::footer();

// delete object
unset($admin);
?>