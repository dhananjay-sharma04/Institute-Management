<?php
require("database.class.php");

class Student extends Config
{
    // Function to list all the Teachers of a student & their subjects
  

    // Other DB functions
    public function close_DB()
    {
        $this->db->close();
    }

    public function view_homework($class)
    {
        $success=false;
        if(isset($class))
        {
            // print_r($id);
            $view = $this->db->query("SELECT * FROM `hw_table` where class=?",$class);
            return $view->fetchAll();
            
        }
        return $success;
    }
    public function view_hw_sender($id)
    {
        if(isset($id)){
            $view=$this->db->query("SELECT `name` FROM `user` WHERE uid=?",$id);
            return $view->fetchArray();
        }
        
    } 
    public function view_attend($id,$role)
    {
        // if(empty($date)) $date = date('Y-m-d',time());
        // echo $id;die;
        if($role=='student'){

            if(isset($id))
            {
                // print_r($id);
                $attend=$this->db->query("SELECT * FROM `attendance` WHERE std_id=?",$id);
                return $attend->fetchAll();
                // print_r($attend);die;
            }
        }
        else
        {
            $attend=$this->db->query("SELECT * FROM `attendance` WHERE 1");
                return $attend->fetchAll();
        }

    }
    public function change_pass($mail,$pass)
    {
        if(isset($id))
        {
            $insert = $this->db->query("UPDATE `user` SET `password`=? WHERE `email`=?",$pass,$mail);
            print_r($insert);die;
            return ($insert->affectedRows() > 0);
        }

    }
    public function view_student($id)
    {
        if(isset($id))
        {
            $insert = $this->db->query("SELECT name FROM `user` WHERE uid=?",$id);
            return $insert->fetchArray();
        }

    }
    public function view_teacher($id)
    {
        if(isset($id))
        {
            $insert = $this->db->query("SELECT name FROM `user` WHERE uid=?",$id);
            return $insert->fetchArray();
        }

    }
    public function view_today_attend($date)
    {
        if(isset($date))
        {
            $attend = $this->db->query("SELECT count(attend) FROM `attendance` WHERE attend_date=? and attend=1",$date);
            // print_r($attend);
            return $attend->fetchArray();
        }

    }
    public function count_std()
    {
        
        $count = $this->db->query("SELECT count(role) FROM user WHERE role='student' ");
        // print_r($attend);
        return $count->fetchArray();
    

    }
    public function count_inq($date)
    {
        // print_r($date);die;
        $count = $this->db->query("SELECT count(inq_date) FROM inquiry_table WHERE inq_date=?",$date);
        // print_r($count);
        return $count->fetchArray();
    

    }
    public function count_hw($date)
    {
        // print_r($date);die;
        $count = $this->db->query("SELECT count(date) FROM hw_table WHERE date=?",$date);
        // print_r($count);
        return $count->fetchArray();
    

    }

    
}
