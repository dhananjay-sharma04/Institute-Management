<!-- Navigation Menu List -->
<div class="menu-items">
    <ul class="nav-links">
        <li>
            <div class="icon-link">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Home</span>
            </div>
                <ul class="sub-menu blank">
                    <li><span class="link-name"><b>Home</b></span></li>
                </ul>
        </li>
        <li>
            <div class="icon-link arrow">
                    <i class="uil uil-book-reader"></i>
                    <span class="link-name">Students</span>
                <i class="uil uil-angle-down"></i>
            </div>
            <ul class="sub-menu">
                <li><span class="link-name"><b>Students</b></span></li>
                <li onclick="showStudents()">Manage</li>
                <li onclick="addStudent()">Add</li>
            </ul>
        </li>
        <li>
            <div class="icon-link arrow">
                    <i class="uil uil-users-alt"></i>
                    <span class="link-name">Teachers</span>
                <i class="uil uil-angle-down"></i>
            </div>
            <ul class="sub-menu">
                <li><span class="link-name"><b>Teachers</b></span></li>
                <li>Manage</li>
                <li>Add</li>
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
                <i class="uil uil-user-check"></i>
                <span class="link-name">Attendence</span>
            </div>
            <ul class="sub-menu blank">
                <li><span class="link-name"><b>Attendence</b></span></li>
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