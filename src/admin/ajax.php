<?php

    if(isset($_POST['request'])){

        switch($_POST['request']){
            case 'home':
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
                    </div>
                <?php
            break;
            case 'showStudents':
                ?>
                <!-- Dashboard Title -->
                <div class="title">
                    <i class="uil uil-book-reader"></i>
                    <span class="text">Students</span>
                </div>
                <!-- Dashboard Title complete -->
                <?php include("view_students.php"); ?>
                <?php
            break;
            case 'addStudent':
                ?>
                <!-- Dashboard Title -->
                <div class="title">
                    <i class="uil uil-book-reader"></i>
                    <span class="text">Students</span>
                </div>
                <!-- Dashboard Title complete -->
                <?php include("add_student.php"); ?>
                <?php
            break;
            default:
                echo 'unknown request';
            break;
        }
    }

?>