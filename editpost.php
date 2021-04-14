<?php
     include_once("config/config.php");
     include_once("class/UserClass.php");
     session_start();

     if(isset($_GET['post_id'])){
        $post_id  =  $_GET['post_id']   !=   ""   ?    $_GET['post_id']    :   "";
     }


        $user =  new User();
        $select_res = $user->read_single_post($post_id);
        /*echo "My session <pre>";
        print_r($_SESSION);
        echo "</pre>";die;*/
         //echo "sess_user = {$_SESSION['username']}....and cur_user = {$select_res['username']}";die();
         if ($_SESSION['username'] == "" && ($_SESSION['username'] != $select_res['username'])){
        
         	echo "<script>alert('Ooops! Unauthorized....Please Log in')</script>"; 
 			header("refresh:0.00001; url=index.php");	
 			
 			die();
         }
   

   
    //
   /* if(isset($_FILES['imgUpload'])){
                $_POST['imgUpload'] = $_FILES['imgUpload'];
           
            $user =  new User();
            $user_post = $user->read_single_post($post_id);
            print_r($user_post);die;
            
        
        $title          = $user_post['title']         !=   ""  ?  $user_post['title']         :   "";
        $body           = $user_post['body']          !=   ""  ?  $user_post['body']          :   "";
        $image          = $user_post['image']         !=   ""  ?  $user_post['image']         :   "";
        $username       = $user_post['username']      !=   ""  ?  $user_post['username']      :   "";
        $date_created   = $user_post['date_created']  !=   ""  ?  $user_post['date_created']  :   "";
        $date_edited    = $user_post['date_edited']   !=   ""  ?  $user_post['date_edited']   :   "";
        
    }*/   
    
    
    
    if (isset($_POST['update'])){

        if(isset($_FILES['imgUpload'])){
        	$_POST['imgUpload'] = $_FILES['imgUpload'];
    	}

       $new_user =  new User();
       $update_rec = $new_user->update_post($_POST['id'], $_POST); 
    }
	
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.grid.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.grid.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.reboot.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.reboot.min.css">
	<link rel="stylesheet" id="font-awesome-css" href="bootstrap/css/font-awesome.min.css" type="text/css" media="all">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="#" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
	<div class="row">
	<div class="col-md-3 ">
	     <div class="list-group ">
	      <a href="#" class="list-group-item list-group-item-action active">Dashboard</a>
	      <a href="#" class="list-group-item list-group-item-action">Media</a>
	      <a href="#" class="list-group-item list-group-item-action">Post</a>
	      <a href="#" class="list-group-item list-group-item-action">Category</a>
	      <a href="#" class="list-group-item list-group-item-action">New</a>
	      <a href="#" class="list-group-item list-group-item-action">Comments</a>
	      
	      
	    </div> 
	</div>
    
	<div class="col-md-9">
	    <div class="card">
	        <div class="card-body">
	            <div class="row">
	                <div class="col-md-3 border-right">
	                    <h4>Add New Post</h4>
	                </div>
	               <!-- <div class="col-md-7">
	                    <button type="button" class="btn btn-sm btn-primary">Add New</button>
	                </div>-->
	                
	            </div>
	            <hr>
	            <div class="row">
	                <div class="col-md-8">
			            <form name="postform" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data">
	                      <div class="form-group row">
                                <input type="hidden" class="form-control"  name="id" value="<?=$post_id?>" />
                          </div>
                          <div class="form-group row">
	                        <label for="text" class="col-12 col-form-label"><h3>Title:</h3></label> 
	                        <div class="col-12">
	                          <input type="text" name="title" placeholder="Enter Title here" class="form-control here" value="<?=$select_res['title']?>" type="text">
	                        </div>
	                      </div>
	                      <div class="form-group row">
	                        <label for="textarea" class="col-12 col-form-label"><h3>Body:</h3></label> 
	                        <div class="col-12">
	                          <textarea id="textarea" name="body" cols="40" rows="15"  class="form-control" value="<?=$select_res['body']?>" ></textarea>
	                        </div>
	                      </div>
                          <div class="card mb-3" style="max-width: 18rem;">
	                          <div class="card-header bg-light "><h4>Featured Image</h4></div>
	                          <div class="card-body">
	                            
                                <img src="image/<?=$select_res['image']?>" width="120px; height=120px"/>
	                          </div>
	                          <div class="card-footer bg-light">
                                  <input type="file" name="imgUpload" />
	                          </div>
                          </div>
                          <div>
                            <input type="hidden" name="date_created" id="date_created" value="<?=$body?>" />
                            <input type="hidden" name="date_edited" id="date_edited" value="<?=$body?>" />
                            <input type="hidden" name="username" value="<?=$select_res['username']?>" />
                          </div>
                          <div>
                            <button  name="update" class="btn btn-primary btn-sm">Publish</button>
                          </div>
	                    </form>
                        
			        </div>
			        <div class="col-md-4 ">
			            
	                    <div class="card mb-3" style="max-width: 18rem;">
	                          <div class="card-header bg-light ">Tags</div>
	                          <div class="card-body">
	                            <form>
	                              <div class="form-group row">
	                                <div class="col-9">
	                                  <input id="tags" name="tags" placeholder="seperate with commas" required="required" class="form-control here" type="text">
	                                </div>
	                                <div class=" col-2">
	                                  <button name="submit" type="submit" class="btn btn-light">Add</button>
	                                </div>
	                                <div class="col-12">
	                                    <small>Seperate Tags with commas</small>
	                                </div>
	                              </div> 
	                            </form>
	                            

	                          </div>
	                          <div class="card-footer bg-light">
	                              <a href="#">Choose from the most used tags</a>
	                          </div>
	                        </div>
	                    <div class="card mb-3" style="max-width: 18rem;">
	                          <div class="card-header bg-light ">Categories</div>
	                          <div class="card-body">
	                            <form>
	                              <div class="form-group row">
	                                <div class="col-9">
	                                  <input id="tags" name="tags" placeholder=" " required="required" class="form-control here" type="text">
	                                </div>
	                                <div class=" col-2">
	                                  <button name="submit" type="submit" class="btn btn-light">Add</button>
	                                </div>
	                                
	                              </div> 
	                            </form>
	                            <form>
	                              <div class="form-group row">
	                                <label for="select" class="col-12 col-form-label">Select Category</label> 
	                                <div class="col-8">
	                                  <select id="select" name="select" class="custom-select">
	                                    <option value="rabbit">Rabbit</option>
	                                    <option value="duck">Duck</option>
	                                    <option value="fish">Fish</option>
	                                  </select>
	                                </div>
	                              </div> 
	                            </form>
	                          </div>
	                          <div class="card-footer bg-light">
	                              <button type="button" class="btn btn-primary btn-sm">Add New Category</button>
	                          </div>
	                        </div>
	                      
			        </div>
			        
			    </div>
	        </div>
	    </div>
	</div>
	</div>
	</div>
</body>
</html>
