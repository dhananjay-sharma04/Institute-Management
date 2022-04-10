<?php
// Import main class
require "../classes/structure.class.php";

// Start session
Session::init();

// Check if logged in otherwise redirect to login page
// Structure::checkLogin();

// Load Header
Structure::header("Admin Panel - Project");
if($_SESSION['role']=='teacher')
{
    header('Location: /ims/src/teacher/index.php');
}
elseif($_SESSION['role']=='student')
{
    header('Location: /ims/src/student/index.php');
}
// Main Content Goes Here
// Structure::topHeading("Admin Panel");
?>
<?php include("navbar.php"); ?>
        <!-- Dashboard overview -->
        <div class="overview" id="main-content">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="src/javascript/admin_ajax.js"></script>
            <?php
            // Display Footer
            Structure::footer();
