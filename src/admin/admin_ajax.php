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
            case 'showstudents':
                ?>
                <!-- Dashboard Title -->
                <div class="title">
                    <i class="uil uil-book-reader"></i>
                    <span class="text">View Students</span>
                </div>
                <!-- Dashboard Title complete -->
                <?php include("view_students.php"); ?>
                <?php
             break;
            case 'addstudent';
              ?>
              <!-- Dashboard Title -->
              <div class="title">
                    <i class="uil uil-book-reader"></i>
                    <span class="text">Add Students</span>
                </div>
                <!-- Dashboard Title complete -->
              <?php include("add_student.php");?>
              <?php
              break;
            case 'std_attend';
              ?>
              <!-- Dashboard Title -->
              <div class="title">
                    <i class="uil uil-user-check" ></i>
                    <span class="text">Attendence</span>
                </div>
                <!-- Dashboard Title complete -->
              <?php include("std_attendence.php");?>
              <?php
              break;
            case 'view_teacher';
              ?>
                <!-- Dashboard Title -->
                <div class="title">
                    <i class="uil uil-users-alt"></i>
                    <span class="text">View Teachers</span>
                </div>
                <!-- Dashboard Title complete -->
              <?php include("view_teachers.php");?>
              <?php
              break;
            case 'add_teacher';
              ?>
              <!-- Dashboard Title -->
              <div class="title">
                    <i class="uil uil-users-alt"></i>
                    <span class="text">Add Teachers</span>
                </div>
                <!-- Dashboard Title complete -->
              <?php include("add_teacher.php");?>
              <?php
              break;
            case 'showstudents_teacher':
                ?>
                <!-- Dashboard Title -->
                <div class="title">
                    <i class="uil uil-book-reader"></i>
                    <span class="text">View Students</span>
                </div>
                <!-- Dashboard Title complete -->
                <?php include("../teacher/view_students.php"); ?>
                <?php
             break;
            case 'show_inquiry':
                ?>
                <?php include("view_inquiry.php");?>
                <?php
             break;
            case 'send_hw':
                ?>
                <?php include("../teacher/send_hw.php");?>
                <?php
             break;
            case 'view_hw':
                ?>
                <?php include("../teacher/view_hw.php");?>
                <?php
             break;
            case 'view_hm_std':
                ?>
                <?php include("../student/view_hw.php");?>
                <?php
             break;

            default:
                echo 'unknown request';
             break;
        }
    }

?>