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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inquiry</title>
</head>
<body>
    <form action="" method="post">
        <label for="">name</label>
        <input type="text" name="inq_name">
        <br>
        <label for="">school name</label>
        <input type="text" name="school_name">
        <br>
        <label for="">class</label>
        <input type="number" name="std_class" size="2">
        <br>
        <label for="">phone number</label>
        <input type="number" name="phone_number">
        <br>
        <label for="">email</label>
        <input type="email" name="email">
        <br>
        <label for="">date of birth</label>
        <input type="date" name="dob">
        <br>
        <button type="submit" name="submit">SUBMIT</button>

    </form>
</body>
</html>