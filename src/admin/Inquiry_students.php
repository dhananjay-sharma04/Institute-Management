<?php
require "../classes/admin.class.php";
require "../classes/structure.class.php";    
// require "../classes/database.class.php";


Session::init();
Structure::header("send homework");
// // Structure::topHeading("inquiry");
// require "../admin/navbar.php";


if(isset($_POST['submit']))
{
    $name=$_POST['inq_name']; 
    $schoo_name=$_POST['school_name']; 
    $class=$_POST['std_class']; 
    $p_num=$_POST['phone_number']; 
    $email=$_POST['email']; 
    $dob=$_POST['dob']; 
    $date = date('Y-m-d',time());
    // print_r($con);
    $q="INSERT INTO inquiry_table (`name`, `school_name`, `class`, `p_number`, `email`, `dob`, `inq_date`) VALUES ($name, $schoo_name, $class, $p_num, $email, $dob, $date)";
    $insert = mysqli_query($con,$q);
    // $insert = mysqli_query($con,"INSERT INTO `inquiry_table` (`name`, `school_name`, `class`, `p_number`, `email`, `dob`, `inq_date`) VALUES (?, ?, ?, ?, ?, ?, ?)",$name,$schoo_name,$class,$p_num,$email,$dob,$date);
    
    print_r($q);
    if(isset($insert));

    {
        echo 'yess';
    }
}
?>