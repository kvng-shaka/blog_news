<?php
	session_start();
    unset($_SESSION['fullname']);
    unset($_SESSION['phone']);
    unset($_SESSION['email']);
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    session_destroy();
    echo"<script>alert('You have succesfully log out ..')</script>";
    header("refresh:2; url=http://localhost/blog_news/login_page/index.php");
?>