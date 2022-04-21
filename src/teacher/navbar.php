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
            <div class="icon-link arrow">
                    <i class="uil uil-notes"></i>
                    <span class="link-name">Homwork</span>
                <i class="uil uil-angle-down"></i>
            </div>
            <ul class="sub-menu">
                <li><span class="link-name" href="">Homework</span></li>
                <li onclick="view_hw()">View</li>
                <li onclick="send_hw()">Upload</li> 
            </ul>
        </li>
        <li onclick="std_attend()">
            <div class="icon-link" >
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