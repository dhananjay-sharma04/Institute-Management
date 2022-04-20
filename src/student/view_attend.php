<?php
require "../classes/student.class.php";
session_start();
// print_r($_SESSION);
$id=$_SESSION['uid'];
$student= new Student();
$attends=$student->view_attend($id,$_SESSION['role']);
// print_r($attends);die;
if($_SESSION['role']=='student'){
  
  echo('<table class="content-table"> 
  <thead>
  <tr>
  <th scope="col">#</th>
  <th scope="col">Attendence</th>
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
}
else{
  echo('<table class="content-table"> 
  <thead>
  <tr>
  <th scope="col">#</th>
  <th scope="col">Name</th>
  <th scope="col">Attendence</th>
  <th scope="col">Date</th>
  <th scope="col">Taken By</th>
  </tr>
  </thead>
  <tbody>');
  $counter=1;
  foreach($attends as $attend)
  {
    // print_r($attend['std_id']); 
    // print_r($attend['std_id'].PHP_EOL);
    $attender=$student->view_student($attend['std_id']);
    $attend_taker=$student->view_teacher($attend['teacher_id']);
    echo('<tr>
    <td scope="row">'.$counter++.'</td>
    <td>'.$attender["name"].'</td>
    <td>'.($attend['attend']==1? 'present':'absent').'</td>
    <td>'.$attend["attend_date"].'</td>
    <td>'.$attend_taker["name"].'</td>
    </tr>');
  }
}

?>