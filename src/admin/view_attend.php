<?php
require "../classes/student.class.php";
session_start();
// print_r($_SESSION);
$id=$_SESSION['uid'];
$student= new Student();
$attends=$student->view_attend($id,$_SESSION['role']);
// print_r($attends);
echo('<table class="content-table"> 
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Attend date</th>
          </tr>
        </thead>
        <tbody>');
$counter=0;
foreach($attends as $attend)
{
  if($attend["attend"]==1)
  {
    $temp="Present";
  }
  else
  {
    $temp="Absent";
  }
    $counter++;
    echo('<tr>
        <td scope="row">'.$counter.'</td>
        <td>'.$temp.'</td>
        <td>'.$attend["attend_date"].'</td>
      </tr>');
}

?>