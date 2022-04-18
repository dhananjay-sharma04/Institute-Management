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
    echo'<pre>';
    $class=$temp['class'];
    // $res->db->query("SELECT * FROM `user` WHERE UID = ?",$uid);
    // var_dump($temp);
    $student= new Student();
    $homeworks=$student->view_homework($class);
    echo('<hr>
    <table class="table table-striped table-hover text-secondary">
    
    <thead class="bg-dark text-white">
    <tr>
    <th scope="col">#</th>
    <th scope="col">class</th>&nbsp
    <th scope="col">date</th>
    <th scope="col">description</th>
    <th scope="col">Homework</th>
    </tr>
    </thead>
    <tbody>');
    $counter = 0;
    foreach ($homeworks as $homework) {
        $counter++;
        echo('<tr>
        <td scope="row">'.$counter.'</td>
        <td>'.$homework["class"].'</td>&nbsp
        <td>'.$homework["date"].'</td>
        <td>'.$homework["description"].'</td>
        <td ><a href="file/'.$homework['location'].'" style="display:flex;    justify-content: center;"><i class="fa-solid fa-file-arrow-down fa-lg"></i></a></td>
        <td>
        </tr>');
    }
    

?>