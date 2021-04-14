<?php
session_start();
//print_r($_SESSION);die();
if(isset($_SESSION['username']) && $_SESSION['password'] != ""){
     echo "<script>alert('Please! Logout the active account')</script>";
     header("refresh:1; url=http://localhost/blog_news/profile.php");
}
ini_set("display_errors",1);
    error_reporting(E_ALL);
    include_once("../config/config.php");
	include_once("../class/UserClass.php");
    
    if(isset($_POST['submit'])){

           /* echo"<pre>";
            print_r($_POST);
            echo"</pre>";die;*/
            
        $user =  new User();
        $user->create_recs($_POST);
    }
?>

<!DOCTYPE html>
<html>



<head>
<title>SIGN UP</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.grid.css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.grid.min.css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.reboot.css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.reboot.min.css">
<link rel="stylesheet" id="font-awesome-css" href="bootstrap/css/font-awesome.min.css" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



</head>
<body style="background-image: img/919.jpg;">


<div class="page-container">
            
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
			<h1>Sign Up</h1>
                <input type="text" name="fullname" class="Name" placeholder="Fullname"><br /><br />
                <input type="text" name="phone" class="Tele" placeholder="Phone Number"><br /><br />
				<input type="text" name="email" class="Email" placeholder="Email"><br /><br />
                <input type="text" name="username" class="username" placeholder="Username"><br /><br />
				<input type="password" name="password" class="Address" placeholder="Password"><br /><br />
                <button type="submit" name="submit">Submit</button><br />
                <p>If you have an account already <a href="http://localhost/blog_news/login_page/" class="txt1">Click Here</a></p>
            </form>
        </div>
		

</body>
</html>