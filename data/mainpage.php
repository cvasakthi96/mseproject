<?php

require 'conn.php';

	session_start();
	
	$user_name=$_SESSION['login_username'];	
	$user_password=$_SESSION['login_password'];	
				
$str="SELECT * FROM account WHERE username ='$user_name' AND userpassword = '$user_password'";	
			
			
			$s = sqlsrv_query($conn,$str);
						  
									
			$numberOfRows =sqlsrv_has_rows( $s );				
			while( $row = sqlsrv_fetch_array( $s, SQLSRV_FETCH_NUMERIC) ) {
				
	   $_SESSION['session_username']=$row[0];
	   $_SESSION['session_userpassword']=$row[1];
	   $_SESSION['session_mobilenumber']=$row[2];
	   $_SESSION['session_location']=$row[3];
	   $_SESSION['session_age']=$row[5];
	   $_SESSION['session_profile']=$row[4];
	   $_SESSION['session_address']=$row[6];
	   $_SESSION['session_actvie']=0;
	   
	   }
	$filename = 'profile/'.$_SESSION['session_profile'];


if (file_exists($filename)) {
    
	
} else {
    
	$_SESSION['session_profile']="default.png";
}	
	
?>



<html>
<title> E AGROSERVICES</title>
<head>



<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/jquery.js"></script>
 <script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
 <script>
 new WOW().init();
 </script>

 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width ,initial-scale=1">
 <style>
 
 </style>
 <script>
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
</script>
 </head>
<header>

 <div class="container  " style="#background-color: bgcolor="width=100%>

 <div class="col-md-9" >
 
  <h4 class="text-center text-success wow fadeInLeft" ><img class="img" src="html/images/bg/BG7.png">-AGROSERVICES </h4>
</div>
<div    class='col-md-3 text-success' align='right'>

<table>
<tr><td>
<img  align="right"   class="img-circle" src="profile/<?=$_SESSION['session_profile']?>"  height='90px' width='100px'  >
</td></tr></table>
<h4 class= "text-success" > <?=$_SESSION['session_username']?>
<br>
<a align="right"  href="?var=logout"class="text-success " name="logout" >logout</a>

<a align="right"  href="#"class="text-success "   data-toggle="popover" data-placement="left" >change profile</a>

</h4>
<div id="popover-content" class="hide">



	<form action="" class="form-inline" method="post" enctype="multipart/form-data">
    Select profile image:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="upload">
</form>
	   
	   
	   <script type="text/javascript">
  $("[data-toggle=popover]").popover({
    html: true, 
	content: function() {
          return $('#popover-content').html();
        }
});

    </script>
  
	  
	   </div>
	   


<?php 

$target_dir = "profile/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$imagename=basename($_FILES["fileToUpload"]["name"]);
$uname=$_SESSION['session_username'];

if(isset($_POST["upload"])) {
	adddata($imagename,$uname);
	
     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo   "profile pic has been changed.";
    } else {
        echo "Sorry, there was an error uploading your profile.";
    }
}

function adddata($imagename,$uname){
	
require 'conn.php';

sqlsrv_query( $conn, "UPDATE account SET profileid='$imagename' where username='$uname'");
	
}











?>
	
	
</div>
</div>

</header> 



<body  width="100%"background="html/images/bg/BG4.jpg">



<div class=" container ">
<div class=" row well">


<div class="col-md-1 wow fadeInLeft" style="background-color: transparent " >
      <ul class="nav  nav-stacked nowrap">
        <li class="wow slideInUp" data-wow-delay="2s"><img src="html/dropdown/weather.jpg"><a href="weather.php"target="result"class="text-success">Weather</a></li>
        <li class="wow slideInUp" data-wow-delay="1.8s"><img src="html/dropdown/map.jpg"><a href="map.php"target="result"class="text-success">FindStore</a></li>
        <li class="wow slideInUp" data-wow-delay="1.2s"><img src="html/dropdown/agri_marketing.jpg"><a href="agri_marketing.php"target="result"class="text-success">Marketing</a></li>
         <li class="wow slideInUp" data-wow-delay="1.6s"><img src="html/dropdown/book.jpg"><a href="learn.php"target="result"class="text-success">Learning</a></li> 
		<li class="wow slideInUp" data-wow-delay="1.4s"><img src="html/dropdown/video.jpg"><a href="video.php"target="result"class="text-success">Video</a></li> 
		 
		 
		 
		 
		
	 </ul><br> 

 

</div>
<div class="col-md-11">

<iframe  name="result" width="100%"  frameborder="0"  style="  max-height: 600px;" onload="resizeIframe(this)" >

</iframe>
</div>
</div>
</div>


<footer class="container">

<div class="col-md-12" style="   background-color:#DFF0D8; ">
<h4>  Thank you for using our site   </h4>

</div>
  
  
  
  
</footer>

</body>





 

 </html>

	
 <?php
 if($_GET['var'] == "logout")
 { 
	 unset( $_SESSION['session_username']);
	  unset($_SESSION['session_userpassword']);
session_destroy();
	 
	echo '<script type="text/javascript">
           window.location = "http://mseproject.azurewebsites.net/index.php"
      </script>';
	
header("location:http://mseproject.azurewebsites.net/index.php");	

		 }
?>