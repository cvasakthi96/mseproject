<!DOCTYPE html>
<?php

	//include('way2sms-api.php');
	 require 'conn.php';
	 require 'way2sms-api.php';
	 ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E AGROSERVICES</title>


 <link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/jquery.js"></script>
 <script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>


  </head>
  <style type="text/css">
 
  </style> 
  <header class="header">
<div class="">
 <h4 class="text-center text-success wow fadeInLeft" ><img class="img" src="html/images/bg/BG7.png">-AGROSERVICES</h4>
</div>
</header>


  <body  CLASS="jumbotron" background="html/images/bg/BG4.jpg">
  
  
  
  
 <!--  row strt-->
 <div class="row">
 <!-- col-mg-12 strt-->
 <div class="col-lg-12">
 
 <div class="col-md-3"></div>
 <!-- col-md-9 strt-->
 <div class="col-md-9">
<!-- tab row strt-->
<div class="row center"   align =" center" >
 
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#gallery">Gallery</a></li>
    <li><a data-toggle="tab" href="#login">Login</a></li>
    <li><a data-toggle="tab" href="#signup">Sign up</a></li>
    <li><a data-toggle="tab" href="#market">Market</a></li>
  </ul>

 
  

</div>
<!-- tab row end-->
</div>
<!-- col-md-9 end-->


 
 <div class="col-md-1"></div> 
 <div class="col-md-11">
 
 
 <!-- tab content  strt-->
  <div class="tab-content">
  
  <!-- gallery strt-->
    <div id="gallery" class="tab-pane fade in active">
      
	  
	  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="html/images/bg/BG4.jpg" alt="Image1" width="1170" height="650">
      </div>

      <div class="item">
        <img src="html/images/bg/BG2.jpg" alt="Image2" width="1170" height="650">
      </div>

      <div class="item">
        <img src="html/images/bg/BG3.jpg" alt="Image3" width="1170" height="650">
      </div>  <div class="item">
        <img src="html/images/bg/BG1.jpg" alt="Image4" width="1170" height="650">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
	  
	  
	
	
	</div>
	<!-- gallery end->
	
	<!-- login strt-->
    <div id="login" class="tab-pane fade">
	
	
  <FORM ALIGN=LEFT class="form-inline  "action="" method="post">
	<div class="form group">
	<label class=" control-label text-success wow bounceInUp"> USER NAME </label>
	<input type="text"class="form-control"name="user_name" placeholder="enter your username">
	<br>
	<label class=" control-label text-success wow bounceInUp"> PASSWORD </label>
	<input type="password"class="form-control text-success "name="user_password" placeholder="enter your password">
	<br>
	<div class="button"><input type="submit"class="form-control  btn-success wow bounceInUp"name="login_submit"value="login">
	



	</div>
	</div>
       </form> 

<?php
require 'conn.php';
session_destroy();
unset( $_SESSION['login_username']);
  unset( $_SESSION['login_password']);
session_start();	
	if($_POST['user_name'])  
{  
 $username=$_POST['user_name'];
 IF(!preg_match('/^[a-zA-Z0-9]{10,30}$/', $username))
 {
	 echo '<script>alert(" username must be  greater than 10 digits")</script>';

	 
}else{
	
	$v1=true;
}

 } 
 
 if($_POST['user_password'])  
 {
	$user_password=$_POST['user_password']; 
IF(!preg_match('/^[a-zA-Z0-9]{8,30}$/', $user_password)){
	 echo '<script>alert("user password should  be greater than 8 digits ")</script>';
 }
else{
	$v2=true;
	
	}
	 
 }
 
 
 
 if(isset($_POST['login_submit'])){
	
	
	
	

 
	
	
	if( $v1 == true && $v2 == true )
	{
	   try {
        $user_name = $_POST['user_name'];			
			$user_password = $_POST['user_password'];	
				
$str="SELECT * FROM account WHERE username ='$user_name' AND userpassword = '$user_password'";		
			
			
			$s = sqlsrv_query($conn,$str);
						  
									
			$numberOfRows =sqlsrv_has_rows( $s );				
			while( $row = sqlsrv_fetch_array( $s, SQLSRV_FETCH_NUMERIC) ) {
   
	   $_SESSION['login_username']=$row[0];
	   $_SESSION['login_password']=$row[1];
	 
}
			

			if ($numberOfRows === false) 
				{
			
echo("
	<form class='form-inline' method='POST' action='' >
	<label class=' control-label text-success'>  ENTER REGISTERED MOBILENUMBER</label>
	<input type=text class='form-control'   name=mobilenumber    placeholder='enter your Mobilenumber'>
	<input type=submit class='btn-success form-control ' name=getpassword  value='Get password'>
	</form>");
		
	
	} 
		 if ($numberOfRows === true) 
				{
					
		header('location:http://mseproject.azurewebsites.net/mainpage.php');				 	
				
				}
	
	


	}catch (PDOException $e) {
    echo "Error connecting to  Server.";
  
}
	}




}

	
	if(isset($_POST['getpassword']))
{	 

try{		
	

$phone=$_POST['mobilenumber'];

	
$str="select userpassword from account where mobilenumber='$phone'";
$s = sqlsrv_query($conn,$str);
	
		$numberOfRows =sqlsrv_has_rows( $s );	
			while( $row = sqlsrv_fetch_array( $s, SQLSRV_FETCH_NUMERIC) ) {
    
	    $msg='YOUR PASSWORD: ' .$row[0];
			
			}	
	
					
		
	$result=sendWay2SMS( '9677798321' ,'cva1996' ,$phone ,$msg);  
	 if($result==true)
	{ 
// echo '<script>alert(" PASSWORD SENT TO MOBILE  ")</script>';
echo '<h3 class="text-success"> PASSWORD SENT TO MOBILE </h3>';

}
else{
	echo  "<h2> PASSWORD NOT SENT</h2></br>";
}

}
catch (PDOException $e) {
    echo "Error ";
  
}

	
}	

  

?>	
	
	
	
    </div>
		<!-- login end-->
		
			<!-- sign up  strt-->
    <div id="signup" class="tab-pane fade">

	
	<div class="container ">
<form class="form-inline" method="post" action=""  >
<table >
<tr> <td>                              
<label class=" control-label text-success wow bounceInUp">USERNAME</label>     </td><td>   <input class="form-control" type="text"  name="uname"><br>  </td></tr>
<tr> <td>               
<label class=" control-label text-success wow bounceInUp">PASSWORD</label>       </td><td> <input class="form-control"type="password" name="upass" ><br>   </td></tr>
<tr> <td>               
<label class="control-label text-success wow bounceInUp">MOBILENUMBER</label>    </td><td> <input class="form-control"type="text" name="mobnumber"><br>   </td></tr>
<tr> <td>               
<label class=" control-label text-success wow bounceInUp">LOCATION </label>     </td><td>  <select class="form-control"name="location">



<option>Vellore</option><option>Thiruvannamalai</option>
<option>Kanchipuram</option>

<option>Theni</option>
<option>Madurai</option>
<option>Thirunelveli</option>
<option>Chennai</option>
<option>Vandavasi</option>
<option>Selam</option>
<option>Kanyakumari</option>
<option>Nagapatnam</option>
<option>Thiruchirapalli</option>
<option>Namakkal</option>
<option>Pondichery</option>
</select><br>      </td></tr>
<tr> <td>               
<label class=" control-label text-success wow bounceInUp">AGE</label>        </td><td>     <input class="form-control" type="text" name="age"><br>   </td></tr>
<tr> <td>               
<label class=" control-label text-success wow bounceInUp">ADDRESS</label>   </td><td>      <input  class="form-control" type ="textarea" name="address" rows=3>   </td></tr>
<tr> <td>               
<br>    <input type=submit class="btn-success form-control wow bounceInUp" name="create" value="create account">  </td><td>

</table>
</form>



<?php 
	 require 'conn.php';
	
 if(isset($_POST['create'])){
	 $name=$_POST['uname'];
	 $pass=$_POST['upass'];
	 $mobile=$_POST['mobnumber'];
	 $location=$_POST['location'];
	 $age=$_POST['age'];
	 $address=$_POST['address'];
$pro=$name.'.png';

 
 
 IF(!preg_match('/^[a-zA-Z0-9]{10,30}$/', $name))
 {
	echo '<script>alert("username must be  greater than 10 digits ")</script>';
	
	 
}else{
	
	$v1=true;
}
IF(!preg_match('/^[a-zA-Z0-9]{8,30}$/', $pass)){
	echo '<script>alert(" user password should  be greater than 8 digits")</script>';
	}
else{
	$v2=true;
	
	}
IF(!preg_match('/^[0-9]{10}$/', $mobile)){
	echo '<script>alert("Mobile  Number should  be 10 digits ")</script>';
	 }
else{
	$v3=true;
	
	}
 

 
 if($v1==true && $v2=true && $v3=true){
try{
	  $st1="insert into  account values('$name','$pass','$mobile','$location','$pro','$age','$address')";
	   
	$getResults =sqlsrv_query( $conn,$st1);

	
if($getResults===false){
		//echo '<script>alert("ERROR ACCOUNT CREATION FAILED! ")</script>';
		echo "Error Account Creation Failed! ";
		
}
if($getResults === true)
{ echo '<script>alert("Your Account Created Successfully ")</script>';
}
	
	 
	 
	 
 }
catch (PDOException $e) {
    echo "Error connecting to SQL Server.";
  
}
}

 }
 
 
 
 
 ?>
</div>


	
	
	
    </div>
		<!-- sign up end-->
		
		<!-- market srt-->
    <div id="market" class="tab-pane fade">
          
  <div class="container">



<div class="row">
<div class="col-md-12">
<div class="col-md-1"></div>
<div class="col-md-10">
<h3 class="text text-success wow ">How It Works</h3>
<h4 class="text-primary wow pulse ">

It is easy. No Need to Signing up Here it goes free whether you are a buyer or a seller.Just click on the ‘Buy’ link.<br>
Once You Click You will be Redirected to Online Buyer portal,you as a buyer will get the details of all available products <br>
added by  the farmers who are selling their produce at a price determined by them. <br>You can  cannot contact them directly;<br>
 negotiate the price etc
Only mode of delivery will be cash on delivery(COD).

 </h4>
 
 
 <a align="center"class="btn btn-success wow pulse" href="cart.php" target="_blank">Buy</a>

  
   </div>
  <div class="col-md-1"></div>
   </div>
   </div>
   
   
   
   </div>


   </div>
		<!--market end-->
	

  </div>
 	<!-- tab content end-->
 
 
 
 
 </div>
 
 
 
 






</div>
<!-- col-md-12 end-->
</div>
<!--  row end-->
 <script type="text/javascript" src="js/bootstrap.js"></script>
  
  </body>
</html>



