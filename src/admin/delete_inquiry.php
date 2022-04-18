<?php
    require "../classes/admin.class.php";
    require "../classes/structure.class.php";
    print_r( $_GET['inq_id']);
    if (isset($_GET['inq_id']) ) {
        $admin = new Admin();
        if ($admin->delete_inquiry(filter_input(INPUT_GET, "inq_id", FILTER_DEFAULT)) == true) {
            // On success
            // Structure::successBox("Delete Student", "Successfully deleted student!", Structure::nakedURL("view_students.php"));
            ?>
            <script>
              alert('Successfully deleted inquiry!');
              location.href='index.php';
    
            </script>
            <?php
        } else {
            // On failure
            ?>
            <script>
              alert('unable to delete inquiry!');
              location.href='index.php';
            </script>
            <?php
        }
        //$admin->close_DB();
    }
     
?>