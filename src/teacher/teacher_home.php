<?php

    require "../classes/student.class.php";
    // $con=Structure::header('home');
?>
    <!-- Dashboard Title -->
    <div class="title">
        <i class="uil uil-estate"></i>
        <span class="text">Home</span>
    </div>
    <!-- Dashboard Title complete -->
    <!-- Dashboard Main content -->
    <div class="boxes">
        <div class="box box1">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span class="text">Todays homework send</span>
            <span class="number"><?php
                $studen=new Student();
                $date = date('Y-m-d',time());
                $present=$studen->count_hw($date);
                echo $present['count(date)'];
            ?></span>
        </div>
        <div class="box box2">
            <i class="fa fa-users" aria-hidden="true"></i>
            <span class="text">Total Students</span>
            <span class="number">
            </span>
        </div>
        <div class="box box3">
            <i class="fa fa-share" aria-hidden="true"></i>
            <span class="text">Total Inquiry</span>
            <span class="number">
            </span>
        </div>
    </div>
</html>