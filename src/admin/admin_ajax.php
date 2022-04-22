<?php

    if(isset($_POST['request'])){
        switch($_POST['request']){
            case 'home':
                 include("../admin/admin_home.php");
             break;
            case 'home_th':
                 include("../teacher/teacher_home.php");
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
                <!-- Dashboard Title -->
                <div class="title">
                    <i class="uil uil-question-circle"></i>
                    <span class="text">Inquiry</span>
                </div>
                <!-- Dashboard Title complete -->
                <!-- Dashboard Main content -->
                <?php include("view_inquiry.php"); 
             break;
            case 'view_hw':
                ?>
                <!-- Dashboard Title -->
                <div class="title">
                    <i class="uil uil-notes"></i>
                    <span class="text">View Homework</span>
                </div>
                <!-- Dashboard Title complete -->
                <!-- Dashboard Main content -->
                <?php include("../teacher/view_hw.php");?>
                <?php
             break;
            case 'send_hw':
                ?>
                <!-- Dashboard Title -->
                <div class="title">
                    <i class="uil uil-notes"></i>
                    <span class="text">Upload Homework</span>
                </div>
                <!-- Dashboard Title complete -->
                <!-- Dashboard Main content -->
                <?php include("../teacher/send_hw.php");?>
                <?php
             break;
            case 'view_hm_std':
                ?>
                <!-- Dashboard Title -->
                <div class="title">
                    <i class="uil uil-notes"></i>
                    <span class="text">View Homework</span>
                </div>
                <!-- Dashboard Title complete -->
                <!-- Dashboard Main content -->
                <?php include("../student/view_hw.php");?>
                <?php
             break;
            case 'view_attend_std':
                ?>
                <!-- Dashboard Title -->
                <div class="title">
                    <i class="uil uil-user-check"></i>
                    <span class="text">Your Attendance</span>
                </div>
                <!-- Dashboard Title complete -->
                <!-- Dashboard Main content -->
                <?php include("../student/view_attend.php");?>
                <?php
             break;
            case 'update':
                ?>
                <!-- Dashboard Title -->
                <div class="title">
                    <i class="uil uil-user-check"></i>
                    <span class="text">your Profile</span>
                </div>
                <!-- Dashboard Title complete -->
                <!-- Dashboard Main content -->
                <?php include("../admin/admin_update.php");?>
                <?php
             break;

            default:
                echo 'unknown request';
             break;
        }
    }

?>