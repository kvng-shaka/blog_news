<?php
	 include_once("config/config.php");
     include_once("class/UserClass.php");
     
     if(isset($_SESSION['username']) && $_SESSION['username'] != ""){
        $user =  new User();
        $select_res = $user->read_one_recs($_SESSION['username']);
     }
     
     if(isset($_FILES['imgUpload'])){
        $_POST['imgUpload'] = $_FILES['imgUpload'];
     }
     
    
     if(isset($_POST['submit'])){

            /*echo"<pre>";
            print_r($_POST);
            echo"</pre>";die;*/
            
        $user =  new User();
        $user->create_post($_POST);
     } 
/**
 * [title] => sdfghj
    [body] => sdfghfhf
    [submit] => 
    [imgUpload] => Array
        (
            [name] => 022.jpg
            [type] => image/jpeg
            [tmp_name] => C:\xampp\tmp\php3634.tmp
            [error] => 0
            [size] => 2299225
        )
 */
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
	                        <label for="text" class="col-12 col-form-label"><h3>Title:</h3></label> 
	                        <div class="col-12">
	                          <input type="text" name="title" placeholder="Enter Title here" class="form-control here" required="required" type="text">
	                        </div>
	                      </div>
	                      <div class="form-group row">
	                        <label for="textarea" class="col-12 col-form-label"><h3>Body:</h3></label> 
	                        <div class="col-12">
	                          <textarea id="textarea" name="body" cols="40" rows="15" class="form-control"></textarea>
	                        </div>
	                      </div>
                          <div class="card mb-3" style="max-width: 18rem;">
	                          <div class="card-header bg-light "><h4>Featured Image</h4></div>
	                          <div class="card-body">
	                            

	                          </div>
	                          <div class="card-footer bg-light">
                                  <input type="file" name="imgUpload" />
	                          </div>
                          </div>
                          <div>
                            <input type="hidden" name="date_created" id="date_created" />
                            <input type="hidden" name="date_edited" id="date_edited" />
                            <input type="hidden" name="username" value="<?=$select_res['username']?>" />
                          </div>
                          <div>
                            <button  name="submit" class="btn btn-primary btn-sm" onclick="setTime();">Publish</button>
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
	                                    <option value="news">News</option>
	                                    <option value="sport">Sport</option>
	                                    <option value="entertainment">Entertainment</option>
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
    <script>
        function getTimeStamp(){
            var d = new Date();
            return ((d.getMonth()+ 1) + '/' +(d.getDate()) + '/' + d.getFullYear() + " " + d.getHours() + ":"
                    + ((d.getMinutes() < 10) ? ("0" + d.getMinutes()) : (d.getMinutes())) + ':' + ((d.getSeconds() <10) ? 
                    
                    ("0" + d.getSeconds()) : (d.getSeconds())));
        }
        
        function setTime(){
            document.getElementById('date_created').value = getTimeStamp();
            document.getElementById('date_edited').value = getTimeStamp();
        }
    </script>
</body>
</html>






