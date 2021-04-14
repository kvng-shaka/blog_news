<?php
@session_start();
include_once("config/config.php");
include_once("class/UserClass.php");

if(isset($_SESSION['username']) && $_SESSION['username'] != ""){
   
    $user =  new User();
    // print_r($_SESSION);die();
    $select_res = $user->read_one_recs($_SESSION['username']);
    //print_r($select_res);die();
}else{
     echo "<script>alert('You are not authorised..Please Log in')</script>";
      header("refresh:1; url=http://localhost/blog_news/Login_page/index.php");     
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrahmSamaj</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.grid.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.grid.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.reboot.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.reboot.min.css">
	<link rel="stylesheet" id="font-awesome-css" href="bootstrap/css/font-awesome.min.css" type="text/css" media="all">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body><div class="container portfolio">++++
	<div class="row">
		<div class="col-md-12">
			<div class="heading">	<img src="" />
			</div>
		</div>	
	</div>
	<div class="bio-info">
		<div class="row">
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-12">
						<div class="bio-image">
							<img src="img/img-md-1.jpg" alt="image" height="300px" width="420px" />
						</div>			
					</div>
				</div>	
			</div>
			<div class="col-md-6">
				<div class="bio-content">
                    <h1>MY PROFILE:</h1>
                    <br /><br />
					<h1>Fullname: <?=$select_res['fullname']?></h1>
					<h4>Email : <?=$select_res['email']?></h4>
                   <h4>Phone: <?=$select_res['phone']?></h4>
                   <h4>Username :<?=$select_res['username']?></h4>
                   <h4>Password :<?=$select_res['password']?></h4>
                   <br />
                    <a href="newpost.php" class="btn btn-primary"><i class="fa fa-plus"></i>Add New Posts</a>
                    <a href="index.php" class="btn btn-primary"><i class="fa fa-book"></i>View Blog</a>
                    <a href="logout.php" class="btn btn-danger"><i class="fa fa-sign-out"></i> LOG OUT</a>
				</div>
			</div>
		</div>	
	</div>
</div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>

</html>