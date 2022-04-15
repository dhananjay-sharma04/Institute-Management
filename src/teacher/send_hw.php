<?php
require "../classes/admin.class.php";
require "../classes/structure.class.php";
$admin    = new Admin();
$students = $admin->view_student(0, false, $_POST['std']);
print_r($_POST);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    <form action="" method="post">
        <label for="homework title">homework title</label>
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
        <input type="text" name="hw_disp" id="hw_dis">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="validatedCustomFile">
        </div>
        <button type="submit">submit</button>
    </form>
</body>

</html>