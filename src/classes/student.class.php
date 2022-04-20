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
                $attend=$this->db->query("SELECT * FROM `attendance` WHERE std_id=? AND attend_date = ?",$id);
                return $attend->fetchAll();
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
    
}
