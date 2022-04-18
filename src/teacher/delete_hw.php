<?php
    require "../classes/teacher.class.php";
    require "../classes/structure.class.php";
    print_r( $_GET['hw_id']);
    if (isset($_GET['hw_id']) ) {
        $teacher= new Teacher();
        if ($teacher->delete_hw(filter_input(INPUT_GET, "hw_id", FILTER_DEFAULT)) == true) {
            // On success
            // Structure::successBox("Delete Student", "Successfully deleted student!", Structure::nakedURL("view_students.php"));
            ?>
            <script>
              alert('Successfully deleted HOMEWORK!');
              location.href='index.php';
    
            </script>
            <?php
        } else {
            // On failure
            ?>
            <script>
              alert('Unable to delete HOMEWORK');
              location.href='index.php';
    
            </script>
            <?php        }
        //$admin->close_DB();
    }
     
?>