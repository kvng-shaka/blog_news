<?php
	include_once("config/config.php");
    include_once("class/UserClass.php");
    
    if(isset($_SESSION['username']) && $_SESSION['username'] != ""){
        $user =  new User();
        $select_res = $user->read_one_recs($_SESSION['username']);
        //print_r($select_res);die();
    }
    
    $user = new User();
    $select_res = $user->read_post();
    //print_r($select_res);die;
?>

<!DOCTYPE html>
<html>
<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.grid.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.grid.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.reboot.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.reboot.min.css">
	<link rel="stylesheet" id="font-awesome-css" href="bootstrap/css/font-awesome.min.css" type="text/css" media="all">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
    <div class="container">
    <div class="col-md-12">
    <?php
             if(is_array($select_res) && !empty($select_res)){ 
    ?>
    
    <?php
           }  
         ?>
          <?php
                   $x = 1;
                   foreach($select_res as $row){
                        $id         = $row['id'];
                        //$fullname   = $row['firstname'];
                   
                        ?>
        <img src="image/<?php if(isset($row['image']) && $row['image'] != "") echo $row['image']; else echo "noimage.jpg";?>" width="150px" height="150px" />
        <h1><strong><?=$row['title'];?></strong></h1>
        <p><?=$row['body'];?></p>
        <div>
            <span class="badge">Posted <?=$row['date_created'];?></span><div class="pull-right"><span class="label label-default">By: <?=$row['username'];?></span> 
            <span class="label label-primary">story</span> <span class="label label-success">blog</span> 
            <span class="label label-info">personal</span> <span class="label label-warning">Warning</span>
            <span class="label label-danger">Danger</span></div>         
         </div>
          <?php
                      $x++;
                      }
                      
                      ?>
         
        <hr>
        <h1>Revolution has begun!</h1>
        <img />
        <p>'I am bound to Tahiti for more men.'
            'Very good. Let me board you a moment—I come in peace.' With that he leaped from the canoe, swam to the boat; 
            and climbing the gunwale, stood face to face with the captain.
            'Cross your arms, sir; throw back your head. Now, repeat after me. As soon as Steelkilt leaves me,
             I swear to beach this boat on yonder island, and remain there six days. If I do not, may lightning strike me!
             'A pretty scholar,' laughed the Lakeman. 'Adios, Senor!' and leaping into the sea, he swam back to his 
             comrades.</p>
        <div>
            <span class="badge">Posted 2012-08-02 20:47:04</span><div class="pull-right"><span class="label label-default">alice</span>
             <span class="label label-primary">story</span> <span class="label label-success">blog</span> 
             <span class="label label-info">personal</span> <span class="label label-warning">Warning</span>
            <span class="label label-danger">Danger</span></div>
        </div>     
        <hr>
    </div>
    </div>
</body>
</html>