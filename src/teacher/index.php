<?php
// Import main class
require "../classes/teacher.class.php";
require "../classes/structure.class.php";

// Start session
Session::init();

// Check if logged in otherwise redirect to login page
// Structure::checkLogin();

// Load Header
Structure::header("Teacher Panel - Project");
if($_SESSION['role']=='admin')
{
    header('Location: /ims/src/admin/index.php');
}
elseif($_SESSION['role']=='student')
{
    header('Location: /ims/src/student/index.php');
}
// Main Content Goes Here
// Structure::topHeading("Teacher Panel"); 
?>
<?php include("navbar.php"); ?>
<!-- Dashboard Section -->
<section class="dashboard">
    <!-- Dashboard Header -->
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>
        <div dropdown>
            <?php
                echo $_SESSION['name'];
            ?>
        </div>
    </div>
    <!-- Dashboard Header complete -->
    <!-- Dashboard content -->
    <div class="dash-content">
        <!-- Dashboard overview -->
        <div class="overview" id="main-content">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="theme/javascript/admin_ajax.js"></script>
            <?php

// Display Footer
Structure::footer();
