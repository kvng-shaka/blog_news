<?php
    ini_set("display_errors",1);
    error_reporting(E_ALL);
    

    class User extends connectDB {
        
        public $data = array();
        public $value;
        public $error;
        public $saveflag;
        public $query;  
        public $recs;
        public $row;
        public $id;
        public $ress_arr = array();
        public $select_res;
        
        
        //file upload properties
    
        public $currentDir;
        public $uploadDirectory;
        public $allowed_fileExtensions;
        public $fileName;
        public $fileSize;
        public $fileTmpName;
        public $fileType;
        public $ext;
        public $fileExtension;
        public $uploadPath;
        public $img_path;
    
        
        public function __construct(){
            parent::__construct();
        }
        
        
        
        
        public function create_recs($data){
            
            if($this->validate_recs($data)){// this checks if the valifation has been done on all inputs and return true
               
                $this->data  = $this->validate_recs($data);
                //echo $this->data;
                
                 $this->query = "INSERT INTO blog_users (fullname,phone,email,username,password) 
                                
                                VALUES ('{$this->data['fullname']}',
                                        '{$this->data['phone']}',
                                        '{$this->data['email']}',
                                        '{$this->data['username']}',
                                        '{$this->data['password']}')";
                   
                    //echo $this->query;die();
                $this->recs  = mysqli_query($this->db_connect,$this->query);
                    if(mysqli_affected_rows($this->db_connect)){
                        $_SESSION['fullname']  =  $this->data['fullname'];
                        $_SESSION['phone']     =  $this->data['phone'];
                        $_SESSION['email']     =  $this->data['email'];
                        $_SESSION['username']  =  $this->data['username'];
                        $_SESSION['password']  =  $this->data['password'];
                        echo "<script>alert('Record saved succesfully..Redirecting in 5 seconds')</script>";
                        //header("location:index.html");
                        header("refresh:2; url=http://localhost/blog_news/profile.php");
                    }else{
                        echo "Ooops! Record Could not be saved ".mysqli_error($this->db_connect);
                    }
                    
            }
        }
        
        
        
        public function read_one_recs($username){
           //echo "user =".$username; die;
            $this->query = "SELECT * FROM blog_users WHERE username = '$username' ";
           
            $this->recs = mysqli_query($this->db_connect,$this->query);
            
            if (mysqli_num_rows($this->recs) > 0 ){
                  $this->row = mysqli_fetch_assoc($this->recs);
                  return $this->row;
            }
            else {
                return "Ooops No Records Found";
            }
        }
        
        
        
        public function read_recs(){
                $this->query = "SELECT * FROM blog_users WHERE 1 = 1 ORDER BY 'id' DESC";
        
                $this->recs = mysqli_query($this->db_connect,$this->query);
                
                if (mysqli_num_rows($this->recs) > 0 ){
                    while ($this->row = mysqli_fetch_assoc($this->recs)){
                        $this->ress_arr[] = $this->row;
                    }
                    return $this->ress_arr;
                }
                else{
                    return "Ooops! Record Not Found";
                }
        }
        
        
        
        public function update_recs($id, $data){
                 $this->id = $id;
                 
                 if($this->validate_recs($data)){
                     $this->data  = $this->validate_recs($data);
                     $this->query = "UPDATE blog_users 
                     
                                    SET 
                                            fullname     =  '{$this->data['fullname']}',
                                            phone        =  '{$this->data['phone']}',
                                            email        =  '{$this->data['email']}',
                                            username     =  '{$this->data['username']}',
                                            password     =  '{$this->data['password']}', 
                                    
                                    WHERE 
                                            id           =   '$this->id'  ";
            
                    $this->recs  = mysqli_query($this->db_connect,$this->query);
                    if(mysqli_affected_rows($this->db_connect)){
                        move_uploaded_file($this->fileTmpName, $this->uploadPath);
                        echo "<script>alert('Record updated succesfully..Redirecting in 5 seconds')</script>";
                        //header("location:index.html");
                        header("refresh:2; url=http://localhost/blog_news/show.php");die();
                    }else{
                        echo "Ooops! Record Could not be saved ".mysqli_error($this->db_connect);
                    }
            
                }
        
        }
        
        
        public function delete_recs($id){
                $this->id = $id;
                
                $this->query = "DELETE FROM blog_users WHERE id = '$this->id'";
                
                //echo $this->query;die;
        
                $this->recs = mysqli_query($this->db_connect,$this->query);
                
                
                if ( mysqli_affected_rows($this->db_connect) ){
                    unset($_SESSION['fullname']);
                    unset($_SESSION['phone']);
                    unset($_SESSION['email']);
                    unset($_SESSION['username']);
                    unset($_SESSION['password']);
                    session_destroy();
                    echo"<script>alert('Record deleted succesfully..')</script>";
                    header("refresh:2; url=http://localhost/blog_news/sign_up_page/index.php");
                    
                }
                
        }
        
        
        
        public function log_in($data){
            //print_r($data);die;
            //$this->id = $id;
            
            if($this->validate_login($data)){
                
                $this->data  = $this->validate_login($data);
                $this->query = "SELECT * FROM blog_users WHERE username = '{$this->data['username']}' AND password = '{$this->data['password']}' ";
                //echo $this->query;die;
                $this->recs = mysqli_query($this->db_connect,$this->query);
            
                if (mysqli_affected_rows($this->db_connect)){
                    //echo "hjhxcd";die;
                    $_SESSION['username']  =  $this->data['username'];
                    $_SESSION['password']  =  $this->data['password'];
                    //print_r($_SESSION);die;
                     header("refresh:1; url=http://localhost/blog_news/profile.php");
                }
                else{
                    return "Ooops! Record Not Found";
                }
            }
            
        }
        
        
        public function create_post($data){
            if($this->validate_post($data)){// this checks if the valifation has been done on all inputs and return true
                $this->data  = $this->validate_post($data);
                //print_r($this->data);die;
                
                  $this->query = "INSERT INTO post_table (title,body,image,username,date_created,date_edited)
                        
                        VALUES ('{$this->data['title']}',
                                '{$this->data['body']}',
                                '{$this->data['imgUpload']['name']}',
                                '{$this->data['username']}',
                                '{$this->data['date_created']}',
                                '{$this->data['date_edited']}')";
                   
                //echo $this->query;die();
            $this->recs  = mysqli_query($this->db_connect,$this->query);
            if(mysqli_affected_rows($this->db_connect)){
               
                move_uploaded_file($this->fileTmpName, $this->uploadPath);
                
                echo "<script>alert('Post succesfully published')</script>";
                //header("location:index.html");
                header("refresh:1; url=http://localhost/blog_news/showpost.php");
            }else{
                echo "Ooops! Post could not be published".mysqli_error($this->db_connect);
            }
            
          }
          
          
        }
        
        
        public function read_post(){
            $this->query = "SELECT * FROM post_table WHERE 1 = 1 ORDER BY 'id' DESC";
            
            $this->recs = mysqli_query($this->db_connect,$this->query);
            
            if (mysqli_num_rows($this->recs) > 0 ){
                while ($this->row = mysqli_fetch_assoc($this->recs)){
                    $this->ress_arr[] = $this->row;
                }
                return $this->ress_arr;
            }
            else{
                return "Ooops! Post not available.";
            }
        }
        
        
         public function read_one_post($username){
            
                 //$this->id = $id;
            $this->query = "SELECT * FROM post_table WHERE username = '$username' ";
            
            $this->recs = mysqli_query($this->db_connect,$this->query);
            
            if (mysqli_num_rows($this->recs) > 0 ){
                  $this->row = mysqli_fetch_assoc($this->recs);
                  return $this->row;
            }
            else {
                return "Ooops No Records Found";
            }
        }
        
        
        public function read_single_post($id){
            
                 $this->id = $id;
                 //echo $this->id;die;
            $this->query = "SELECT * FROM post_table WHERE id = '$this->id' ";
               // echo $this->query;die;
            $this->recs = mysqli_query($this->db_connect,$this->query);
            
            if (mysqli_num_rows($this->recs) > 0 ){
                  $this->row = mysqli_fetch_assoc($this->recs);
                 // print_r($this->row) ;die;
                  return $this->row;
            }
            else {
                return "Ooops No Records Found";
            }
        }
        
        
        public function update_post($id, $data){
            $this->id = $id;
        
            if($this->validate_post($data)){
              $this->query = "SELECT image FROM post_table WHERE id = '$this->id' ";
            
                $this->recs = mysqli_query($this->db_connect,$this->query);
                
                if (mysqli_num_rows($this->recs) > 0 ){
                   $this->row = mysqli_fetch_assoc($this->recs);
                      if($this->row['image'] != ""){
                        $this->currentDir = getcwd();
                        $this->img_path = $this->currentDir."\\image\\".$this->row['image'];
                        unlink($this->img_path);
                      }
                }
                
                $this->data  = $this->validate_post($data);
                
                $this->query = "UPDATE post_table 
                        
                                SET 
                                        title       =   '{$this->data['title']}',
                                        body        =   '{$this->data['body']}',
                                        image       =   '{$this->data['imgUpload']['name']}',
                                        username    =   '{$this->data['username']}'
                                        
                                WHERE
                                        id      =       '$this->id' ";
                                        
                                
                   
                //echo $this->query;die();
            $this->recs  = mysqli_query($this->db_connect,$this->query);
            if(mysqli_affected_rows($this->db_connect)){
                move_uploaded_file($this->fileTmpName, $this->uploadPath);
                echo "<script>alert('Record updated succesfully..Redirecting in 5 seconds')</script>";
                //header("location:index.html");
                header("refresh:1; url=http://localhost/blog_news/show.php");die();
            }else{
                echo "Ooops! Post could not be updated ".mysqli_error($this->db_connect);
            }
          }  
        }
        
        
        public function delete_post($id){
            
            $this->id = $id;
            
            $this->query = "SELECT image FROM post_table WHERE id = '$this->id' ";
            
                $this->recs = mysqli_query($this->db_connect,$this->query);
                
                if (mysqli_num_rows($this->recs) > 0 ){
                   $this->row = mysqli_fetch_assoc($this->recs);
                      if($this->row['image'] != ""){
                        $this->currentDir = getcwd();
                        $this->img_path = $this->currentDir."\\image\\".$this->row['image'];
                        unlink($this->img_path);
                      }
                }
            
                $this->query = "DELETE FROM post_table WHERE id = '$this->id'";
                
                //echo $this->query;die;
        
                $this->recs = mysqli_query($this->db_connect,$this->query);
                
                if ( mysqli_affected_rows($this->db_connect) ){
                    header("location:show.php");
                }
        }
        
        
        public function getFullname($username){
            
              $this->query  = "SELECT fullname FROM blog_users WHERE username = '$username'";
               //echo "qry = ". $this->query;die;
              $this->recs   =  mysqli_query($this->db_connect,$this->query);
              if(mysqli_num_rows($this->recs) > 0){
                 $this->row = mysqli_fetch_assoc($this->recs);
                 //print_r($this->row);die;
                 return $row = ($this->row["fullname"] != "")?  $this->row["fullname"] : "Guest";
              }
        }
        
        
        
        
        public function validate_post($data){
                $this->data = $data;
                
            $this->data['title']    =     $this->data['title']      !=   ""  ?       $this->test_input($this->data['title'])  :   "";
            $this->data['body']     =     $this->data['body']       !=   ""  ?       $this->test_input($this->data['body'])   :   "";
            //$this->data['image']    =     $this->data['image']      !=   ""  ?       $this->test_input($this->data['image'])  :   "";
            
            $this->saveflag = true; 
            $this->error    = "";
              
            if ($this->data['title'] == ""){
                    $this->error.= "Title cannot be empty. <br>";
                    $this->saveflag = false;
            } 
                
            if ($this->data['body'] == ""){
                    $this->error.= "Please type in the body of the post<br>";
                    $this->saveflag = false;
            }
            
            //validation for image upload
            
            $this->currentDir = getcwd();
            $this->uploadDirectory = "/image/";
            $this->allowed_fileExtensions = ['jpeg','jpg','png','gif']; // get all the file extensions
            $this->fileName = $this->data['imgUpload']['name'];
            $this->fileSize = $this->data['imgUpload']['size'];
            $this->fileTmpName = $this->data['imgUpload']['tmp_name'];
            $this->fileType = $this->data['imgUpload']['type'];
           
            $this->ext = explode('.',$this->fileName);
            $this->fileExtension = strtolower(end($this->ext));
           //echo "file ext = ". $this->fileExtension;die;
            $this->uploadPath = $this->currentDir . $this->uploadDirectory . basename($this->fileName);
           
            if(!in_array($this->fileExtension,$this->allowed_fileExtensions)){
                $this->error.="This file Extension is not allowed. Please upload a JPEG or PNG or GIF file<br>";
                $this->saveFlag = false;
            }
           
            if ($this->fileSize > 2000000){
                $this->error.= "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB<br>";
                $this->saveFlag = false;
            }
               
                
                
            if($this->saveflag){
                
                return $this->data;
                
               }
               else{
                    echo "<h2>There are some errors in your inputs: Check below for details</h2><br>";
                    echo "<div style='background:#ffcccc;padding:15px;border-radius:10px;'>".$this->error."</div>";
                    return false;
            }
                
        }
        
        
        
        public function validate_login($data){
              $this->data  = $data;
              
              $this->data['username']    =     $this->data['username']      !=   ""  ?       $this->test_input($this->data['username'])  :   "";
              $this->data['password']    =     $this->data['password']      !=   ""  ?       $this->test_input($this->data['password'])  :   "";
              
              $this->saveflag = true;     //iniatialise save flag to true
              $this->error    = "";
              
               if ($this->data['username'] == ""){
                        $this->error.= "Username cannot be empty. <br>";
                        $this->saveflag = false;
                } 
                
                if ($this->data['password'] == ""){
                        $this->error.= "Password cannot be empty. Please enter Password <br>";
                        $this->saveflag = false;
                }
                
                
                if($this->saveflag){
                    
                    return $this->data;
                    
                   }
                   else{
                        echo "<h2>There are some errors in your inputs: Check below for details</h2><br>";
                        echo "<div style='background:#ffcccc;padding:15px;border-radius:10px;'>".$this->error."</div>";
                        return false;
                }
                
        }
        
        
        
        
        public function validate_recs($data){
            $this->data  = $data;
            
            
            $this->data['fullname']    =     $this->data['fullname']      !=   ""  ?       $this->test_input($this->data['fullname'])  :   "";
            $this->data['phone']       =     $this->data['phone']         !=   ""  ?       $this->test_input($this->data['phone'])     :   "";
            $this->data['email']       =     $this->data['email']         !=   ""  ?       $this->test_input($this->data['email'])     :   "";
            $this->data['username']    =     $this->data['username']      !=   ""  ?       $this->test_input($this->data['username'])  :   "";
            $this->data['password']    =     $this->data['password']      !=   ""  ?       $this->test_input($this->data['password'])  :   "";
            
            //start validation
            
            $this->saveflag = true;     //iniatialise save flag to true
            $this->error    = "";
            
            
            if ($this->data['fullname'] == ""){
                    $this->error.= "Fullname cannot be empty. Please enter your fullname <br>";
                    $this->saveflag = false;
            }
            
            if ($this->data['phone'] == ""){
                    $this->error.= "Phone Number cannot be empty. Please enter a valid Phone number <br>";
                    $this->saveflag = false;
            }
            
            if ($this->data['email'] == ""){
                    $this->error.= "Email cannot be empty. <br>";
                    $this->saveflag = false;
            }else{
                if(!filter_var($this->data['email'],FILTER_VALIDATE_EMAIL)){
                    $this->error.= "Invalid Email<br>";
                    $this->saveflag = false;
                }
            }
            
           if ($this->data['username'] == ""){
                    $this->error.= "Username cannot be empty. <br>";
                    $this->saveflag = false;
            } 
            
            if ($this->data['password'] == ""){
                    $this->error.= "Password cannot be empty. Please enter Password <br>";
                    $this->saveflag = false;
            }
            
            
            if($this->saveflag){
                
                return $this->data;
                
               }
               else{
                    echo "<h2>There are some errors in your inputs: Check below for details</h2><br>";
                    echo "<div style='background:#ffcccc;padding:15px;border-radius:10px;'>".$this->error."</div>";
                    return false;
            }
            
         
            
        }
        
        
        public function test_input($value){
            $this->value = $value;
            $this->value = trim($this->value);
            $this->value = stripslashes($this->value);
            $this->value = htmlspecialchars($this->value);
            return $this->value;
        }
        
    }
?>