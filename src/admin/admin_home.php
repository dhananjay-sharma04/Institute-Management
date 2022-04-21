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
                            <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                            <span class="text">Present</span>
                            <span class="number"><?php
                                $studen=new Student();
                                $date = date('Y-m-d',time());
                                $present=$studen->view_today_attend($date);
                                echo $present['count(attend)'];
                            ?></span>
                            <span class="text">Total student :
                            <?php 
                                $studen=new Student();
                                $total=$studen->count_std();
                                echo $total['count(role)'];
                            ?>
                            </span>
                        </div>
                        <div class="box box2">
                            <i class="fa fa-comment" aria-hidden="true"></i>
                            <span class="text">Total Students</span>
                            <span class="number">
                            </span>
                        </div>
                        <div class="box box3">
                            <i class="fa fa-share" aria-hidden="true"></i>
                            <span class="text">Total Shares</span>
                            <span class="number">10,120</span>
                        </div>
                    </div>
</html>