
<?php
session_start();
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
<script type="text/javascript">
function showValue(newValue)
{
	document.getElementById("range").innerHTML=newValue;
}
</script>

<script>
$(".nav a").on("click", function(){
  $(".nav").find(".active").removeClass("active");
  $(this).parent().addClass("active");
});
</script>
  </head>
 
 <body >

<div class="  well"    style="     position: fixed;
    will-change: transform;
    width: 100%;
    z-index: 10;
	background-color:#DFF0D8; 
    ">          
 <ul class="nav nav-tabs">
    
	<li> <span class='text-primary'id="range">0</span>KG    </li>
	<li><a data-toggle="tab" href="#add">ADD TO MARKET</a></li>
    <li><a data-toggle="tab" href="#view">VIEW MARKET</a></li>
	<li><a data-toggle="tab" href="#delivery">DELIVERY</a></li>
	

  </ul>
  

</div> 
 


<!-- TAB CONTETNT START-->
 <div class="tab-content" style="padding:100px" > 
 
 
<!-- add  START-->
    <div id="add" class="tab-pane fade in active">
  

 

<div  class="table">

 <h4  class='text text-success'> VEGETABLES</h4>  
<?php   

		 require 'conn.php';		
$str='SELECT vegetable FROM food ';		
$s = sqlsrv_query($conn,$str);
while( $row = sqlsrv_fetch_array( $s, SQLSRV_FETCH_NUMERIC) ) {
				
				$imgs=$row[0];	
				
		?>
            <div class="col-md-3">
             <div class=' panel panel-success'>
	      <div class='panel panel-heading'><?php echo substr($imgs, 0, -4);?> </div>
		 <div class=' panel panel-body'>
		 <img class='img ' src='html/images/cart/<?php echo $imgs;?>'> 
 
		 <form  method="post">
		
		<input type="hidden" name='name'border='0'  value=<?php echo substr($imgs, 0, -4);?> >
      

	  <label class=" text-primary"> QUANTITY </label>
 
       <input type="range" name='quantity'min="0" max="50" value="0" step="5" onchange="showValue(this.value)" />
<input type="text" name='cost' placeholder=COST >

		
		<br><input class="btn btn-success"  type='submit' name='add' value='add'>
		 </form>
		 
		 
			</div>  </div> </div>
		<?php
		}
 ?>
</div> <div  class="table">

 <h4  class='text text-success'> FRUIT</h4>  
<?php   

		 require 'conn.php';		
$str='SELECT  top 12 fruit FROM food where fruit IS NOT NULL ';			
$s = sqlsrv_query($conn,$str);
while( $row = sqlsrv_fetch_array( $s, SQLSRV_FETCH_NUMERIC) ) {
				
				$imgs=$row[0];	
				
		?>
            <div class="col-md-3">
             <div class=' panel panel-success'>
	      <div class='panel panel-heading'><?php echo substr($imgs, 0, -4);?> </div>
		 <div class=' panel panel-body'>
		 <img class='img ' src='html/images/cart/<?php echo $imgs;?>'> 
 
		 <form  method="post">
		
		<input type="hidden" name='name'border='0'  value=<?php echo substr($imgs, 0, -4);?> >
      

	  <label class=" text-primary"> QUANTITY </label>
 
       <input type="range" name='quantity'min="0" max="50" value="0" step="5" onchange="showValue(this.value)" />
<input type="text" name='cost' placeholder=COST >

		
		<br><input class="btn btn-success"  type='submit' name='add' value='add'>
		 </form>
		 
		 
			</div>  </div> </div>
		<?php
		}
 ?>
</div> <div  class="table">

 <h4  class='text text-success'> RICE</h4>  
<?php   

		 require 'conn.php';		
$str='SELECT  top 5 rice FROM food  where  rice IS NOT NULL';	
$s = sqlsrv_query($conn,$str);
while( $row = sqlsrv_fetch_array( $s, SQLSRV_FETCH_NUMERIC) ) {
				
				$imgs=$row[0];	
				
		?>
            <div class="col-md-3">
             <div class=' panel panel-success'>
	      <div class='panel panel-heading'><?php echo substr($imgs, 0, -4);?> </div>
		 <div class=' panel panel-body'>
		 <img class='img ' src='html/images/cart/<?php echo $imgs;?>'> 
 
		 <form  method="post">
		
		<input type="hidden" name='name'border='0'  value=<?php echo substr($imgs, 0, -4);?> >
      

	  <label class=" text-primary"> QUANTITY </label>
 
       <input type="range" name='quantity'min="0" max="50" value="0" step="5" onchange="showValue(this.value)" />
<input type="text" name='cost' placeholder=COST >

		
		<br><input class="btn btn-success"  type='submit' name='add' value='add'>
		 </form>
		 
		 
			</div>  </div> </div>
		<?php
		}
 ?>
</div> 




	  
 </div>

 
<!--VIEW  START-->
 <div id="view" class="tab-pane fade">
             <a id='reld'href="">
          <span class="glyphicon glyphicon-refresh"></span>
        </a> 
	
	
<div id="div1-wrapper "> 
	    <div id="div1" > 
	
	        	  <table class="table  table-bordered table-hover">
	  
	  <tr style="   background-color:#DFF0D8;">
	  <th class='text text-success'>ITEM NAME</th>
	  <th class='text text-success'>ITEM COST</th>
	  <th class='text text-success'>ITEM QUANTITY</th>
	  <th class='text text-success'>ACTION</th></tr>
 <?php   
$owner=$_SESSION['session_username'];
require 'conn.php';		
$str= "select name,price,quantity from product where farmer='$owner' ";	
$s = sqlsrv_query($conn,$str);
while( $row = sqlsrv_fetch_array( $s, SQLSRV_FETCH_ASSOC) ) {
		
?>
<tr>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['price'];?></td>
<td><?php echo $row['quantity'];?></td>
<td>	<form action='' method=post>
<input type="hidden" name='name1'border='0'  value='<?php echo $row['farmer'];?>' >
<input type=submit class="btn btn-danger"   name=delete value=Delete>

</form>

</td>
</tr>
<?php		
				
}
?>

	  
	  
	  </table>
	  
	    </div> 
	 </div> 


   

 
   </div>
   <!-- DELIVERY START-->
    <div id="delivery" class="tab-pane fade">
   
   
   
	        	  <table class="table  table-bordered table-hover">
	  
	  <tr style="  background-color:#DFF0D8;" >
	  <th class='text text-success'>BUYER DETAILS</th>
	  <th class='text text-success'>ITEM DETAILS</th>
	  <th class='text text-success'>STATUS</th>
	  </tr>
 <?php   
$owner=$_SESSION['session_username'];
require 'conn.php';		
$str= "select *  from buyers where seller='$owner' ";	
$s = sqlsrv_query($conn,$str);
while( $row = sqlsrv_fetch_array( $s, SQLSRV_FETCH_ASSOC) ) {
		
?>
<tr>
<td>              <?php 
  

$myString = $row['buyer'];

$a = explode('+', $myString);
foreach($a as $k){
    echo $k.'<br>';  
}  

?>                                </td>





<td>   <?php
echo"  <label class='text text-success'>ITEM NAME</label> <label class='text text-success'>QUANTITY</label>      ";


$myString=  $row['details'];
$b = explode(',', $myString);
foreach($b as $k){
    echo $k.'<br>';  
}
?></td>



<td><form action='' method=post>

 <select class='form-control'   name=status>
	<option value="delivered">Delivered</option>
	<option value="notdelivered">NotDelivered</option>

</select> 


</form>

</td>
</tr>
<?php		
				
}
?>

	  
	  
	  </table>
	  
   
   
   
   
   
   
   
   
   
   
   
  
  </div>
  
  
  </div>
  
  
  

 </body>
 </html>
  
 
 <?php
if(isset($_POST['add'])){
	 

$farmer=$_SESSION['session_username'];
$itemname=$_POST['name'];
$itemimage=$_POST['name'].'.jpg';
$itemcost=$_POST['cost'];
$itemquantity=$_POST['quantity'];

 $st1="insert into product  values('$itemname','$itemimage','$itemcost','$itemquantity','$farmer')";
	   
	$getResults =sqlsrv_query( $conn,$st1);

	
if($getResults ==false){
		
} 
if($getResults == true)
{  

}



}
if(isset($_POST['delete'])){
	 

$farmer='amma';// $_SESSION['session_username'];
$itemname=$_POST['name1'];

 $st1="delete from product where farmer='$farmer' and name='$itemname'";
	   
	$getResults =sqlsrv_query( $conn,$st1);

	
if($getResults ==false){
		
} 
if($getResults == true)
{  

echo "
<script>  $('#div1-wrapper').load('http://mseproject.azurewebsites.net/agri_marketing.php' + ' #div1'); 
</script>" ;
}



}

?>
 