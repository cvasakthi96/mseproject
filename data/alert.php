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
 <script>
 new WOW().init();
 </script>

  </head>

  
  <body>
  
  
  
  <div class="col-md-12">
  
  <div class="alert alert-info">  <h3> ADD INFORMATION </h3>  </div>
  <br>
  <br>
  
  	<div class="container">
<form class="form-inline" method="post" action=""  >
<table >
<tr> <td>                              
<label class=" control-label text-success wow bounceInUp">USERNAME</label>     </td><td>   <input class="form-control" type="text"  name="uname"><br>  </td></tr>
<tr> <td>               
<label class="control-label text-success wow bounceInUp">MOBILENUMBER1</label>    </td><td> <input class="form-control"type="text" name="mobnumber1"><br>   </td></tr>
<tr> <td>               
<label class="control-label text-success wow bounceInUp">MOBILENUMBER2</label>    </td><td> <input class="form-control"type="text" name="mobnumber2"><br>   </td></tr>
<tr> <td>               
<label class="control-label text-success wow bounceInUp">MOBILENUMBER3</label>    </td><td> <input class="form-control"type="text" name="mobnumber3"><br>   </td></tr>
<tr> <td>               
<br>    <input type=submit class="btn-success center form-control wow bounceInUp" name="create" value="CREATE">  </td><td>

</table>
</form>



<?php 
	 require 'conn.php';
	
 if(isset($_POST['create'])){
	 $name=$_POST['uname'];
$mobile1=$_POST['mobnumber1'];
$mobile2=$_POST['mobnumber2'];
$mobile3=$_POST['mobnumber3'];

	

 

try{
	  $st1="insert into  alert_account values('$name','$mobile1','$mobile2','$mobile3')";
	   
	$getResults =sqlsrv_query( $conn,$st1);

	
if($getResults===false){
		
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
 
 
 
 
 ?>
</div>
</div>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  </body>
  
  
  </html>