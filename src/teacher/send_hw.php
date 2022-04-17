<?php
require "../classes/admin.class.php";
// require "../classes/structure.class.php";
session_start();
// Session::init();
// Structure::header("send homework");
// include("navbar.php");
// Structure::topHeading("send hw");
// if(!isset($_SESSION['UID'])) header('Location:'.DIRROOT.'page/signin.php');

if(isset($_POST['submit']))
{
    // echo'<pre>';
    // print_r($_POST['class']);
    // print_r($_FILES['hw_file']);
    $file_name=$_FILES['hw_file']['name'];
    $type=$_FILES['hw_file']['type'];
    $tmp_name=$_FILES['hw_file']['tmp_name'];
    $error=$_FILES['hw_file']['error'];
    $file_size=$_FILES['hw_file']['size'];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
    $file_name = 'hw'.time().".".$ext;

    move_uploaded_file($tmp_name,'../file/'.$file_name);
    $class=$_POST['class'];
    $date = date('Y-m-d',time());
    $uid=$_SESSION['uid'];
    $des=$_POST['hw_disc'];
    $admin    = new Admin();
    $homework= $admin->add_homework($class,$date,$file_name,$uid,$des);
    if($homework === true)
    {
        ?>
        <script>
          alert('home work send successfully');
          location.href='index.php';
        </script>
        <?php
    }
    else {
    }
}
?>
<html>
 <form action="teacher/send_hw.php" method="post" enctype="multipart/form-data">
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
</html>