<?php
	class connectDB{
	   
       private $db_host         = "127.0.0.1";
       private $db_name         = "blog_news";
       private $db_username     = "root";
       private $db_password     = "";
       
       protected $db_connect    = "";
       
       protected function __construct(){
           
           $this->db_connect = new mysqli($this->db_host,$this->db_username,$this->db_password,$this->db_name);
           
           if (!$this->db_connect){
                return "Error Connecting to Database...".mysqli_error();
           }
           return $this->db_connect;
       }
       
	}
?>