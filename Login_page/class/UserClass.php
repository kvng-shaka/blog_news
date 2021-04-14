<?php
    ini_set("display_errors",1);
    error_reporting(E_ALL);
    
	include_once("config/config.php");
    
    class User extends connectDB {
        
        public $data = array();
        public $value;
        public $error;
        public $saveFlag;
        public $query;
        public $recs;
        public $row;
        public $id;
        public $ress_arr = array();
        
        
        public function __construct(){
            parent::__construct();
        }
        
        
        public function create_recs(){
            
        }
        
        
        public function read_recs(){
            
        }
        
        public function update_recs(){
            
        }
        
        
        public function delete_recs(){
            
        }
        
        
        public function validate_recs($data){
            $this->data  = $data;
            
            $this->data['fullname']    =     $this->data['fullname']      !=   ""  ?       $this->test_inputs($this->data['fullname'])  :   "";
            $this->data['phone']       =     $this->data['phone']         !=   ""  ?       $this->test_inputs($this->data['phone'])     :   "";
            $this->data['email']       =     $this->data['email']         !=   ""  ?       $this->test_inputs($this->data['email'])     :   "";
            $this->data['username']    =     $this->data['username']      !=   ""  ?       $this->test_inputs($this->data['username'])  :   "";
            $this->data['password']    =     $this->data['password']      !=   ""  ?       $this->test_inputs($this->data['password'])  :   "";
            
            //start validation
            
            $this->saveflag = true;     //iniatialise save flag to true
            $this->error    = "";
            
            
            if ($this->data['fullname'] = ""){
                    $this->error.= "Fullname cannot be empty. Please enter your fullname <br>";
                    $this->saveflag = false;
            }
            
            if ($this->data['phone'] = ""){
                    $this->error.= "Phone Number cannot be empty. Please enter a valid Phone number <br>";
                    $this->saveflag = false;
            }
            
            if ($this->data['email'] = ""){
                    $this->error.= "Email cannot be empty. <br>";
                    $this->saveflag = false;
            }else{
                if(!filter_var($this->data['email'],FILTER_VALIDATE_EMAIL)){
                    $this->error.= "Invalid Email<br>";
                    $this->saveflag = false;
                }
            }
            
           if ($this->data['username'] = ""){
                    $this->error.= "Username cannot be empty. <br>";
                    $this->saveflag = false;
            } 
            
            if ($this->data['password'] = ""){
                    $this->error.= "Password cannot be empty. Please enter Password <br>";
                    $this->saveflag = false;
            }
            
            
            if($this->saveFlag){
                return $this->data;
               }
               else{
                    echo "<h2>There are some errors in your inputs: Check below for details</h2><br>";
                    echo "<div style='background:#ffcccc;padding:15px;border-radius:10px;'>".$this->error."</div>";
                    return false;
            }
            
         
            
        }
        
        
        public function test_iputs(){
            $this->value = $value;
            $this->value = trim($this->value);
            $this->value = stripslashes($this->value);
            $this->value = htmlspecialchars($this->value);
            return $this->value;
        }
        
    }
?>