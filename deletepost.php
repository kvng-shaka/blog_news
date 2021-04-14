<?php
	 include_once("config/config.php");
     include_once("class/UserClass.php");
     session_start();
     
     if(isset($_GET['post_id'])){
        $post_id  =  $_GET['post_id']   !=   ""   ?    $_GET['post_id']    :   "";
     }
        
        
     $user =  new User();
     $select_res = $user->delete_post($post_id);
     
?>