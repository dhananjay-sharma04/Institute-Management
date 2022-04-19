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
    public function view_attend($id)
    {
        if(isset($id))
        {
            $attend=$this->db->query("SELECT * FROM `attendance` WHERE std_id=?",$id);
            return $attend->fetchAll();
        }

    }
    public function change_pass($mail,$pass)
    {
        if(isset($id))
        {
            $insert = $this->db->query("UPDATE `user` SET `password`=? WHERE `email`=?",$pass,$mail);
            return ($insert->affectedRows() > 0);
        }

    }
    
}
