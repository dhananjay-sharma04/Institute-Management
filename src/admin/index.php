<?php
// Import main class
require "../classes/structure.class.php";

// Start session
Session::init();

// Check if logged in otherwise redirect to login page
// Structure::checkLogin();

// Load Header
Structure::header("Admin Panel - Project");

// Main Content Goes Here
// Structure::topHeading("Admin Panel");
?>
<?php include("navbar.php"); ?>
<!-- Dashboard Section -->
<section class="dashboard">
    <!-- Dashboard Header -->
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>
        <div class="search-box">
            <i class="fa fa-search" aria-hidden="true"></i>
            <input type="text" placeholder="Search...">
        </div>
        <div dropdown>
            <img src="theme/img/profile.JPG" alt="Profile Photo" />
            <!-- <ul>
                <li><a class="dropdown-item" href="#">My profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Logout</a></li>
            </ul> -->
        </div>
    </div>
    <!-- Dashboard Header complete -->
    <!-- Dashboard content -->
    <div class="dash-content">
        <!-- Dashboard overview -->
        <div class="overview" id="main-content">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="theme/javascript/ajax.js"></script>
            <?php
            // Display Footer
            Structure::footer();
