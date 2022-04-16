<?php
require "../classes/admin.class.php";
require "../classes/structure.class.php";

Session::init();
Structure::header("send homework");
// Structure::topHeading("");
print_r($_SESSION);

if(isset($_POST['submit']))
{
    // echo'<pre>';
    // print_r($_POST['class']);
    // print_r($_FILES['hw_file']);
    $file_name=$_FILES['hw_file']['name'];
    $type=$_FILES['hw_file']['type'];
    echo $tmp_name=$_FILES['hw_file']['tmp_name'];
    $error=$_FILES['hw_file']['error'];
    $file_size=$_FILES['hw_file']['size'];
    move_uploaded_file($tmp_name,'../file/'.$file_name);
    $class=$_POST['class'];
    $date = date('Y-m-d',time());
    $uid=$_SESSION['uid'];
    $des=$_POST['hw_disc'];
    $admin    = new Admin();
    $homework= $admin->add_homework($class,$date,$location,$uid,$des);
    if($homework === true)
    {
        echo"<script>
            alert('homeork send!');
          </script>";
    }
    else {
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <base href="http://localhost/ims/src/">
    <meta http-equiv="X-UA-Compatible" content="IE=edige">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css" rel="stylesheet" />
    <title>Document</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="homework title">home work title</label>
        <input type="text" name="hw_title"  id="hw_title" required>
        </div>
        <div class="form-group">
            <label for="Clas">Class</label>
            <div class="class-list">
                <select name="class" id="std" required>
                    <option value="" disabled selected>choose your class </option>
                    <option value="10">10</option>
                    <option value="9">9</option>
                    <option value="8">8</option>
                </select>
            </div>
        </div>
        <label for="discip_of_hw">discription of homework</label>
        <input type="text" name="hw_disc" id="hw_dis">
        <div class="custom-file">
            <input type="file" name="hw_file" class="custom-file-input" id="validatedCustomFile">
        </div>
        <button type="submit" name="submit">submit</button>
    </form>
</body>

</html>