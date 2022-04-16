<!-- Navigation Menu List -->
<div class="menu-items">
    <ul class="nav-links">
        <li>
            <div class="icon-link ">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Home</span>
            </div>
                <ul class="sub-menu blank">
                    <li><span class="link-name" href="">Home</span></li>
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
                <li onclick="showstudents_teacher()">View</li>
                <li onclick="addstudent()">Add</li>
            </ul>
        </li>
        <li>
            <div class="icon-link">
                <i class="uil uil-clock"></i>
                <span class="link-name">Time Table</span>
            </div>
            <ul class="sub-menu blank">
                <li><span class="link-name" href="">Time Table</span></li>
            </ul>
        </li>
        <li>
            <div class="icon-link">
                <i class="uil uil-pen"></i>
                <a href="teacher/send_hw.php">
                <span class="link-name">Homework</span>
                </a>
            </div>
            <ul class="sub-menu blank">
                <li><span class="link-name" href="">Send homework</span></li>
            </ul>
        </li>
        <li>
            <div class="icon-link" onclick="std_attend()">
                <i class="uil uil-user-check" ></i>
                <span class="link-name">Attendence</span>
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