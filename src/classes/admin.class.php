<?php
require("database.class.php");

class Admin extends Config
{
    //////////////// STUDENT CRUD (creat, read, update, delete) ///////////////
    // CREATE a new student
    public function create_student($student_name, $student_phone_number, $email, $password, $role,$class)
    {
        
        // check if items to insert exists in the input array or note
        if (isset($role) && isset($student_name) && isset($student_phone_number) && isset($email) && isset($password) && strlen($password) > 3) {
            $insert = $this->db->query("INSERT INTO `user`(`name`, `phone_number`, `email`, `password`, `role`,`class`) VALUES (?,?,?,?,?,?)", $student_name, $student_phone_number, $email, $password, $role,$class);
            // print_r($insert); die;
            // if more than 1 row returned then it insertion was successfull
            if ($insert->affectedRows() > 0) {
                return true;
            }
        }

        return false;
    }

    // View all student
    public function view_student($student_id, $single = false,$class='%')
    {
        $success = false; // variable to return if insertion success or failed
        if(gettype(intval($student_id)) != 'integer') return false;

        
        // check if items to insert exists in the input array or note
        if ($single == true && $student_id != 0) {
            $insert = $this->db->query("SELECT * FROM `user` WHERE role='student' and class like '$class' and uid = " . $student_id);
        } elseif($student_id == 0 && $single ==false) {
            // print_r($class);die;
            $insert = $this->db->query("SELECT * FROM user WHERE class like ? and role like ?", $class, 'student');
        } else{
            return false;
        }

        if ($insert->numRows() > 0) {
            if ($single == true && $student_id != 0) {
                $success = $insert->fetchArray();
            } else {
                $success = $insert->fetchAll();
            }
            return $success;
        }

        return $success;
    }

    // UPDATE student
    public function update_student($student_id, $student_name, $student_phone_number, $email, $password, $role)
    {
        // check if items to insert exists in the input array or note
        if (
            isset($student_id) &&
            isset($student_name) &&
            isset($student_phone_number) && 
            isset($email) && 
            isset($password)
            ) {
            
            $update = $this->db->update("UPDATE `user` SET `name`='$student_name',`phone_number`='$student_phone_number',`email`='$email',`password`='$password',`role`='$role' WHERE uid =  $student_id");
            return $update;
        }

        return false;
    }

    // DELETE student
    public function delete_student($student_id)
    {
        
        $success = false; // variable to return if insertion success or failed
        
        // check if items to insert exists in the input array or note
        if (isset($student_id)) {
            $insert = $this->db->query("DELETE FROM `user` WHERE `uid`=?", intval($student_id));
            // echo '<pre>';
            // var_dump($insert);
            // print_r($this->db); die;
            // if more than 1 row returned then it insertion was successfull
            if ($insert->affectedRows() > 0) {
                $success = true;
            }
        }

        return $success;
    }

    // Return all students with no teachers for assignment
    public function student_with_no_teacher()
    {
        $success = array(); // variable to return if insertion success or failed

        // check for students with no teachers
        $insert = $this->db->query("SELECT student.student_id, student.student_name FROM student WHERE student.teacher_id = 0 ORDER BY student.student_id ASC");

        if ($insert->numRows() > 0) {
            $success = $insert->fetchAll();
            return $success;
        } else {
            return array();
        }

        return $success;
    }

    public function assign_teacher($teacher_id, $student_id)
    {
        if ($this->teacher_exists($teacher_id) === true) {
            $assign = $this->db->query("UPDATE user SET student.teacher_id = ? WHERE student_id = ?", $teacher_id, $student_id);
            return ($assign->affectedRows() > 0);
        }

        return false;
    }

    //////////////// TEACHER CRUD (creat, read, update, delete) ///////////////
    // CREATE a new teacher
    public function create_teacher($teacher_name, $teacher_phone_number, $email, $password)
    {
         // check if items to insert exists in the input array or note
        if (isset($teacher_name) && isset($teacher_phone_number) && isset($email) && isset($password) && strlen($password) > 5 ) {
            $insert = $this->db->query("INSERT INTO `user`(`name`, `phone_number`, `email`, `password`, `role`) VALUES (?,?,?,?,?)", $teacher_name, $teacher_phone_number, $email, $password, 'teacher');
                // echo'dd';
                // print_r($insert);
                // if more than 1 row returned then it insertion was successfull
                if ($insert->affectedRows() > 0) {
                    return true;
                    // print_r($insert);
                }

        }

        return false;
    }

    // View teachers
    public function view_teacher($teacher_id, $single = false)
    {
        $success = false; // variable to return if insertion success or failed

        // check if items to insert exists in the input array or note
        // if ($single == true && $teacher_id != 0) {
        //     $view = $this->db->query("SELECT teacher.teacher_id, teacher.teacher_name, teacher.teacher_phone_number, teacher.email, teacher.password FROM teacher WHERE teacher.teacher_id = ?", $teacher_id);
        // } else {
        //     /* if no specific teacher given */
        //     $view = $this->db->query("SELECT level1.*, GROUP_CONCAT(DISTINCT student.student_name SEPARATOR '<br>') AS students FROM (SELECT DISTINCT teacher.teacher_id, teacher.teacher_phone_number, teacher.teacher_name, teacher.email, GROUP_CONCAT(DISTINCT subject.subject_name SEPARATOR ', ') AS subjects FROM teacher LEFT OUTER JOIN subject ON teacher.teacher_id = subject.teacher_id GROUP BY teacher.teacher_id) level1 LEFT OUTER JOIN student ON level1.teacher_id = student.teacher_id GROUP BY level1.teacher_id");
        // }
        if ($single == true && $teacher_id != 0) {
            $view = $this->db->query("SELECT * FROM `user` WHERE role='teacher' and uid = " . $teacher_id);
        } elseif($teacher_id == 0 && $single ==false) {
            // $insert = $this->db->query("SELECT DISTINCT level2.student_id, level2.student_name, level2.student_phone_number, level2.email, level2.teacher_name, GROUP_CONCAT(DISTINCT(subject.subject_name) SEPARATOR '<br>') AS subjects FROM (SELECT DISTINCT level.student_id, level.student_name, level.student_phone_number, level.email, level.teacher_name, assigned.subject_id FROM (SELECT DISTINCT student.student_id, student.student_name, student.student_phone_number, student.email, student.teacher_id, teacher.teacher_name FROM student LEFT OUTER JOIN teacher ON student.teacher_id = teacher.teacher_id) level NATURAL LEFT JOIN assigned) level2 NATURAL LEFT JOIN subject GROUP BY level2.student_id ORDER BY level2.student_id ASC");
            $view = $this->db->query("SELECT * FROM USER WHERE ROLE=?", 'teacher');
        } else{
            return false;
        }

        if ($view->numRows() > 0) {
            if ($single == true && $teacher_id != 0) {
                $success = $view->fetchArray();
            } else {
                $success = $view->fetchAll();
            }
            return $success;
        }

        return $success;
    }

    // UPDATE teacher
    public function update_teacher($teacher_id, $teacher_name, $teacher_phone_number, $email, $password)
    {
        $success = false; // variable to return if insertion success or failed
        // check if items to insert exists in the input array or note
        if (isset($teacher_id) && isset($teacher_name) && isset($teacher_phone_number) && isset($email) && isset($password)) {
            $insert = $this->db->query("UPDATE `user` SET `name`=?, `phone_number`=?, `email`=?, `password`=?,`role`=? WHERE `uid`=?", $teacher_name, $teacher_phone_number, $email, $password, 'teacher', $teacher_id);
            // if more than 1 row returned then it insertion was successfull
            return ($insert->affectedRows() > 0);
        }

        return $success;
    }

    // DELETE teacher
    public function delete_teacher($teacher_id)
    {
        $success = false; // variable to return if insertion success or failed

        // check if items to insert exists in the input array or note
        if (isset($teacher_id)) {
            $insert = $this->db->query("DELETE FROM `user` WHERE `uid`=?", $teacher_id);

            // if more than 1 row returned then it insertion was successfull
            if ($insert->affectedRows() > 0) {
                $success = true;
            }
        }

        return $success;
    }

    public function teacher_exists($teacher_id)
    {
        // check if input is a correct integer or not
        if (isset($teacher_id) && !empty($teacher_id) && (is_numeric($teacher_id) ? true:false) == true) {
            // check if teacher exists
            $check = $this->db->query("SELECT teacher.teacher_id FROM teacher WHERE teacher.teacher_id = ?", $teacher_id);
            return ($check->numRows() > 0);
        } else {
            return false;
        }
    }

    // Other DB functions
    public function close_DB()
    {
        $this->db->close();
    }
    
    // attendence 
    public function attendence($student_id,$attend,$date,$teacher_id)
    {
        $success = false; // variable to return if insertion success or failed

        // check if items to insert exists in the input array or note
        if (isset($student_id) && isset($attend) && isset($date) && isset($teacher_id)) {
            $insert = $this->db->query("INSERT INTO `attendance`(`std_id`, `attend_date`, `teacher_id`, `attend`) VALUES (?,?,?,?)",$student_id,$date,$teacher_id,$attend);
            // if more than 1 row returned then it insertion was successfull
            if ($insert->affectedRows() > 0) {
                $success = true;
            }
        }

        return $success;
    }

    public function add_homework($class,$date,$location,$uid,$des)
    {
        $success = false;
        if (isset($class) && isset($date) && isset($location) && isset($uid) ) 
        {
            $insert=$this->db->query("INSERT INTO `hw_table` (`class`, `description`, `date`, `location`, `id`) VALUES (?,?,?,?,?)",$class,$des,$date,$location,$uid);
            if ($insert->affectedRows() > 0) {
                $success = true;
            }
        }
        return $success;
    }
    public function view_inquiry()
    {
        $insert=$this->db->query("SELECT * FROM `inquiry_table`");
        
        return $insert->fetchAll();
        // print_r($insert);
    }
    public function view_homework($id)
    {
        $success=false;
        if(isset($id))
        {
            // print_r($id);
            $view = $this->db->query("SELECT * FROM `hw_table` where id=?",$id);
            return $view->fetchAll();
            
        }
        return $success;
    } 

    public function delete_inquiry($id)
    {
        $success = false; // variable to return if insertion success or failed

        // check if items to insert exists in the input array or note
        if (isset($id)) {
            $insert = $this->db->query("DELETE FROM `inquiry_table` WHERE `ig_id`=?", $id);

            // if more than 1 row returned then it insertion was successfull
            if ($insert->affectedRows() > 0) {
                $success = true;
            }
        }

        return $success;
    }
    public function view_admin($id)
    {
        $success = false; // variable to return if insertion success or failed

        // print_r($id);
        // check if items to insert exists in the input array or note
        if (isset($id)) {
            $insert = $this->db->query("SELECT * FROM `user` WHERE `uid`=?", $id);

            // if more than 1 row returned then it insertion was successfull
            return $insert->fetchArray();
        }

        return $success;
    }
    public function update_admin($teacher_id, $teacher_name, $teacher_phone_number, $email, $password)
    {
        $success = false; // variable to return if insertion success or failed
        // check if items to insert exists in the input array or note
        if (isset($teacher_id) && isset($teacher_name) && isset($teacher_phone_number) && isset($email) && isset($password)) {
            print_r('ok');
            $insert = $this->db->query("UPDATE `user` SET `name`=?, `phone_number`=?, `email`=?, `password`=?,`role`=? WHERE `uid`=?", $teacher_name, $teacher_phone_number, $email, $password, 'admin', $teacher_id);
            // if more than 1 row returned then it insertion was successfull
            return ($insert->affectedRows() > 0);
        }

        return $success;
    }
}
