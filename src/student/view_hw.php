<?php
    // require("../classes/database.class.php");
    require("../classes/structure.class.php");
    require("../classes/student.class.php");
    session_start();
    // print_r($_SESSION);
    $uid=$_SESSION['uid'];
    $q="SELECT * FROM `user` WHERE UID = $uid";
    $res=mysqli_query($con,$q);
    $temp=mysqli_fetch_array($res);
    // echo'<pre>';
    $class=$temp['class'];
    // $res->db->query("SELECT * FROM `user` WHERE UID = ?",$uid);
    // var_dump($temp);
    $student= new Student();
    $homeworks=$student->view_homework($class);
    echo('
    <table class="content-table">
    <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">Class</th>
    <th scope="col">Date</th>
    <th scope="col">Description</th>
    <th scope="col">By Teacher</th>
    <th scope="col">Homework</th>
    </tr>
    </thead>
    <tbody>');
    $counter = 0;
    foreach ($homeworks as $homework) {
        $counter++;
        $result=$student->view_hw_sender($homework['id']);
        echo('<tr>
        <td scope="row">'.$counter.'</td>
        <td>'.$homework["class"].'</td>
        <td>'.$homework["date"].'</td>
        <td>'.$homework["description"].'</td>
        <td>'.$result['name'].'</td>
        <td ><a href="file/'.$homework['location'].'"><i class="fa-solid fa-file-arrow-down fa-lg"></i></a></td>
        </tr>');
    }
    

?>