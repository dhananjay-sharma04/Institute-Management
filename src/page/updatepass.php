<?php
    require"../classes/student.class.php";
    session_start();
    if(isset($_SESSION['verified']) && isset($_SESSION['email']) && isset($_SESSION['otp']))
    {   
        if(isset($_POST['update']) && $_POST['pass']==$_POST['repass'])
        {
            $student=new Student();
            $update=$student->change_pass($_POST['repass'],$_SESSION['email']);
            print_r($update);
            if($update==true)
            {
                ?><script>
                    alert('your password has been updated');
                    location.href='../page/signin.php';
                    </script>
                
                <?php
            }
        }
        elseif($_POST['pass']!=$_POST['repass'])
        {
            ?><script>
                 alert('PLEASE ENTER SAME PASSWORD');
             </script>
             <form action="#" method="post">
                <label for=""> enter new pasword</label>
                <input type="password" name="pass">
                <br>
                <label for=""> re-enter the password</label>
                <input type="password" name="repass">
                <br>
                <button type="submit" name="update">submit</button>
            </form>
            <?php
        }
        else
        {
            ?>
                <script>
                    alert('PLEASE ENTER SAME PASSWORD!!!!!');
                </script>
            <form action="#" method="post">
                <label for=""> enter new pasword</label>
                <input type="password" name="pass">
                <br>
                <label for=""> re-enter the password</label>
                <input type="password" name="repass">
                <br>
                <button type="submit" name="update">submit</button>
            </form>
            <?php
        }

    }
?>