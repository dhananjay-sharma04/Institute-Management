<?php
if($_SESSION['role']=='teacher')
{
    header('Location: /ims/src/teacher/index.php');
}
elseif($_SESSION['role']=='student')
{
    header('Location: /ims/src/student/index.php');
}
elseif(!isset($_SESSION['role'])){
    header('Location: /ims/src/index.php');    
}

// print_r($_SESSION);x
?>
<!-- Navigation Menu List -->
<div class="menu-items">
    <ul class="nav-links">
        <li>
            <div class="icon-link ">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Home</span>
            </div>
                <ul class="sub-menu blank">
                    <li><span class="link-name">Home</span></li>
                </ul>
        </li>
        <li>
            <div class="icon-link arrow">
                    <i class="uil uil-book-reader"></i>
                    <span class="link-name">Students</span>
                <i class="uil uil-angle-down"></i>
            </div>
            <ul class="sub-menu">
                <li><span class="link-name" href="">Students</span></li>
                <li onclick="showstudents()" id="viewstudent">View</li>
                <li onclick="addstudent()">Add</li>
            </ul>
        </li>
        <li>
            <div class="icon-link arrow">
                    <i class="uil uil-users-alt"></i>
                    <span class="link-name">Teachers</span>
                <i class="uil uil-angle-down"></i>
            </div>
            <ul class="sub-menu">
                <li><span class="link-name" href="">Teachers</span></li>
                <li onclick="showteacher()">View</li>
                <li onclick="addteacher()">Add</li>
            </ul>
        </li>
        <li>
            <div class="icon-link">
                <i class="uil uil-clock"></i>
                <span class="link-name">Time Table</span>
            </div>
            <ul class="sub-menu blank">
                <li><span class="link-name"><b>Time Table</b></span></li>
            </ul>
        </li>
        <li>
            <div class="icon-link">
                <i class="uil uil-user-check" ></i>
                <span class="link-name" onclick="std_attend()">Attendence</span>
            </div>
            <ul class="sub-menu blank">
                <li><span class="link-name" >Attendence</span></li>
            </ul>
        </li>
    </ul>
    <!-- Navigation Menu List complete-->
    <!-- Mode Menu -->
    <!-- Logout Mode -->
    <ul class="logout-mode">
        <li>
        <div>
        <a href="logout.php" style="text-decoration: none;display:flex;">
                <i class="uil uil-sign-out-alt"></i>
                <span class="link-name">Logout</span>
            </a>
        </div>
        </li>
        <!-- Logout Mode complete -->
        <!-- Dark Mode -->
        <li class="mode">
            
            <div>
                <i class="fa fa-moon" aria-hidden="true"></i>
                <span class="link-name">Dark Mode</span>
            </div>
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
<section class="dashboard">
    <!-- Dashboard Header -->
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>
        <div class="search-box">
            <i class="fa fa-search" aria-hidden="true"></i>
            <input type="text" placeholder="Search...">
        </div>
        <?php
            echo $_SESSION['name'];
        ?>
        <div dropdown>
            <a href=""><img src="Image/Dhananjay.JPG" alt="Profile Photo" /></a>
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