<?php
// Import main class
require "../classes/student.class.php";
require "../classes/structure.class.php";

// Start session
Session::init();

// Check if logged in otherwise redirect to login page
// Structure::checkLogin();

// Load Header
Structure::header("View Teachers - Student Panel");

// Main Content Goes Here
$student  = new Student();

echo('<!-- Navigation Menu List -->
<div class="menu-items">
    <ul class="nav-links">
        <li><a href="#">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span class="link-name">Home</span>
        </a></li>
        <li>
            <div class="icon-link">
                <a href="#">
                    <i class="fa-solid fa-users"></i>
                    <span class="link-name">Manage User</span>
                </a>
                <i class="fa fa-angle-down arrow" aria-hidden="true"></i>
            </div>
            <ul class="sub-menu">
                <li><a href="#">Students</a></li>
                <li><a href="#">Teacher</a></li>
            </ul>
        </li>
        <li>
            <div class="icon-link">
                <a href="#">
                    <i class="fa fa-desktop" aria-hidden="true"></i>
                    <span class="link-name">Manage Class</span>
                </a>
                <i class="fa fa-angle-down arrow" aria-hidden="true"></i>
            </div>
            <ul class="sub-menu">
                <li><a href="#">Standard</a></li>
                <li><a href="#">Section</a></li>
                <li><a href="#">Subject</a></li>
            </ul>
        </li>
        <li><a href="#">
            <i class="fa fa-bell" aria-hidden="true"></i>
            <span class="link-name">Time Table</span>
        </a></li>
        <li><a href="#">
            <i class="fa fa-book" aria-hidden="true"></i>   
            <span class="link-name">Examination</span>
        </a></li>
        <li><a href="#">
            <i class="fa fa-check" aria-hidden="true"></i>
            <span class="link-name">Attendance</span>
        </a></li>
        <li><a href="#">
            <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
            <span class="link-name">Accounting</span>
        </a></li>
        <li><a href="#">
            <i class="fa fa-table" aria-hidden="true"></i>
            <span class="link-name">Events</span>
        </a></li>
        <li><a href="#">
            <i class="fa fa-cogs" aria-hidden="true"></i>
            <span class="link-name">Manage Others</span>
        </a></li>
    </ul>
    <!-- Navigation Menu List complete-->
    <!-- Mode Menu -->
    <!-- Logout Mode -->
    <ul class="logout-mode">
        <li><a href="logout.php">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            <span class="link-name">Logout</span>  
        </a></li>
    <!-- Logout Mode complete -->
    <!-- Dark Mode -->
        <li class="mode"><a href="#">
            <i class="fa fa-moon" aria-hidden="true"></i>
            <span class="link-name">Dark Mode</span>  
        </a>
        <div class="mode-toggle">
            <span class="switch"></span>
        </div>
        </li>
    <!-- Dark Mode complete -->
    </ul>
    <!-- Mode Menu complete-->
</div>
</nav>
<!-- SideBar Navigation complete -->
<!-- Dashboard Section -->
<section class="dashboard">
<!-- Dashboard Header -->
<div class="top">
    <i class="fa fa-bars sidebar-toggle" aria-hidden="true"></i>
    <div class="search-box">
        <i class="fa fa-search" aria-hidden="true"></i>
       <input type="text" placeholder="Search..."> 
    </div>
    <div dropdown>
        <a href="#"><img src="Image/Dhananjay.JPG" alt="Profile Photo" /></a>
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
    <div class="overview">
    <!-- Dashboard Title -->
      <div class="title">
          <i class="fa fa-home" aria-hidden="true"></i>
          <span class="text">Home</span>
      </div>
      <!-- Dashboard Title complete -->
      <!-- Dashboard Main content -->
      <div class="boxes">
          <div class="box box1">
              <i class="fa fa-thumbs-up" aria-hidden="true"></i>
              <span class="text">Total Likes</span>
              <span class="number">50,120</span>
          </div>
          <div class="box box2">
              <i class="fa fa-comment" aria-hidden="true"></i>
          <span class="text">Comments</span>
          <span class="number">20,120</span>
      </div>
      <div class="box box3">
          <i class="fa fa-share" aria-hidden="true"></i>
          <span class="text">Total Shares</span>
          <span class="number">10,120</span>
      </div>
      </div>');
$student->close_DB();

// Display Footer
Structure::footer();

// delete object
unset($student);
unset($struct);
