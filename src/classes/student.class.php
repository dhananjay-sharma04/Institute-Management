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
}
